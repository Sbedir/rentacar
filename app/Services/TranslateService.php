<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class TranslateService
{
    public function t($unic_name)
    {
        $data = DB::select(DB::raw("
            SELECT tr.translate_id translate_id_tr, tr.unic_name unic_name_tr, tr.name name_tr, tr.language_id language_id_tr,
            en.translate_id translate_id_en, en.unic_name unic_name_en, en.name name_en, en.language_id language_id_en
            FROM `translate` tr 
            LEFT JOIN translate en ON en.unic_name = tr.unic_name AND en.language_id = 2
            WHERE tr.language_id = 1 AND tr.unic_name = '".$unic_name."'
        "));

        if (!isset($data[0])) {
            DB::table('translate')->insert([
                'unic_name' => $unic_name,
                'name' => $unic_name,
                'language_id' => 1,
            ]);
            return $this->t($unic_name);
        }

        return isset($data[0]) ? $data[0]->name_tr : '';
    }
}
