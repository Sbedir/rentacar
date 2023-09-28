<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class GenelService
{
    public function arac()
    {
        $data = DB::select(DB::raw("
        SELECT a.*,
     
        CONCAT(m.mr_isim,' / ',mo.m_name,' / ',a.uretim_yili) AS aracadi
       
        FROM `arac` a
        LEFT JOIN marka m ON m.mr_id = a.mr_id
        LEFT JOIN model mo ON mo.m_id = a.m_id
      
        "));

        return  $data;
    }


    public function musteri()
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `musteri`
        "));

        return  $data;
    }

    public function marka()
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `marka`
        "));

        return  $data;
    }

    public function model($marka_id)
    {
        $data = DB::select(DB::raw("
        SELECT * FROM `model` where mr_id=".$marka_id."
        "));
        return  $data;
    }

    public function year()
    {
       $year=[];
        for($i=1990;$i<=date('Y');$i++)
        {
            array_push($year,$i);
        }

        return  $year;
    }

    public function musaitlikDurumu()
    {
        $kategori[1]='Müsait';
        $kategori[2]='Müsait Değil';

        return  $kategori;
    }

    public function kategori()
    {
        $kategori[1]='Ekonomik';
        $kategori[2]='Orta Sınıf';
        $kategori[3]='Üst Sınıf';
        $kategori[4]='VIP';

        return  $kategori;
    }

    public function klimaTur()
    {
        $kategori[1]='Otomatik(Dijital)';
        $kategori[2]='Manuel';

        return  $kategori;
    }

    public function yakitTur()
    {
        $kategori[1]='Benzin';
        $kategori[2]='Lpg';
        $kategori[3]='Benzin/Lpg';
        $kategori[4]='Dizel';
        $kategori[5]='Elektrik';
        $kategori[6]='Hybrit';
        return  $kategori;
    }

    public function vitesTur()
    {
        $kategori[1]='Manuel';
        $kategori[2]='Yarı Otomatik';
        $kategori[3]='Otomatik';
        $kategori[4]='Triptonik';
        return  $kategori;
    }

    public function ofis($ilce)
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `arac_ofis` where ilce_id='.$ilce.'
        "));

        return  $data;
    }

    public function ilce($il)
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `ilce` where il_id=".$il."
        "));

        return  $data;
    }
    public function il()
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `il`
        "));

        return  $data;
    }

    public function paraBirimi()
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `para_birimi`
        "));

        return  $data;
    }


    public function d_ofis($d_ilce)
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `arac_ofis` where ilce_id='.$d_ilce.'
        "));

        return  $data;
    }

    public function d_ilce($d_il)
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `ilce` where il_id=".$d_il."
        "));

        return  $data;
    }
    public function d_il()
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `il`
        "));

        return  $data;
    }

    public function rezarvasyon()
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `rezervasyon_extralari`
        "));

        return  $data;
    }

    public function dil()
    {
        $data = DB::select(DB::raw("
            SELECT * FROM `languages`
        "));

        return  $data;
    }

    public function uniqueName($table,$name,$say=0)
    {
        $kucult=strtolower($name);
        $unique_name=$this->replace_tr($kucult.($say==0?"":"-".$say));
        $data = DB::select(DB::raw("
            SELECT * FROM ".$table." where unique_name='".$unique_name."'
        "));
        if(!empty($data))
        {
            $say++;
            $this->uniqueName($table,$name,$say);
        }

        return  $unique_name;
    }

    public function replace_tr($text) {
        $text = trim($text);
        $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
        $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
        $new_text = str_replace($search,$replace,$text);
        return $new_text;
    } 

}
