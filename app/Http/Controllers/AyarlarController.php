<?php

namespace App\Http\Controllers;
use App\Models\Ayarlar;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class AyarlarController extends Controller
{
    public function index()
    {
        $ayarVerileri = Ayarlar::where('ayar_id', 1)->first();

    return view('ayarlar', compact('ayarVerileri'));

    }

    public function createUpdate(Request $request)
    {
        try {
            $ayar_id = 1;
            $resimYolu = 'storage/' . Helper::imageUpload($request->file('logo'), 'img');
    
            // "ayar_id" ile ilgili kaydı veritabanında ara
            $ayarveri = Ayarlar::find($ayar_id);
    
            if (!$ayarveri) {
                // Eğer kayıt yoksa yeni bir Ayarlar örneği oluştur
                $ayarveri = new Ayarlar;
            }
    
            // validate doğrulama request istek
            $validatedData = $request->validate([
                'adres' => 'required|string',
                'tel' => 'required|integer',
                'e_posta' => 'required|string',
                'maps' => 'required|string',
                'face' => 'required|string',
                'twitter' => 'required|string',
                'linkedin' => 'required|string',
                'gmail' => 'required|string',
            ]);
    
            // Verileri güncelle veya ekle
            $ayarveri->adres = $validatedData['adres'];
            $ayarveri->tel = $validatedData['tel'];
            $ayarveri->logo = $resimYolu;
            $ayarveri->e_posta = $validatedData['e_posta'];
            $ayarveri->maps = $validatedData['maps'];
            $ayarveri->face = $validatedData['face'];
            $ayarveri->twitter = $validatedData['twitter'];
            $ayarveri->linkedin = $validatedData['linkedin'];
            $ayarveri->gmail = $validatedData['gmail'];
            $ayarveri->save();
    
            return redirect()->back()->with('success', 'İşlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }
    
}
