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

Route::get('/orcamento/servico/{id}/{estado}', 'PlanosController@orcamentoServico')->name('orcamento-servico');

Route::get('/orcamento/plano/{id}/{estado}', 'PlanosController@orcamentoPlano')->name('orcamento-plano');

/** ADMIN ROUTES */
Route::get('/admin', 'ContratacaoController@listarContratantes')->name('admin');

/** CONTEUDOS */
Route::group(['prefix'=>'/conteudos'], function () {
    Route::get('/banners', function () {
        return view('system.conteudos.banners');
    })->name('banners');
    Route::post('/banners', 'ConteudosController@saveBanners')->name('save-banners');

    Route::get('/list-perguntas', 'ConteudosController@listarPerguntas')->name('home-perguntas');
    Route::get('/adicionar-pergunta', function(){
        return view('system.conteudos.adicionar-pergunta');
    })->name('adicionar-pergunta-home-view');
    Route::post('/adicionar-pergunta', 'ConteudosController@adicionarPergunta')->name('adicionar-pergunta-home-action');
});

/** PLANOS */
Route::group(['prefix' => '/planos'], function () {
    Route::get('/perguntas', 'PlanosController@listPerguntas')->name('perguntas');

    /** PERGUNTAS */
    Route::get('/adicionar-pergunta/plano/{id}', 'PlanosController@adicionarPerguntaView')->name('adicionar-pergunta-plano');
    Route::post('/adicionar-pergunta/plano/', 'PlanosController@adicionarPerguntaPlano')->name('adicionar-pergunta-plano-action');

    Route::get('/adicionar-pergunta/servico/{id}', 'PlanosController@adicionarPerguntaView')->name('adicionar-pergunta-servico');
    Route::post('/adicionar-pergunta/servico/', 'PlanosController@adicionarPerguntaServico')->name('adicionar-pergunta-servico-action');

    Route::get('/delete-pergunta/{id}', 'PlanosController@deletePergunta')->name('delete-pergunta');

    Route::get('/editar-pergunta/{id}', 'PlanosController@viewEditarPergunta')->name('editar-pergunta');
    Route::post('/editar-pergunta/{id}', 'PlanosController@editarPergunta')->name('editar-pergunta-action');

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
    Route::post('/editar-servico', 'PlanosController@editarServicoView')->name('editar-servico-action');

});

/** CONFIGURAÇÕES */
Route::group(['prefix' => 'configuracoes'],function(){
    Route::get('/template-contrato', function(){
        return view('system.configuracoes.upload-contrato');
    })->name('upload-contrato');
    Route::post('/template-contrato', 'ConfiguracoesController@uploadTemplateContrato')->name('upload-contrato-action');
});

/** BLOGS */
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

/** CONTRATAR */
Route::group(['prefix' => 'contratar'], function(){
    Route::post('/plano', 'ContratacaoController@contratarView')->name('contratar-view');
    Route::post('/plano-action', 'ContratacaoController@contratar')->name('contratar-action');

    Route::post('/servico', 'ContratacaoController@contratarServicoView')->name('contratar-servico-view');
    Route::post('/servico-action', 'ContratacaoController@contratarServico')->name('contratar-servico-action');
});

/** MAIL */
Route::get('/send/email', 'MailController@emailConfirmacao')->name('send-email-confirmation');

/** AUTH ROUTES */
Auth::routes();

