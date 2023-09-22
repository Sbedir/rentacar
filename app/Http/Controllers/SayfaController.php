<?php

namespace App\Http\Controllers;
use App\Models\Sayfa;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class SayfaController extends Controller
{
     
    public function index()
    {
      
        $sayfaVerileri = Sayfa::all(); // Tüm kullanıcıları çekmek için

    return view('sayfalar', compact('sayfaVerileri'));
    }

   
   
   
   
   
   
    public function createUpdate(Request $request)
    {
        try {
                $sayfa_id = $request->input('sayfa_id');
               


                if(intval($sayfa_id)!==0)
                {
                    $sayfaVerileri = Sayfa::where('sayfa_id', $sayfa_id)->first();
                    if(empty($sayfaVerileri))
                    {
                        $sayfa = new Sayfa;
                    }
                    else
                    {
                        $validatedData = $request->validate([
                            'sayfa_baslik' => 'required|string',
                            'icerik' => 'required|string',
                            'description' => 'required|string',
                            'keywords' => 'required|string',
                            'title' => 'required|string'
                       
                       
                        ]);
                        $sayfa = Sayfa::where('sayfa_id', $sayfa_id)
                        ->update([
                            'sayfa_baslik'=> $validatedData['sayfa_baslik'],
                            'icerik'=> $validatedData['icerik'],
                            'description'=> $validatedData['description'],
                            'keywords' => $validatedData['keywords'],
                            'title' => $validatedData['title']
                          

                          
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $sayfa = new Sayfa;
                 }

                 $sayfa ->sayfa_baslik = $request->input('sayfa_baslik');
                 $sayfa ->icerik = htmlspecialchars($request->input('icerik'));
                 $sayfa ->description = $request->input('description');
                 $sayfa ->keywords = $request->input('keywords');
                 $sayfa ->title = $request->input('title');
              
                 
                
                 $sayfa->save();
                 return redirect()->back()->with('success', 'işlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }

    public function deleteMe(Request $request)
    {
        try {
            $s_id = $request->input('s_id');
            $sayfasil = DB::table('sayfalar')->where('sayfa_id', $s_id)->delete();
    
            if ($sayfasil) {
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
