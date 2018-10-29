@extends('templates.template')

@section('content')
    <div class="blog">
        <div class="container">
            <div class="posts row col-md-8 ccol-xs-12">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="title">
                            <a href="{{route('mostrar-post', $post->id)}}">
                                <h2>{{$post->titulo}}</h2>
                            </a>
                        </div>
                        <div class="info-post">
                            <div class="row">
                                <div class="date">
                                    <div class="row">
                                        <i class="far fa-calendar-alt"></i>
                                        <h5>{{$post->created_at}}</h5>
                                    </div>
                                </div>
                                <div class="author">
                                    <div class="row">
                                        <i class="fas fa-user-circle"></i>
                                        <h5>by {{$post->titulo}}</h5>
                                    </div>
                                </div>
                                <div class="category">
                                    <div class="row">
                                        <i class="fas fa-chart-line"></i>
                                        <h5>{{$post->categoria}}</h5>
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
                                    {{strip_tags(html_entity_decode($post->conteudo))}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="charge col-md-6 offset-md-3 col-xs-8 offset-xs-2">
                    <button class="button-carregar">Carregar mais</button>
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
                    <form action="">
                        @csrf
                        <input type="text" class="form-control" placeholder="Pesquisar">
                    </form>
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
@endsection
