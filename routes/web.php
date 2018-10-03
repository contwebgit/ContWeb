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

Route::get('/', 'PlanosController@listPlanos')->name('home');

/** NAVBAR ROUTES */
Route::get('/quem-somos', function () {
    return view('quem-somos');
})->name('quem-somos');

Route::get('/blog', 'BlogController@listarPostsOnPage')->name('blog');

Route::get('/post/{id}', 'BlogController@mostrarPost')->name('mostrar-post');

Route::get('/planos', function () {
   return view('planos');
})->name('planos');

Route::get('/contato', function () {
   return view('contato');
})->name('contato');

Route::post('/enviar-contato', 'HomeController@enviarContato')->name('enviar-contato');

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

Route::get('/orcamento/{id}', 'PlanosController@orcamentos')->name('orcamento');



/** ADMIN ROUTES */
Route::get('/admin', function () {
    return view('system.admin');
})->name('admin');

Route::group(['prefix'=>'/conteudos'], function () {
    Route::get('/banners', function () {
        return view('system.conteudos.banners');
    })->name('banners');
    Route::post('/banners', 'ConteudosController@saveBanners')->name('save-banners');
});

Route::group(['prefix' => '/planos'], function () {

    Route::get('/perguntas', 'PlanosController@listPerguntas')->name('perguntas');

    /** PERGUNTAS */
    Route::get('/adicionar-pergunta', 'PlanosController@adicionarPerguntaView')->name('adicionar-pergunta');
    Route::post('/adicionar-pergunta', 'PlanosController@adicionarPergunta')->name('adicionar-pergunta-action');

    Route::get('/delete-pergunta/{id}', 'PlanosController@deletePergunta')->name('delete-pergunta');

    Route::get('/editar-pergunta/{id}', 'PlanosController@viewEditarPergunta')->name('editar-pergunta');
    Route::post('/editar-pergunta', 'PlanosController@editarPergunta')->name('editar-pergunta-action');

    /** PLANOS */
    Route::get('/adicionar-plano', function(){
        return view('system.planos.adicionar-plano');
    })->name("adicionar-plano");
    Route::post('/adicionar-plano', 'PlanosController@adicionarPlano')->name('adicionar-plano-action');

    Route::get('/editar-plano/{id}', 'PlanosController@editarPlanoView')->name('editar-plano');
    Route::post('/editar-plano', 'PlanosController@editarPlano')->name('editar-plano-action');

    Route::get('/listar-planos', 'PlanosController@listarPlanos')->name('listar-planos');
    Route::get('/delete-plano/{id}', 'PlanosController@deletePlano')->name('delete-plano');

    /** SERVIÇOS */
    Route::get('/adicionar-servico', function(){
        return view('system.planos.adicionar-servico');
    })->name('adicionar-servico');
    Route::post('/adicionar-servico', 'PlanosController@adicionarServico')->name('adicionar-servico-action');
    Route::get('/listar-servicos', 'PlanosController@listarServicos')->name('listar-servicos');
    Route::get('/delete-servico/{id}', 'PlanosController@deleteServico')->name('delete-servico');
    Route::get('/editar-servico/{id}', 'PlanosController@editarServicoView')->name('editar-servico');
});


Route::group(['prefix' => '/blog'], function () {
    Route::get('/adicionar-post', 'BlogController@viewAddPost')->name('adicionar-post');
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
