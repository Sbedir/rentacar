<?php

namespace App\Http\Controllers;
use App\Models\ParaBirim;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class ParaBirimController extends Controller
{
    public function index()
    {
      
        $paraVerileri = ParaBirim::all(); // Tüm kullanıcıları çekmek için

    return view('para-birimleri', compact('paraVerileri'));
    }
    public function createUpdate(Request $request)
    {
        try {
                $para_birim_id = $request->input('para_birim_id');
                


                if(intval($para_birim_id)!==0)
                {
                    $paraVeri = ParaBirim::where('para_birim_id', $para_birim_id)->first();
                    if(empty($paraVeri))
                    {
                        $ParaBirim = new ParaBirim;
                    }
                    else
                    {
                        $validatedData = $request->validate([
                          
                            'para_name' => 'required|string'
                       
                       
                        ]);
                        $ParaBirim = ParaBirim::where('para_birim_id', $para_birim_id)
                        ->update([
                      
                            'para_name'=> $validatedData['para_name']
                          

                          
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $ParaBirim = new ParaBirim;
                 }

                 $ParaBirim ->para_name = $request->input('para_name');

                 
                
                 $ParaBirim->save();
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
            $sil = DB::table('para_birimi')->where('para_birim_id', $sil_id)->delete();
    
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
