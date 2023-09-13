<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arac;
use App\Models\AracFiyat;
use App\Models\Rezarvasyon;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\GenelService;
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
      $gun=$fark==0?1:$fark;


      $aracfiyatverileri = AracFiyat::where('arac_id', $request['arac_id'])
      ->where('para_birim_id',$request['para_birim'])
      ->where('gun_baslangic', '<=', $gun)
      ->where('gun_bitis', '>=', $gun)
      ->first();

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

    
}
