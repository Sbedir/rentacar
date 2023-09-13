<?php

namespace App\Http\Controllers;
use App\Models\Marka;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class MarkaController extends Controller
{
    public function index()
    {
      
        $markaVerileri = Marka::all(); // Tüm kullanıcıları çekmek için

    return view('markalar', compact('markaVerileri'));
    }
   
   
    public function createUpdate(Request $request)
    {
        try {
                $mr_id = $request->input('mr_id');
                


                if(intval($mr_id)!==0)
                {
                    $markaVerileri = Marka::where('mr_id', $mr_id)->first();
                    if(empty($markaVerileri))
                    {
                       $marka = new Marka;
                    }
                    else
                    {
                        $validatedData = $request->validate([
                            'mr_isim' => 'required|string'
                       
                       
                        ]);
                       $marka = Marka::where('mr_id', $mr_id)
                        ->update([
                            'mr_isim'=> $validatedData['mr_isim']
                          

                          
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                   $marka = new Marka;
                 }

                $marka ->mr_isim = $request->input('mr_isim');

                 
                
                $marka->save();
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
            $sil = DB::table('marka')->where('mr_id', $sil_id)->delete();
    
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
