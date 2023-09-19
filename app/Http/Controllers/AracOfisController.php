<?php

namespace App\Http\Controllers;
use Helper;
use Illuminate\Http\Request;
use App\Models\AracOfis;
use App\Models\KiralananArac;
use App\Models\Arac;
use Illuminate\Support\Facades\DB;
use Exception;

class AracOfisController extends Controller
{
    
    public function index(){
        $ofisVerileri = DB::select(DB::raw("
        SELECT ao.*,
        ii.ilce_name AS ilce,
        i.il_name AS il, i.il_id
        
      
       
      
        FROM `arac_ofis` AS ao
        LEFT JOIN ilce AS ii ON ii.ilce_id = ao.ilce_id
        LEFT JOIN il AS i ON i.il_id = ii.il_id
       
       
       
        "));
        return view('arac-ofisleri', compact('ofisVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
                $ofis_id = $request->input('ofis_id');
         


                if(intval($ofis_id)!==0)
                {
                    $AracOfisVerileri = DB::select(DB::raw("
                    SELECT *
                    FROM `arac_ofis` a where ofis_id=".$ofis_id."
                    "));
                    if(empty($AracOfisVerileri))//boşmu kontrol
                    {
                        $AracOfis = new AracOfis;
                    }
                    else
                    {
                        //validate dogrulama request istek
                        $validatedData = $request->validate([
                          
                            'ilce' => 'required|integer',
                            'ofis_name' => 'required|string',
                            'ofis_maps' => 'required|string'
                           
                           
                        ]);
                        $AracOfis = AracOfis::where('ofis_id', $ofis_id)
                        ->update([
                         
                            'ilce_id' => $validatedData['ilce'],
                            'ofis_name'=>$validatedData['ofis_name'],
                            'ofis_maps'=> $validatedData['ofis_maps']
                        
                           
                            
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $AracOfis = new AracOfis;
                 }

                
                 $AracOfis ->ilce_id= $request->input('ilce');
                 $AracOfis ->ofis_name= $request->input('ofis_name');
                 $AracOfis ->ofis_maps = $request->input('ofis_maps');
                 $AracOfis->save();
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
            $arac = Arac::where('ofis_id', $sil_id)->get()->toArray();
            if(!empty($arac))
            {
                session()->flash('error', 'Bu ofis bilgisi daha önceden kullanılmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }

            $karac = KiralananArac::where('alis_yeri_id', $sil_id)->get()->toArray();
            if(!empty($karac))
            {
                session()->flash('error', 'Bu ofis bilgisi kiralanan araç sayfasında kullanılmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }
            $karac = KiralananArac::where('donus_yeri_id', $sil_id)->get()->toArray();
            if(!empty($karac))
            {
                session()->flash('error', 'Bu ofis bilgisi kiralanan araç sayfasında kullanılmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }

            $sil = DB::table('arac_ofis')->where('ofis_id', $sil_id)->delete();
    
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
