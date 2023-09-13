<?php

namespace App\Http\Controllers;
use Helper;
use Illuminate\Http\Request;
use App\Models\AracFiyat;
use Illuminate\Support\Facades\DB;
use Exception;


class AracFiyatController extends Controller
{
    public function index(){
        $aracfiyatVerileri = DB::select(DB::raw("
        SELECT af.*, pb.para_name AS para_birim,
        CONCAT(m.mr_isim,' / ',mo.m_name,' / ',a.uretim_yili )AS arac_adi
      
       
      
        FROM `arac_fiyati` AS af
        LEFT JOIN arac AS a ON a.a_id = af.arac_id
        LEFT JOIN para_birimi pb ON af.para_birim_id = pb.para_birim_id
        LEFT JOIN marka AS m ON m.mr_id = a.mr_id
        LEFT JOIN model AS mo ON mo.m_id = a.m_id
       
        "));
        return view('arac-fiyatlari', compact('aracfiyatVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
                $a_fiyat_id = $request->input('a_fiyat_id');
         


                if(intval($a_fiyat_id)!==0)
                {
                    $aracfiyatVerileri = DB::select(DB::raw("
                    SELECT *
                    FROM `arac_fiyati` a where a_fiyat_id=".$a_fiyat_id."
                    "));
                    if(empty($aracfiyatVerileri))//boşmu kontrol
                    {
                        $aracfiyat = new AracFiyat;
                    }
                    else
                    {
                        //validate dogrulama request istek
                        $validatedData = $request->validate([
                            'a_fiyat_id' => 'required|integer',
                            'arac_id' => 'required|integer',
                            'fiyat' => 'required|integer',
                            'gun_baslangic' => 'required|integer',
                            'gun_bitis' => 'required|integer',
                            'para_birim_id' => 'required|integer'
                           
                        ]);
                        $aracfiyat = AracFiyat::where('a_fiyat_id', $a_fiyat_id)
                        ->update([
                            'a_fiyat_id'=> $validatedData['a_fiyat_id'],
                            'arac_id' => $validatedData['arac_id'],
                            'para_birim_id'=>$validatedData['para_birim_id'],
                            'fiyat'=> $validatedData['fiyat'],
                            'gun_baslangic'=> $validatedData['gun_baslangic'],
                            'gun_bitis'=> $validatedData['gun_bitis']
                           
                            
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $aracfiyat = new AracFiyat;
                 }

                 $aracfiyat ->a_fiyat_id = $request->input('a_fiyat_id');
                 $aracfiyat ->arac_id= $request->input('arac_id');
                 $aracfiyat ->para_birim_id= $request->input('para_birim_id');
                 $aracfiyat ->fiyat = $request->input('fiyat');
                 $aracfiyat ->gun_baslangic = $request->input('gun_baslangic');
                 $aracfiyat ->gun_bitis = $request->input('gun_bitis');
                 $aracfiyat->save();
                 return redirect()->back()->with('success', 'işlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }

    public function deleteMe(Request $request)
    {
        try {
            $sil_id = $request->input('sil_id');
            $sil = DB::table('arac_fiyati')->where('a_fiyat_id', $sil_id)->delete();
    
            if ($sil) {
                // Başarı durumu için bir "success" alert mesajı kaydet
                session()->flash('success', 'Başarıyla silindi.');
            } else {
                // Hata durumu için bir "error" alert mesajı kaydet
                session()->flash('error', 'Silinirken bir hata oluştu.');
            }
    
            return redirect()->back();
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }
}
