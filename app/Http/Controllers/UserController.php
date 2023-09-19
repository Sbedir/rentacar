<?php

namespace App\Http\Controllers;
use Helper;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    { $kullanici = json_decode(Session::get('kullanici'));
        $UserVerileri = User::where('id', $kullanici->id)->first();

    return view('user-update', compact('UserVerileri'));

    }

    public function createUpdate(Request $request)
    {
        try {
            $kullanici = json_decode(Session::get('kullanici'));
            $sifre=$request->input('sifre');
    
            // "ayar_id" ile ilgili kaydı veritabanında ara
            $userVerileri = User::find($kullanici->id);
           
            if($sifre==='' || $sifre==null)
            {
                $userVerileri->sifre=$userVerileri->sifre;
            }
            else if($sifre!=='' && strlen($sifre)!==8)
            {
                return redirect()->back()->with('error', 'Şifreniz 8 karakterden oluşmalıdır.');
            }
            else{
                $userVerileri->sifre=md5($sifre);
            }
    
            // validate doğrulama request istek
            $validatedData = $request->validate([
                'ad_soyad' => 'required|string',
                'kullanici_adi' => 'required|string',
                'e_posta' => 'required|string'
              
            ]);
    
            // Verileri güncelle veya ekle
            $userVerileri->ad_soyad = $validatedData['ad_soyad'];
            $userVerileri->kullanici_adi = $validatedData['kullanici_adi'];
            $userVerileri->e_posta = $validatedData['e_posta'];
            $userVerileri->save();
    
            return redirect()->back()->with('success', 'İşlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }
    
}
