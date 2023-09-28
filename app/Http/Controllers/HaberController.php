<?php

namespace App\Http\Controllers;
use App\Models\Haber;
use Illuminate\Http\Request;

use Helper;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Services\GenelService;

class HaberController extends Controller
{
    protected $genelService;
    
    public function __construct(GenelService $genelService)
    {
        $this->genelService = $genelService;
    }
   
    public function index()
    {
        $haberVerileri = DB::select(DB::raw("
        SELECT h.*,
        DATE_FORMAT(h.yayin_tarihi, '%Y-%m-%d') as yayin_tarihi
        FROM `haber_duyuru` AS h
       
    
       
       
       
        "));
      // Tüm kullanıcıları çekmek için

    return view('haberler', compact('haberVerileri'));
    }
    


    public function createUpdate(Request $request)
    {
        try {
                $haber_id = $request->input('haber_id');

                $resimYolu='';
                if($request->file('haber_resim'))
                {
                    $resimYolu='storage/img/'.Helper::imageUpload($request->file('haber_resim'), 'public/img');
                   
                              
                }
               


                if(intval($haber_id)!==0)
                {
                    $haberVerileri = Haber::where('haber_id', $haber_id)->first();
                    if(empty($haberVerileri))
                    {
                        $haber = new Haber;
                    }
                    else
                    {
                        $validatedData = $request->validate([
                            'haber_adi' => 'required|string',
                            'haber_icerik' => 'required|string',
                            'yayin_tarihi' => 'required|date'
                           
                       
                        ]);
                        $haber = Haber::where('haber_id', $haber_id)
                        ->update([
                            'haber_adi'=> $validatedData['haber_adi'],
                            'haber_icerik'=> $validatedData['haber_icerik'],
                            'yayin_tarihi'=> $validatedData['yayin_tarihi'],
                            'haber_resim'=>  $resimYolu==''?$haberVerileri->haber_resim:$resimYolu,
                            'unique_name'=>$haberVerileri->unique_name==''?$this->genelService->uniqueName('haber_duyuru',$request->input('haber_adi')):$haberVerileri->unique_name
                        ]);
                        return redirect()->back()->with('success', 'işlem başarılı');
                    }
                }
                else
                {
                    
                    $haber = new Haber;
                 }

                 $haber ->haber_adi = $request->input('haber_adi');
                 $haber ->haber_icerik = $request->input('haber_icerik');
                 $haber ->yayin_tarihi = $request->input('yayin_tarihi');
                 $haber ->haber_resim = $resimYolu;
                 $haber->unique_name=$this->genelService->uniqueName('haber_duyuru',$request->input('haber_adi'));
                 
                
                 $haber->save();
                 return redirect()->back()->with('success', 'işlem başarılı');
        } catch (Exception $e) {
            // Hata yakalandığında yapılacak işlemler burada yer alır
            dd($e->getMessage()); // Hata mesajını bastırma
        }
    }

    public function deleteMe(Request $request)
    {
        try {
            $haber_id = $request->input('haber_id');
            $aracsil = DB::table('haber_duyuru')->where('haber_id', $haber_id)->delete();
    
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