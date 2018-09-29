@extends('templates.app')

@section('content')
    <div class="wrapper">
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
                                <a href="">Perguntas</a>
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
                                <a href="{{route('perguntas')}}">Perguntas</a>
                            </li>
                            <li>
                                <a href="{{route('adicionar-plano')}}">Adicionar Plano</a>
                            </li>
                            <li>
                                <a href="">Serviços Avulsos</a>
                            </li>
                            <li>
                                <a href="">Contrato de Planos Mensais</a>
                            </li>
                            <li>
                                <a href="{{route('listar-planos')}}">Listar Planos</a>
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
                                <a href="{{route('adicionar-post')}}">Adicionar Post</a>
                            </li>
                            <li>
                                <a href="{{route('listar-posts')}}">Listar Posts</a>
                            </li>
                            <li>
                                <a href="{{route('adicionar-categoria')}}">Adicionar Categoria</a>
                            </li>
                            <li>
                                <a href="{{route('listar-categorias')}}">Listar Categoria</a>
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
                <li>
                    <div class="icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <a href="#">Configurações</a>
                </li>
                <hr>
            </ul>
        </div>
        <div id="admin-content">
            <!-- ADMIN CONTENT -->
            @yield('admin-content')
        </div>
@endsection