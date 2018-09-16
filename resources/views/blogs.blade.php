@extends('templates.template')

@section('content')
    <div class="blog">
        <div class="banner">
            <!--div class="content">
                <h2>Blog da ContWEB</h2>
                <h5>Aqui você encontra tutoriais, dicas e novidades sobre contabilidade e contabilidade online</h5>
            </div-->
        </div>
        <div class="container">
            <div class="posts col-md-8 ccol-xs-12">
                <div class="post">
                    <div class="title">
                        <h2>Exemplo Post 1</h2>
                    </div>
                    <div class="info-post">
                        <div class="row">
                            <div class="date">
                                <div class="row">
                                    <i class="far fa-calendar-alt"></i>
                                    <h5>15/09/2018</h5>
                                </div>
                            </div>
                            <div class="author">
                                <div class="row">
                                    <i class="fas fa-user-circle"></i>
                                    <h5>by Lauan Guermandi</h5>
                                </div>
                            </div>
                            <div class="category">
                                <div class="row">
                                    <i class="fas fa-chart-line"></i>
                                    <h5>Contabilidade</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <span class="split-style col-md-12 col-xs-12 ss-blue"></span>
                        <span class="split-style col-md-12 col-xs-12 ss-orange"></span>
                        <span class="split-style col-md-12 col-xs-12 ss-gray"></span>
                    </div>
                    <div class="post-content">
                        <div class="row col-md-12 col-xs-12">
                            <div class="post-thumb col-md-3 col-xs-3">
                                <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post">
                    <div class="title">
                        <h2>Exemplo Post 2</h2>
                    </div>
                    <div class="info-post">
                        <div class="row">
                            <div class="date">
                                <div class="row">
                                    <i class="far fa-calendar-alt"></i>
                                    <h5>15/09/2018</h5>
                                </div>
                            </div>
                            <div class="author">
                                <div class="row">
                                    <i class="fas fa-user-circle"></i>
                                    <h5>by Lauan Guermandi</h5>
                                </div>
                            </div>
                            <div class="category">
                                <div class="row">
                                    <i class="fas fa-chart-line"></i>
                                    <h5>Contabilidade</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <span class="split-style col-md-12 col-xs-12 ss-blue"></span>
                        <span class="split-style col-md-12 col-xs-12 ss-orange"></span>
                        <span class="split-style col-md-12 col-xs-12 ss-gray"></span>
                    </div>
                    <div class="post-content">
                        <div class="row col-md-12 col-xs-12">
                            <div class="post-thumb col-md-3 col-xs-3">
                                <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post">
                    <div class="title">
                        <h2>Exemplo Post 3</h2>
                    </div>
                    <div class="info-post">
                        <div class="row">
                            <div class="date">
                                <div class="row">
                                    <i class="far fa-calendar-alt"></i>
                                    <h5>15/09/2018</h5>
                                </div>
                            </div>
                            <div class="author">
                                <div class="row">
                                    <i class="fas fa-user-circle"></i>
                                    <h5>by Lauan Guermandi</h5>
                                </div>
                            </div>
                            <div class="category">
                                <div class="row">
                                    <i class="fas fa-chart-line"></i>
                                    <h5>Contabilidade</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="line">
                       <span class="split-style col-md-12 col-xs-12 ss-blue"></span>
                       <span class="split-style col-md-12 col-xs-12 ss-orange"></span>
                       <span class="split-style col-md-12 col-xs-12 ss-gray"></span>
                   </div>
                    <div class="post-content">
                        <div class="row col-md-12 col-xs-12">
                            <div class="post-thumb col-md-3 col-xs-3">
                                <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar col-md-4 col-xs-12">
                <div class="popular">
                    <h5>Posts Populares</h5>
                    <div class="row col-md-12 col-xs-12 side-pad">
                        <div class="post-thumb col-md-3 col-xs-3">
                            <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                        </div>
                        <div class="col-md-9 col-xs-9">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                            </p>
                        </div>
                    </div>
                    <div class="row col-md-12 col-xs-12 side-pad">
                        <div class="post-thumb col-md-3 col-xs-3">
                            <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                        </div>
                        <div class="col-md-9 col-xs-9">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                            </p>
                        </div>
                    </div>
                    <div class="row col-md-12 col-xs-12 side-pad">
                        <div class="post-thumb col-md-3 col-xs-3">
                            <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                        </div>
                        <div class="col-md-9 col-xs-9">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="recent">
                    <h5>Posts Recentes</h5>
                    <div class="row col-md-12 col-xs-12 side-pad">
                        <div class="post-thumb col-md-3 col-xs-3">
                            <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                        </div>
                        <div class="col-md-9 col-xs-9">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                            </p>
                        </div>
                    </div>
                    <div class="row col-md-12 col-xs-12 side-pad">
                        <div class="post-thumb col-md-3 col-xs-3">
                            <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                        </div>
                        <div class="col-md-9 col-xs-9">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                            </p>
                        </div>
                    </div>
                    <div class="row col-md-12 col-xs-12 side-pad">
                        <div class="post-thumb col-md-3 col-xs-3">
                            <img src="{{asset('img/blog.jpg')}}" alt="contweb contabilidade">
                        </div>
                        <div class="col-md-9 col-xs-9">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="search">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Pesquisar">
                </div>
                <div class="categories">
                    <h5>Categorias</h5>
                    <ul>
                        <li>Contanilidade</li>
                        <li>Dicas</li>
                        <li>Tutorias</li>
                        <li>Novidades</li>
                        <li>Contabilidade Online</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="charge col-md-5 offset-md-2 col-xs-8 offset-xs-2">
        <button class="button-carregar">Carregar mais</button>
    </div>
@endsection
