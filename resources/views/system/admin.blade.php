@extends('templates.app');

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
                    <div id="sub-conteudos" class="hide">
                        <ul>
                            <li>
                                <a href="">Banners</a>
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
                <li>
                    <div class="icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <a href="#">Consultas</a>
                </li>
                <li><div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    <a href="#">Controle</a>
                </li>
                <li>
                    <div class="icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <a href="#">Configurações</a>
                </li>
            </ul>
        </div>
@endsection