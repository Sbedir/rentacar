<?php


namespace App\Http\Controllers;
use Helper;
use Illuminate\Http\Request;
use App\Models\TransferHizmet;
use Illuminate\Support\Facades\DB;
use Exception;

class TransferHizmetController extends Controller
{
    public function index()
    {
        $transferVerileri = DB::select(DB::raw("
        SELECT th.*, pb.para_name AS para_birim,
        i_a.ilce_name AS alis_yeri,
        i_d.ilce_name AS donus_yeri,
          ai.il_id,i_a.ilce_id,i_d.ilce_id,di.il_id
      
       
      
        FROM `transfer_hizmet` th
        LEFT JOIN para_birimi pb ON th.para_birim_id = pb.para_birim_id
        LEFT JOIN ilce AS i_d on i_d.ilce_id=th.donus_yeri
        LEFT JOIN ilce AS i_a on i_a.ilce_id=th.alis_yeri
        LEFT JOIN il AS ai on ai.il_id=i_a.il_id
        LEFT JOIN il AS di on di.il_id=i_d.il_id
       
        "));
        return view('transferler', compact('transferVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
                $t_id = $request->input('t_id');
         


                if(intval($t_id)!==0)
                {
                    $transferVerileri = DB::select(DB::raw("
                    SELECT *
                    FROM `transfer_hizmet` a where t_id=".$t_id."
                    "));
                    if(empty($transferVerileri))//boşmu kontrol
                    {
                        $transfer = new TransferHizmet;
                    }
                    else
                    {
                        //validate dogrulama request istek
                        $validatedData = $request->validate([
                            't_id' => 'required|integer',
                            'mesafe' => 'required|integer',
                            'fiyat' => 'required|integer',
                            'a_ilce' => 'required|integer',
                            'd_ilce' => 'required|integer',
                            'kisi_baslangic' => 'required|integer',
                            'kisi_bitis' => 'required|integer',
                            'para_birim_id' => 'required|integer'
                           
                        ]);
                        $transfer = TransferHizmet::where('t_id', $t_id)
                        ->update([
                            't_id'=> $validatedData['t_id'],
                            'alis_yeri'=> $validatedData['a_ilce'],
                            'donus_yeri'=> $validatedData['d_ilce'],
                            'mesafe' => $validatedData['mesafe'],
                            'para_birim_id'=>$validatedData['para_birim_id'],
                            'fiyat'=> $validatedData['fiyat'],
                            'kisi_baslangic'=> $validatedData['kisi_baslangic'],
                            'kisi_bitis'=> $validatedData['kisi_bitis']
                           
                            
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $transfer = new TransferHizmet;
                 }

                 $transfer ->t_id = $request->input('t_id');
                 $transfer ->alis_yeri= $request->input('a_ilce');
                 $transfer ->donus_yeri= $request->input('d_ilce');
                 $transfer ->mesafe = $request->input('mesafe');
                 $transfer ->kisi_baslangic = $request->input('kisi_baslangic');
                 $transfer ->kisi_bitis = $request->input('kisi_bitis');
                 $transfer ->fiyat = $request->input('fiyat');
                 $transfer ->para_birim_id =$request->input('para_birim_id');
                 $transfer->save();
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
            $sil = DB::table('transfer_hizmet')->where('t_id', $sil_id)->delete();
    
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
