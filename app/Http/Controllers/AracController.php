<?php

namespace App\Http\Controllers;
use Helper;
use Illuminate\Http\Request;
use App\Models\Arac;
use App\Models\KiralananArac;
use App\Models\AracFiyat;

use Illuminate\Support\Facades\DB;
use Exception;

class AracController extends Controller
{
    public function index()
    {
        $aracVerileri = DB::select(DB::raw("
        SELECT a.*, m.mr_isim AS marka_name, mo.m_name AS model_name,
        IF(a.a_musait = 1, 'Müsait', 'Müsait Değil') AS arac_musait,
        IF(a.yakit_tur = 1, 'Benzin', IF(a.yakit_tur = 2, 'LPG', IF(a.yakit_tur = 3, 'Benzin/LPG', IF(a.yakit_tur = 4, 'Dizel', IF(a.yakit_tur = 5, 'Elektrik', 'Hybrid'))))) AS yakit_tur_adi,
        IF(a.vites_tur = 1, 'Manuel', IF(a.vites_tur = 2, 'Yarı Otomatik', IF(a.vites_tur = 3, 'Otomatik', 'Triptonik'))) AS vites_tur_name,
        IF(a.vites_tur = 1, 'Ekonomik', IF(a.vites_tur = 2, 'Orta Sınıf', IF(a.vites_tur = 3, 'Üst Sınıf', 'VIP'))) AS kategori_name,
        IF(a.klima_tur = 1, 'Otomatik', 'Manuel') AS klima_tur_name,
        CONCAT(il.il_name,' / ',ilce.ilce_name,' / ',ao.ofis_name) ofis_adi,
        il.il_id,ilce.ilce_id
        FROM `arac` a
        LEFT JOIN marka m ON m.mr_id = a.mr_id
        LEFT JOIN model mo ON mo.m_id = a.m_id
        LEFT JOIN arac_ofis ao on ao.ofis_id=a.ofis_id
        LEFT JOIN ilce on ilce.ilce_id=ao.ilce_id
        LEFT JOIN il on il.il_id=ilce.il_id
        "));
        return view('araclar', compact('aracVerileri'));
    }

    public function createUpdate(Request $request)
    {
        try {
                $a_id = $request->input('a_id');
                $resimYolu='';
            if($request->file('a_resim'))
            {
                $resimYolu='storage/img/'.Helper::imageUpload($request->file('a_resim'), 'public/img');
            }
              


                if(intval($a_id)!==0)
                {
                    $aracVerileri = DB::select(DB::raw("
                    SELECT *
                    FROM `arac` a where a_id=".$a_id."
                    "));
                    if(empty($aracVerileri))
                    {
                        $arac = new Arac;
                    }
                    else
                    {
                        //validate dogrulama request istek
                        $validatedData = $request->validate([
                            'mr_id' => 'required|integer',
                            'm_id' => 'required|integer',
                            'uretim_yili' => 'required|integer',
                            'a_musait' => 'required|integer',
                            'yolcu_kapasite' => 'required|integer',
                            'bagaj_kapasitesi' => 'required|integer',
                            'yakit_tur' => 'required|integer',
                            'vites_tur' => 'required|integer',
                            'a_kategori' => 'required|integer',
                            'klima_tur' => 'required|integer',
                            'ofis_id' => 'required|integer',
                        ]);
                        $arac = Arac::where('a_id', $a_id)
                        ->update([
                            'mr_id'=> $validatedData['mr_id'],
                            'm_id'=> $validatedData['m_id'],
                            'uretim_yili'=> $validatedData['uretim_yili'],
                            'a_resim'=>  $resimYolu==''? $aracVerileri[0]->a_resim:$resimYolu,
                            'a_musait' => $validatedData['a_musait'],
                            'yolcu_kapasite'=>$validatedData['yolcu_kapasite'],
                            'bagaj_kapasitesi'=> $validatedData['bagaj_kapasitesi'],
                            'yakit_tur'=> $validatedData['yakit_tur'],
                            'vites_tur'=>$validatedData['vites_tur'],
                            'a_kategori'=>$validatedData['a_kategori'],
                            'klima_tur'=>$validatedData['klima_tur'],
                            'ofis_id'=>$validatedData['ofis_id'],
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $arac = new Arac;
                 }

                 $arac ->mr_id = $request->input('mr_id');
                 $arac ->m_id = $request->input('m_id');
                 $arac ->uretim_yili = $request->input('uretim_yili');
                 $arac ->a_resim = $resimYolu;
                 $arac ->a_musait = $request->input('a_musait');
                 $arac ->yolcu_kapasite = $request->input('yolcu_kapasite');
                 $arac ->bagaj_kapasitesi = $request->input('bagaj_kapasitesi');
                 $arac ->yakit_tur = $request->input('yakit_tur');
                 $arac ->vites_tur =$request->input('vites_tur');
                 $arac ->a_kategori =$request->input('a_kategori');
                 $arac ->klima_tur =$request->input('klima_tur');
                 $arac ->ofis_id =$request->input('ofis_id');
                 $arac->save();
                 return redirect()->back()->with('success', 'işlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }

    public function deleteMe(Request $request)
    {
        try {
            $a_id = $request->input('a_id');
            $afiyat = AracFiyat::where('arac_id', $a_id)->get()->toArray();

            $karac = KiralananArac::where('arac_id', $a_id)->get()->toArray();
            $afiyat = AracFiyat::where('arac_id', $a_id)->get()->toArray();
            if(!empty($karac))
            {
                session()->flash('error', 'Bu arac daha önceden kiralanmıştır.Bu nedenle silemessiniz.');
                return redirect()->back();
            }
            if(!empty($afiyat))
            {
                session()->flash('error', 'Bu araca ait eklemiş olduğunuz fiyat bilgisi bulunmaktadır. Eğer bu aracı silmek istiyorsanız arac fiyatları sayfasından bu araca ait fiyat bilgilerini silmelisiniz.');
                return redirect()->back();
            }
            $aracsil = DB::table('arac')->where('a_id', $a_id)->delete();
    
            if ($aracsil) {
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
