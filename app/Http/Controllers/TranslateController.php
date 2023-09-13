<?php

namespace App\Http\Controllers;
use App\Models\Translate;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class TranslateController extends Controller
{
    public function index(){
        $traVerileri = DB::select(DB::raw("
        SELECT t.*, l.lang_name AS dil
        FROM `translate` AS t
        LEFT JOIN languages l ON t.language_id = l.language_id
       
       
        "));
        return view('translate', compact('traVerileri'));
    }
    public function createUpdate(Request $request)
    {
        try {
                $translate_id = $request->input('translate_id');
         


                if(intval($translate_id)!==0)
                {
                    $translateVeri = DB::select(DB::raw("
                    SELECT *
                    FROM `translate` a where translate_id=".$translate_id."
                    "));
                    if(empty($translateVeri))//boşmu kontrol
                    {
                        $Translate = new Translate;
                    }
                    else
                    {
                        //validate dogrulama request istek
                        $validatedData = $request->validate([
                           
                            'unic_name' => 'required|string',
                            'name' => 'required|string',
                            'language_id' => 'required|integer'
                           
                           
                        ]);
                        $Translate = Translate::where('translate_id', $translate_id)
                        ->update([
                        
                            'unic_name'=> $validatedData['unic_name'],
                            'name'=> $validatedData['name'],
                            'language_id' => $validatedData['language_id']
                          
                            
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $Translate = new Translate;
                 }

                
                 $Translate ->unic_name= $request->input('unic_name');
                 $Translate ->name= $request->input('name');
                 $Translate ->language_id = $request->input('language_id');
                 $Translate->save();
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
            $sil = DB::table('translate')->where('translate_id', $sil_id)->delete();
    
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
