<?php

namespace App\Http\Controllers;
use App\Models\ilce;
use App\Models\TransferHizmet;
use App\Models\AracOfis;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class ilceController extends Controller
{   public function index(){
    $ilceVerileri = DB::select(DB::raw("
    SELECT ii.*,
    i.il_name AS il
    FROM `ilce` AS ii
    LEFT JOIN il AS i ON ii.il_id = i.il_id

   
   
   
    "));
    return view('ilce', compact('ilceVerileri'));
}

public function createUpdate(Request $request)
{
    try {
            $ilce_id = $request->input('ilce_id');
            


            if(intval($ilce_id)!==0)
            {
                $ilceVerileri = ilce::where('ilce_id', $ilce_id)->first();
                if(empty($ilceVerileri))
                {
                    $ilce = new ilce;
                }
                else
                {
                    $validatedData = $request->validate([
                        'ilce_name' => 'required|string',
                        'il_id' => 'required|integer'
                       
                   
                   
                    ]);
                    $ilce = ilce::where('ilce_id', $ilce_id)
                    ->update([
                        'ilce_name'=> $validatedData['ilce_name'],
                        'il_id'=> $validatedData['il_id']

                      
                    ]);
                    return redirect()->back()->with('success', 'işlem başarılı');
                }
            }
            else
            {
                
                $ilce = new ilce;
             }

             $ilce ->ilce_name = $request->input('ilce_name');
             $ilce ->il_id = $request->input('il_id');

             
            
             $ilce->save();
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
        $aracofis = AracOfis::where('ilce_id', $sil_id)->get()->toArray();
        if(!empty($aracofis))
        {
            session()->flash('error', 'Bu ilce bilgisi daha önceden kullanılmıştır.Bu nedenle silemessiniz.');
            return redirect()->back();
        }

        $TransferHizmet = TransferHizmet::where('alis_yeri', $sil_id)->get()->toArray();
        if(!empty($TransferHizmet))
        {
            session()->flash('error', 'Bu ilce bilgisi transfer hizmetleri sayfasında kullanılmıştır.Bu nedenle silemessiniz.');
            return redirect()->back();
        }

        $TransferHizmet = TransferHizmet::where('donus_yeri', $sil_id)->get()->toArray();
        if(!empty($TransferHizmet))
        {
            session()->flash('error', 'Bu ilce bilgisi transfer hizmetleri sayfasında kullanılmıştır.Bu nedenle silemessiniz.');
            return redirect()->back();
        }
        $sil = DB::table('ilce')->where('ilce_id', $sil_id)->delete();

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

