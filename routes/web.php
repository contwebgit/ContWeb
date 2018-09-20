<?php

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
    return view('index');
})->name('home');

/** NAVBAR ROUTES */
Route::get('/quem-somos', function () {
    return view('quem-somos');
})->name('quem-somos');

Route::get('blogs', function () {
   return view('blogs');
})->name('blogs');

Route::get('/planos', function () {
   return view('planos');
})->name('planos');

Route::get('/contato', function () {
   return view('contato');
})->name('contato');

Route::get('/o-que-e-contabilidade', function () {
    return view('contabilidade-online');
})->name('o-que-e-contabilidade');

Route::get('/como-funciona', function () {
    return view('como-funciona');
})->name('como-funciona');

Route::get('/posso-optar-servico-online', function () {
    return view('servico-online');
})->name('servico-online');

Route::get('/termos-de-uso', function(){
    return view('termos-de-uso');
})->name('termos-de-uso');


/** ADMIN ROUTES */
Route::get('/admin', function () {
    return view('system.admin');
})->name('admin');

Route::group(['prefix'=>'/conteudos'], function () {
    Route::get('/banners', function () {
        return view('system.conteudos.banners');
    })->name('banners');
    Route::post('/banners', 'ConteudosController@saveBanners')->name('save-banners');
;});

Route::group(['prefix' => '/consultas'], function () {
    Route::get('/planos-mensais', 'ConsultasController@listPerguntas')->name('planos-mensais');
    Route::post('/planos-mensais', 'ConsultasController@addPergunta')->name('add-pergunta');
});

/** AUTH ROUTES */
Auth::routes();


