<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arac;
use App\Models\User;
use App\Models\AracFiyat;
use App\Models\Rezarvasyon;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\GenelService;
// use Illuminate\Support\Facades\Session;
class GenelController extends Controller
{
    protected $genelService;
    
    public function __construct(GenelService $genelService)
    {
        $this->genelService = $genelService;
    }
    public function model(Request $request)
    {   
          $markaId = $request->query('marka_id');
          $modeller = $this->genelService->model($markaId);
          return response()->json($modeller);
    }

    public function ilce(Request $request)
    {   
          $ilId = $request->query('il_id');
          $ilceler = $this->genelService->ilce($ilId);
          return response()->json($ilceler);
    }

    public function ofis(Request $request)
    {   
          $ilceId = $request->query('ilce_id');
          $ofisler = $this->genelService->ofis($ilceId);
          return response()->json($ofisler);
    }

    public function kiralamaucrethesap(Request $request)
    {   
   

      $ilkTarih = Carbon::parse(explode(' ',$request['alis_tarihi'])[0]);

      // İkinci tarihi oluşturun
      $ikinciTarih = Carbon::parse(explode(' ',$request['donus_tarihi'])[0]);

      // İki tarih arasındaki gün farkını hesaplayın
      $fark = $ilkTarih->diffInDays($ikinciTarih);
      $gun=$fark+1;


      $aracfiyatverileri = AracFiyat::where('arac_id', $request['arac_id'])
      ->where('para_birim_id',$request['para_birim'])
      ->where('gun_baslangic', '<=', $gun)
      ->where('gun_bitis', '>=', $gun)
      ->first();
      if($aracfiyatverileri==null)
      {
            return response()->json(['hata'=>'*** '.$gun.' gün için bu araca ait fiyat bilgisi bulunamadı.Lütfen araca gün fiyat bilgisi ekleyiniz!']);
      }
      $rezervasyonfiyatverileri = Rezarvasyon::where('para_birim_id',$request['para_birim'])
      ->first();
      $kiralananFiyat=$aracfiyatverileri->fiyat;
      $toplamFiyat= $kiralananFiyat*$gun;
      if($request['sofor_hizmeti']=='true')
      {
            $toplamFiyat+=$rezervasyonfiyatverileri->sofor_hizmeti*$gun;
      }
      if($request['navigasyon']=='true')
      {
            $toplamFiyat+=$rezervasyonfiyatverileri->navigasyon;
      }
      if($request['bebek_koltugu']=='true')
      {
            $toplamFiyat+=$rezervasyonfiyatverileri->bebek_koltugu;
      }
      if($request['yol_haritasi']=='true')
      {
            $toplamFiyat+=$rezervasyonfiyatverileri->yol_haritasi;
      }

      return response()->json(['kiralananFiyat'=>$kiralananFiyat,'toplamFiyat'=>$toplamFiyat]);
      //     $ilceId = $request->query('ilce_id');
      //     $ofisler = $this->genelService->ofis($ilceId);
      //     return response()->json($ofisler);
    }

    public function logout()
    {

      // session_destroy();
      session()->forget('kullanici');
      return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
    
        // Kullanıcı adına göre kullanıcıyı buluyoruz
        $user = User::where('kullanici_adi', $username)->first();
   
        if ($user) {
          
            // Eğer kullanıcı varsa, şifre kontrolü yapabiliriz
            if (md5($password)==$user->sifre) {
                  session()->put('kullanici', json_encode($user));
                // Şifre doğruysa, kullanıcı giriş yapmıştır
                // İstediğiniz işlemi burada gerçekleştirebilirsiniz
                return redirect()->route('araclar'); // Örnek olarak anasayfaya yönlendiriyoruz
            }
        }
    
        // Eğer kullanıcı adı veya şifre yanlışsa, giriş sayfasına geri dönebiliriz
        return redirect()->route('login')->with('error', 'Kullanıcı adı veya şifre hatalı.');
    }

    
    
    
    
    
 

    
}
