@extends('templates.app')

@section('content')
    <div class="wrapper">
        <button id="show" class="btn"><i class="fas fa-arrow-circle-right"></i></button>
        <div class="main-sidebar">
            <div class="bg-iconbar"></div>
            <ul class="menu">
                <li id="conteudos">
                    <div class="icon">
                        <i id="icon-conteudos" class="fab fa-wpforms"></i>
                    </div>
                    <a href="#">Conteúdos</a>
                    <div id="sub-conteudos">
                        <ul>
                            <li>
                                <a href="{{route('banners')}}">Banners</a>
                            </li>
                            <li>
                                <a href="">Contador</a>
                            </li>
                            <li>
                                <a href="{{route('home-perguntas')}}">Perguntas</a>
                            </li>
                            <li>
                                <a href="">Links</a>
                            </li>
                            <li>
                                <a href="">Modal</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr>
                <li id="planos">
                    <div class="icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <a href="#">Planos</a>
                    <div id="sub-planos">
                        <ul>
                            <li>
                                <a href="{{route('listar-servicos')}}">Serviços Avulsos</a>
                            </li>
                            <li>
                                <a href="{{route('listar-planos')}}">Planos</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr>
                <li id="blogs">
                    <div class="icon">
                        <i class="fab fa-blogger-b"></i>
                    </div>
                    <a href="#">Blog</a>
                    <div id="sub-blogs">
                        <ul>
                            <li>
                                <a href="{{route('listar-posts')}}">Posts</a>
                            </li>
                            <li>
                                <a href="{{route('listar-categorias')}}">Categorias</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr>
                <li><div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    <a href="#">Controle</a>
                </li>
                <hr>
                <li id="configuracoes">
                    <div class="icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <a href="#">Configurações</a>
                    <div id="sub-configuracoes">
                        <ul>
                            <li>
                                <a href="{{route('upload-contrato')}}">Template do Contrato</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr>
            </ul>
        </div>
        <div id="admin-content">
            <!-- ADMIN CONTENT -->
            @yield('admin-content')
        </div>
@endsection