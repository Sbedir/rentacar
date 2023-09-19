<?php

namespace App\Http\Controllers;
use App\Models\AracModel;
use Illuminate\Http\Request;
use App\Models\Arac;
use Helper;
use Illuminate\Support\Facades\DB;
use Exception;

class AracModelController extends Controller
{   public function index(){
    $modelVerileri = DB::select(DB::raw("
    SELECT m.*,
    mr.mr_isim AS marka
    FROM `model` AS m
    LEFT JOIN marka AS mr ON mr.mr_id = m.mr_id

   
   
   
    "));
    return view('modeller', compact('modelVerileri'));
}

public function createUpdate(Request $request)
{
    try {
            $m_id = $request->input('m_id');
            


            if(intval($m_id)!==0)
            {
                $modelVerileri = AracModel::where('m_id', $m_id)->first();
                if(empty($modelVerileri))
                {
                    $model = new AracModel;
                }
                else
                {
                    $validatedData = $request->validate([
                        'm_name' => 'required|string',
                        'mr_id' => 'required|integer'
                       
                   
                   
                    ]);
                    $model = AracModel::where('m_id', $m_id)
                    ->update([
                        'm_name'=> $validatedData['m_name'],
                        'mr_id'=> $validatedData['mr_id']

                      
                    ]);
                    return redirect()->back()->with('success', 'işlem başarılı');
                }
            }
            else
            {
                
                $model = new AracModel;
             }

             $model ->m_name = $request->input('m_name');
             $model ->mr_id = $request->input('mr_id');

             
            
             $model->save();
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

        $arac = Arac::where('m_id', $sil_id)->get()->toArray();
        if(!empty($arac))
        {
            session()->flash('error', 'Bu model arac sayfasında kullanılmıştır.Bu nedenle silemessiniz.');
            return redirect()->back();
        }
        $sil = DB::table('model')->where('m_id', $sil_id)->delete();

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
