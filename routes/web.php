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

Route::get('/', 'ConsultasController@listPlanos')->name('home');

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

Route::get('/orcamento/{id}', 'ConsultasController@orcamentos')->name('orcamento');


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
    Route::post('/add-pergunta', 'ConsultasController@addPergunta')->name('add-pergunta');
    Route::get('/delete-pergunta/{id}', 'ConsultasController@deletePergunta')->name('delete-pergunta');
    //Route::get('/update-pergunta/{id}', 'ConsultasController@updatePergunta')->name('update-pergunta');
});

Route::group(['prefix' => '/blog'], function () {
    Route::get('/adicionar-post', function () {
       return view('system.blog.adicionar-post');
    })->name('adicionar-post');
    Route::post('/adicionar-post', 'BlogController@addPost')->name('adicionar-post-action');

    Route::get('/listar-posts', 'BlogController@listarPosts')->name('listar-posts');

    Route::post('/adicionar-categoria', 'BlogController@addCategoria')->name('adicionar-categoria-action');

    Route::get('/adicionar-categoria', function () {
        return view('system.blog.adicionar-categoria');
    })->name('adicionar-categoria');

    Route::get('/listar-categorias', 'BlogController@listarCategorias')->name('listar-categorias');
});

/** AUTH ROUTES */
Auth::routes();


