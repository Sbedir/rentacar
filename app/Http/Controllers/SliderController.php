<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class SliderController extends Controller
{
    public function index()
    {
      
        $sliderVerileri = Slider::all(); // Tüm kullanıcıları çekmek için

    return view('slider', compact('sliderVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
                $sli_id = $request->input('sli_id');
              
                $resimYolu='storage/'.Helper::imageUpload($request->file('resim'), 'img');


                if(intval($sli_id)!==0)
                {
                    $sliderVerileri = Slider::where('sli_id', $sli_id)->first();
                    if(empty($sliderVerileri))
                    {
                        $slider = new Slider;
                    }
                    else
                    {
                        $validatedData = $request->validate([
                           
                            'sli_baslik' => 'required|string',
                            'sli_aciklama' => 'required|string',
                            'sli_aciklama2' => 'required|string',
                           
                       
                        ]);
                        $slider = Slider::where('sli_id', $sli_id)
                        ->update([
                            'resim'=>  $resimYolu,
                            'sli_baslik'=> $validatedData['sli_baslik'],
                            'sli_aciklama'=> $validatedData['sli_aciklama'],
                            'sli_aciklama2' => $validatedData['sli_aciklama2']
                           
                          
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $slider = new Slider;
                 }

                 $slider ->resim = $resimYolu;
                 $slider ->sli_baslik = $request->input('sli_baslik');
                 $slider ->sli_aciklama = $request->input('sli_aciklama');
                 $slider ->sli_aciklama2 = $request->input('sli_aciklama2');
                
                 
                
                 $slider->save();
                 return redirect()->back()->with('success', 'işlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }

    public function deleteMe(Request $request)
    {
        try {
            $sli_id = $request->input('s_id');
            $sil = DB::table('slider')->where('sli_id', $sli_id)->delete();
    
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
