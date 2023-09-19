<?php

namespace App\Http\Controllers;
use App\Models\Rezarvasyon;
use Illuminate\Http\Request;
use App\Models\KiralananArac;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class RezarvasyonController extends Controller
{
    public function index(){
        $rezVerileri = DB::select(DB::raw("
        SELECT r.*, pb.para_name AS para_birim
        FROM `rezervasyon_extralari` AS r
        LEFT JOIN para_birimi pb ON r.para_birim_id = pb.para_birim_id
       
       
        "));
        return view('rezarvasyon-extralari', compact('rezVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
                $rez_id = $request->input('rez_id');
         


                if(intval($rez_id)!==0)
                {
                    $rezVeri = DB::select(DB::raw("
                    SELECT *
                    FROM `rezervasyon_extralari` a where rez_id=".$rez_id."
                    "));
                    if(empty($rezVeri))//boşmu kontrol
                    {
                        $Rezarvasyon = new Rezarvasyon;
                    }
                    else
                    {
                        //validate dogrulama request istek
                        $validatedData = $request->validate([
                            'rez_id' => 'required|integer',
                            'navigasyon' => 'required|integer',
                            'sofor_hizmeti' => 'required|integer',
                            'bebek_koltugu' => 'required|integer',
                            'yol_haritasi' => 'required|integer',
                            'para_birim_id' => 'required|integer'
                           
                        ]);
                        $Rezarvasyon = Rezarvasyon::where('rez_id', $rez_id)
                        ->update([
                            'rez_id'=> $validatedData['rez_id'],
                            'navigasyon'=> $validatedData['navigasyon'],
                            'sofor_hizmeti'=> $validatedData['sofor_hizmeti'],
                            'bebek_koltugu' => $validatedData['bebek_koltugu'],
                            'para_birim_id'=>$validatedData['para_birim_id'],
                            'yol_haritasi'=> $validatedData['yol_haritasi'],
                          
                            
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $Rezarvasyon = new Rezarvasyon;
                 }

                 $Rezarvasyon ->rez_id = $request->input('rez_id');
                 $Rezarvasyon ->navigasyon= $request->input('navigasyon');
                 $Rezarvasyon ->sofor_hizmeti= $request->input('sofor_hizmeti');
                 $Rezarvasyon ->bebek_koltugu = $request->input('bebek_koltugu');
                 $Rezarvasyon ->yol_haritasi = $request->input('yol_haritasi');
                 $Rezarvasyon ->para_birim_id =$request->input('para_birim_id');
                 $Rezarvasyon->save();
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
            $silinecekVeri = Rezarvasyon::where('rez_id', $sil_id)->first();
            $navigasyon = KiralananArac::where('navigasyon', 1)->where('para_birim_id',$silinecekVeri->para_birim_id)->get()->toArray();
            if(!empty($navigasyon))
            {
                session()->flash('error', 'Kiralanan araclar sayfasında navigasyon hizmeti kullanılmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }
            $sofor_hizmeti = KiralananArac::where('sofor_hizmeti', 1)->where('para_birim_id',$silinecekVeri->para_birim_id)->get()->toArray();
            if(!empty($sofor_hizmeti))
            {
                session()->flash('error', 'Kiralanan araclar sayfasında şoför hizmeti  kullanılmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }
            $bebek_koltugu = KiralananArac::where('bebek_koltugu', 1)->where('para_birim_id',$silinecekVeri->para_birim_id)->get()->toArray();
            if(!empty($bebek_koltugu))
            {
                session()->flash('error', 'Kiralanan araclar sayfasında bebek koltuğu hizmeti  kullanılmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }
            $yol_haritasi = KiralananArac::where('yol_haritasi', 1)->where('para_birim_id',$silinecekVeri->para_birim_id)->get()->toArray();
            if(!empty($yol_haritasi))
            {
                session()->flash('error', 'Kiralanan araclar sayfasında yol haritası hizmeti  kullanılmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }
            $sil = DB::table('rezervasyon_extralari')->where('rez_id', $sil_id)->delete();
    
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
