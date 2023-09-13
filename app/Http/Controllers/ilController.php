<?php

namespace App\Http\Controllers;
use App\Models\il;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class ilController extends Controller
{
    
    public function index()
    {
      
        $ilVerileri = il::all(); // Tüm kullanıcıları çekmek için

    return view('il', compact('ilVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
                $il_id = $request->input('il_id');
                


                if(intval($il_id)!==0)
                {
                    $ilVerileri = il::where('il_id', $il_id)->first();
                    if(empty($ilVerileri))
                    {
                        $il = new il;
                    }
                    else
                    {
                        $validatedData = $request->validate([
                            'il_name' => 'required|string'
                       
                       
                        ]);
                        $il = il::where('il_id', $il_id)
                        ->update([
                            'il_name'=> $validatedData['il_name']
                          

                          
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $il = new il;
                 }

                 $il ->il_name = $request->input('il_name');

                 
                
                 $il->save();
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
            $sil = DB::table('il')->where('il_id', $sil_id)->delete();
    
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
