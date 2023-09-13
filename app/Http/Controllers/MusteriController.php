<?php

namespace App\Http\Controllers;
use App\Models\Musteri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class MusteriController extends Controller
{
      
    public function index()
    {
      
        $musteriVerileri = Musteri::all(); // Tüm kullanıcıları çekmek için

    return view('musteriler', compact('musteriVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
                $musteri_id = $request->input('musteri_id');
               


                if(intval($musteri_id)!==0)
                {
                    $musteriVerileri = Musteri::where('mus_id', $musteri_id)->first();
                    if(empty($musteriVerileri))
                    {
                        $musteri = new Musteri;
                    }
                    else
                    {
                        $validatedData = $request->validate([
                            'mus_adi' => 'required|string',
                            'mus_soyadi' => 'required|string',
                            'd_tarih' => 'required|date',
                            'cep_tel' => 'required|integer',
                            'e_posta' => 'required|string',
                            'ucus_notlari' => 'required|string',
                            'ozel_notlar' => 'required|string',
                       
                        ]);
                        $musteri = Musteri::where('mus_id', $musteri_id)
                        ->update([
                            'mus_adi'=> $validatedData['mus_adi'],
                            'mus_soyadi'=> $validatedData['mus_soyadi'],
                            'd_tarih'=> $validatedData['d_tarih'],
                            'cep_tel' => $validatedData['cep_tel'],
                            'e_posta' => $validatedData['e_posta'],
                            'ucus_notlari' => $validatedData['ucus_notlari'],
                            'ozel_notlar' => $validatedData['ozel_notlar'],

                          
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $musteri = new Musteri;
                 }

                 $musteri ->mus_adi = $request->input('mus_adi');
                 $musteri ->mus_soyadi = $request->input('mus_soyadi');
                 $musteri ->d_tarih = $request->input('d_tarih');
                 $musteri ->cep_tel = $request->input('cep_tel');
                 $musteri ->e_posta = $request->input('e_posta');
                 $musteri ->ucus_notlari = $request->input('ucus_notlari');
                 $musteri ->ozel_notlar = $request->input('ozel_notlar');
                 
                
                 $musteri->save();
                 return redirect()->back()->with('success', 'işlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }


    public function deleteMe(Request $request)
    {
        try {
            $musterisil_id = $request->input('musterisil_id');
            $musterisil = DB::table('musteri')->where('mus_id', $musterisil_id)->delete();
    
            if ($musterisil) {
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
