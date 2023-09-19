<?php

namespace App\Http\Controllers;
use App\Models\Dil;
use Illuminate\Http\Request;
use App\Models\Translate;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class DilController extends Controller
{
    public function index()
    {
        $DilVerileri = Dil::all(); // Tüm kullanıcıları çekmek için

    return view('diller', compact('DilVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
            $language_id = $request->input('language_id');
            $resimYolu='';
            if($request->file('resim'))
            {
                $resimYolu='storage/img/'.Helper::imageUpload($request->file('resim'), 'public/img');
            }
               


                if(intval($language_id)!==0)
                {
                    $DilVerileri = Dil::where('language_id', $language_id)->first();
                    if(empty($DilVerileri))
                    {
                        $Dil = new Dil;
                    }
                    else
                    {
                        $validatedData = $request->validate([
                            'lang_name' => 'required|string',
                            'lang_kod' => 'required|string'
                      
                       
                        ]);
                        $Dil = Dil::where('language_id', $language_id)
                        ->update([
                            'lang_name'=> $validatedData['lang_name'],
                            'lang_kod'=> $validatedData['lang_kod'],
                            'resim'=>  $resimYolu==''?$DilVerileri->resim:$resimYolu

                          
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $Dil = new Dil;
                 }

                 $Dil ->lang_name = $request->input('lang_name');
                 $Dil ->lang_kod = $request->input('lang_kod');
                 $Dil ->resim = $resimYolu;

                 
                
                 $Dil->save();
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
            $Translate = Translate::where('language_id', $sil_id)->get()->toArray();
            if(!empty($Translate))
            {
                session()->flash('error', 'Bu dil ceviri sayfasında kullanılmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }
            $sil = DB::table('languages')->where('language_id', $sil_id)->delete();
    
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
