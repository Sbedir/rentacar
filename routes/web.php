<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/araclar', 'App\Http\Controllers\AracController@index');
Route::get('/haberler', 'App\Http\Controllers\HaberController@index');
Route::get('/mesajlar', 'App\Http\Controllers\MesajController@index');
Route::get('/kiralanan-araclar', 'App\Http\Controllers\KiralananAracController@index');
Route::get('/musteriler', 'App\Http\Controllers\MusteriController@index');
Route::get('/sayfalar', 'App\Http\Controllers\SayfaController@index');
Route::get('/slider', 'App\Http\Controllers\SliderController@index');
Route::get('/transferler', 'App\Http\Controllers\TransferHizmetController@index');
Route::get('/transferler', 'App\Http\Controllers\TransferHizmetController@index');




Route::get('/genel/model', 'App\Http\Controllers\GenelController@model');
Route::get('/genel/ilce', 'App\Http\Controllers\GenelController@ilce');
Route::get('/genel/ofis', 'App\Http\Controllers\GenelController@ofis');
Route::get('/genel/kiralama-ucret-hesap', 'App\Http\Controllers\GenelController@kiralamaucrethesap');


Route::post('/arac/create-update', 'App\Http\Controllers\AracController@createUpdate')->name('arac.create.update');
Route::post('/haber/create-update', 'App\Http\Controllers\HaberController@createUpdate')->name('haber.create.update');
Route::post('/kiralananarac/create-update', 'App\Http\Controllers\KiralananAracController@createUpdate')->name('kiralananarac.create.update');
Route::post('/musteri/create-update', 'App\Http\Controllers\MusteriController@createUpdate')->name('musteri.create.update');
Route::post('/sayfa/create-update', 'App\Http\Controllers\SayfaController@createUpdate')->name('sayfa.create.update');
Route::post('/slider/create-update', 'App\Http\Controllers\SliderController@createUpdate')->name('slider.create.update');
Route::post('/transfer/create-update', 'App\Http\Controllers\TransferHizmetController@createUpdate')->name('transfer.create.update');

// Route::middleware('cors')->post('genel/model', 'App\Http\Controllers\GenelController@model');

// Route::get('/araclar', function () {
//     return view('araclar');
// });

Route::post('/arac/delete', 'App\Http\Controllers\AracController@deleteMe')->name('arac.delete');
Route::post('/haber/delete', 'App\Http\Controllers\HaberController@deleteMe')->name('haber.delete');
Route::post('/mesaj/delete', 'App\Http\Controllers\MesajController@deleteMe')->name('mesaj.delete');
Route::post('/kiralananarac/delete', 'App\Http\Controllers\KiralananAracController@deleteMe')->name('kiralananarac.delete');
Route::post('/musteri/delete', 'App\Http\Controllers\MusteriController@deleteMe')->name('musteri.delete');
Route::post('/sayfa/delete', 'App\Http\Controllers\SayfaController@deleteMe')->name('sayfa.delete');
Route::post('/slider/delete', 'App\Http\Controllers\SliderController@deleteMe')->name('slider.delete');
Route::post('/transfer/delete', 'App\Http\Controllers\TransferHizmetController@deleteMe')->name('transfer.delete');
















Route::prefix('genel-ayarlar')->group(function () {
    
    Route::get('/arac-fiyatlari', 'App\Http\Controllers\AracFiyatController@index');
    Route::get('/arac-ofisleri', 'App\Http\Controllers\AracOfisController@index');
    Route::get('/il', 'App\Http\Controllers\ilController@index');
    Route::get('/diller', 'App\Http\Controllers\DilController@index');
    Route::get('/markalar', 'App\Http\Controllers\MarkaController@index');
    Route::get('/modeller', 'App\Http\Controllers\AracModelController@index');
    Route::get('/para-birimleri', 'App\Http\Controllers\ParaBirimController@index');
    Route::get('/rezarvasyon-extralari', 'App\Http\Controllers\RezarvasyonController@index');
    Route::get('/translate', 'App\Http\Controllers\TranslateController@index');
    Route::get('/ayarlar', 'App\Http\Controllers\AyarlarController@index');
   
   
    Route::post('/aracfiyat/create-update', 'App\Http\Controllers\AracFiyatController@createUpdate')->name('arac-fiyatlari.create.update');
    Route::post('/aracofis/create-update', 'App\Http\Controllers\AracOfisController@createUpdate')->name('arac-ofis.create.update'); 
    Route::post('/ayarlar/create-update', 'App\Http\Controllers\AyarlarController@createUpdate')->name('ayarlar.create.update'); 
    Route::post('/il/create-update', 'App\Http\Controllers\IlController@createUpdate')->name('il.create.update'); 
    Route::post('/dil/create-update', 'App\Http\Controllers\DilController@createUpdate')->name('dil.create.update'); 
    Route::post('/marka/create-update', 'App\Http\Controllers\MarkaController@createUpdate')->name('marka.create.update'); 
    Route::post('/model/create-update', 'App\Http\Controllers\AracModelController@createUpdate')->name('model.create.update');
    Route::post('/para/create-update', 'App\Http\Controllers\ParaBirimController@createUpdate')->name('para.create.update');
    Route::post('/rezarvasyon/create-update', 'App\Http\Controllers\RezarvasyonController@createUpdate')->name('rezarvasyon.create.update');
    Route::post('/translate/create-update', 'App\Http\Controllers\TranslateController@createUpdate')->name('translate.create.update');


    
    Route::post('/fiyat/delete', 'App\Http\Controllers\AracFiyatController@deleteMe')->name('fiyat.delete');
    Route::post('/ofis/delete', 'App\Http\Controllers\AracOfisController@deleteMe')->name('ofis.delete');
    Route::post('/il/delete', 'App\Http\Controllers\ilController@deleteMe')->name('il.delete');
    Route::post('/dil/delete', 'App\Http\Controllers\DilController@deleteMe')->name('dil.delete');
    Route::post('/marka/delete', 'App\Http\Controllers\MarkaController@deleteMe')->name('marka.delete');
    Route::post('/model/delete', 'App\Http\Controllers\AracModelController@deleteMe')->name('model.delete');
    Route::post('/birim/delete', 'App\Http\Controllers\ParaBirimController@deleteMe')->name('birim.delete');
    Route::post('/rezarvasyon/delete', 'App\Http\Controllers\RezarvasyonController@deleteMe')->name('rezarvasyon.delete');
    Route::post('/translate/delete', 'App\Http\Controllers\TranslateController@deleteMe')->name('translate.delete');

   

   

    

    

   

  
});


