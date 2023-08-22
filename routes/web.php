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

Route::get('/', function () {
    return view('araclar');
});

Route::get('/araclar', function () {
    return view('araclar');
});

Route::get('/haberler', function () {
    return view('haberler');
});

Route::get('/kiralanan-araclar', function () {
    return view('kiralanan-araclar');
});

Route::get('/musteriler', function () {
    return view('musteriler');
});

Route::get('/mesajlar', function () {
    return view('mesajlar');
});

Route::get('/sayfalar', function () {
    return view('sayfalar');
});

Route::get('/slider', function () {
    return view('slider');
});

Route::get('/transferler', function () {
    return view('transferler');
});

Route::prefix('genel-ayarlar')->group(function () {
    
    Route::get('arac-fiyatlari', function () {
        return view('arac-fiyatlari');
    }); 

    Route::get('arac-ofisleri', function () {
        return view('arac-ofisleri');
    });

    Route::get('ayarlar', function () {
        return view('ayarlar');
    });

    Route::get('il', function () {
        return view('il');
    });

    Route::get('diller', function () {
        return view('diller');
    });

    Route::get('markalar', function () {
        return view('markalar');
    });

    Route::get('modeller', function () {
        return view('modeller');
    });

    Route::get('para-birimleri', function () {
        return view('para-birimleri');
    });

    Route::get('rezarvasyon-extralari', function () {
        return view('rezarvasyon-extralari');
    });

    Route::get('translate', function () {
        return view('translate');
    });

  
});


