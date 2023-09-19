<?php
namespace App\Http\Controllers;
use Helper;
use Illuminate\Http\Request;
use App\Models\KiralananArac;
use Illuminate\Support\Facades\DB;
use Exception;



class KiralananAracController extends Controller
{ 
    public function index(){

        $aracVerileri = DB::select(DB::raw("
        SELECT ka.*, a.a_resim AS resim,aao.ofis_name AS alis_yeri,ado.ofis_name
        AS donus_yeri,pb.para_name AS para_birim,
         DATE_FORMAT(ka.alis_tarihi, '%Y-%m-%d') as alis_tarihi,
        DATE_FORMAT(ka.donus_tarihi, '%Y-%m-%d') as donus_tarihi,
        CONCAT(mus.mus_adi,' ',mus.mus_soyadi)AS musteri_adi,
        CONCAT(m.mr_isim,' / ',mo.m_name,' / ',a.uretim_yili )AS arac_adi,
        il.il_id,ilce.ilce_id,d_ilce.ilce_id,d_il.il_id,
        
    af.fiyat arac_top_fiyat,
    IF(DATEDIFF(ka.donus_tarihi, ka.alis_tarihi)=0,1,DATEDIFF(ka.donus_tarihi, ka.alis_tarihi)) as gun_farki,
    re.navigasyon as navigasyon_fiyat,
    re.sofor_hizmeti as sofor_hizmeti_fiyat,
re.bebek_koltugu as bebek_koltugu_fiyat,
   re.yol_haritasi as yol_haritasi_fiyat   
        FROM `kiralanan_arac` ka
        LEFT JOIN arac AS a ON a.a_id = ka.arac_id
        LEFT JOIN marka AS m ON m.mr_id = a.mr_id
        LEFT JOIN model AS mo ON mo.m_id = a.m_id
        LEFT JOIN arac_ofis AS ado on ado.ofis_id=ka.donus_yeri_id
        LEFT JOIN arac_ofis AS aao on aao.ofis_id=ka.alis_yeri_id
        LEFT JOIN musteri AS mus on mus.mus_id=ka.musteri_id
        LEFT JOIN para_birimi AS pb on pb.para_birim_id=ka.para_birim_id
        LEFT JOIN ilce as d_ilce on d_ilce.ilce_id=ado.ilce_id
        LEFT JOIN il as d_il on d_il.il_id=d_ilce.il_id
        LEFT JOIN ilce on ilce.ilce_id=aao.ilce_id
        LEFT JOIN il  on il.il_id=ilce.il_id
         LEFT JOIN rezervasyon_extralari re on re.para_birim_id=ka.para_birim_id
        LEFT JOIN arac_fiyati af on (af.arac_id=ka.arac_id and af.para_birim_id=ka.para_birim_id and af.gun_baslangic<= DATEDIFF(ka.donus_tarihi, ka.alis_tarihi)
                                     and af.gun_bitis>= DATEDIFF(ka.donus_tarihi, ka.alis_tarihi)
                                    );

        
        "));
        return view('kiralanan-araclar', compact('aracVerileri'));
    }

    
    public function createUpdate(Request $request)
    {
        try {
                $id = $request->input('id');
         


                if(intval($id)!==0)
                {
                    $aracVerileri = DB::select(DB::raw("
                    SELECT *
                    FROM `kiralanan_arac` a where id=".$id."
                    "));
                    if(empty($aracVerileri))//boşmu kontrol
                    {
                        $kirArac = new KiralananArac;
                    }
                    else
                    {
                        //validate dogrulama request istek
                        $validatedData = $request->validate([
                            'arac_id' => 'required|integer',
                            'ofis_id' => 'required|integer',
                            'd_ofis_id' => 'required|integer',
                            'alis_tarihi' => 'required|date',
                            'donus_tarihi' => 'required|date',
                            'kiralanan_fiyat' => 'required|integer',
                            'toplam_tutar' => 'required|integer',
                            'para_birim_id' => 'required|integer',
                            'musteri_id' => 'required|integer'
                        ]);
                        $kirArac = KiralananArac::where('id', $id)
                        ->update([
                            'arac_id'=> $validatedData['arac_id'],
                            'alis_yeri_id'=> $validatedData['ofis_id'],
                            'donus_yeri_id'=> $validatedData['d_ofis_id'],
                            'alis_tarihi' => $validatedData['alis_tarihi'],
                            'donus_tarihi'=>$validatedData['donus_tarihi'],
                            'kiralanan_fiyat'=> $validatedData['kiralanan_fiyat'],
                            'toplam_tutar'=> $validatedData['toplam_tutar'],
                            'navigasyon'=>isset($request['navigasyon'])? 1:0,
                            'sofor_hizmeti'=>isset($request['sofor_hizmeti'])? 1:0,
                            'bebek_koltugu'=>isset($request['bebek_koltugu'])? 1:0,
                            'para_birim_id'=>$validatedData['para_birim_id'],
                            'musteri_id'=>$validatedData['musteri_id'],
                            'yol_haritasi'=>isset($request['yol_haritasi'])? 1:0,
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $kirArac = new KiralananArac;
                 }

                 $kirArac ->arac_id = $request->input('arac_id');
                 $kirArac ->alis_yeri_id = $request->input('ofis_id');
                 $kirArac ->donus_yeri_id = $request->input('d_ofis_id');
                 $kirArac ->alis_tarihi = $request->input('alis_tarihi');
                 $kirArac ->donus_tarihi = $request->input('donus_tarihi');
                 $kirArac ->kiralanan_fiyat = $request->input('kiralanan_fiyat');
                 $kirArac ->toplam_tutar = $request->input('toplam_tutar');
                 $kirArac ->navigasyon = $request->input('navigasyon')? 1:0;
                 $kirArac ->sofor_hizmeti =$request->input('sofor_hizmeti') ? 1:0;;
                 $kirArac ->bebek_koltugu =$request->input('bebek_koltugu')? 1:0;;
                 $kirArac ->yol_haritasi =$request->input('yol_haritasi')? 1:0;;
                 $kirArac ->para_birim_id =$request->input('para_birim_id');
                 $kirArac ->musteri_id =$request->input('musteri_id');
                 $kirArac->save();
                 return redirect()->back()->with('success', 'işlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }

    public function deleteMe(Request $request)
    {
        
        try {
            $arackira_id = $request->input('arackira_id');
            $aracsil = DB::table('kiralanan_arac')->where('id', $arackira_id)->delete();
    
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
