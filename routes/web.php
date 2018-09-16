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
});

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


/** AUTH ROUTES */
Route::get('/area-do-cliente', function () {
        return view('system.area-do-cliente');
})->name('area-do-cliente');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
