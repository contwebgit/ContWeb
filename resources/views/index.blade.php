@extends('templates.template')

@section('content')
    <div class="banner-home col-md-12" style="background-image: url('/img/banner-home.png');"></div>
    <div class="questions">
        <div class="container">
            <div class="row">
                <div class="question col-md-4 col-xs-12">
                    <a href="{{route('o-que-e-contabilidade')}}">
                        <img src="{{asset('img/icone-contabilidade-online.png')}}" alt="contabilidade contweb">
                        <h5>O que é contabilidade online?</h5>
                    </a>
                </div>
                <div class="question col-md-4 col-xs-12">
                    <a href="{{route('como-funciona')}}">
                        <img src="{{asset('img/icone-como-funciona.png')}}" alt="contabilidade contweb">
                        <h5>Como funciona?</h5>
                    </a>
                </div>
                <div class="question col-md-4 col-xs-12">
                    <a href="{{route('servico-online')}}">
                        <img src="{{asset('img/icone-servico-online.png')}}" alt="contabilidade contweb">
                        <h5>Posso optar pelo serviço online?</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="statistics">
        <div class="container">
            <div class="row">
                <div class="statistic col-md-3 col-xs-12">
                    <div class="circ offset-md-3 col-md-6">
                        <h5 id="age">+45</h5>
                    </div>
                    <p>Há 45 anos atuando no mercado Contábil</p>
                </div>
                <div class="statistic col-md-3 col-xs-12">
                    <div class="circ offset-md-3 col-md-6">
                        <h5 id="opened">+1500</h5>
                    </div>
                    <p>Empresas Abertas</p>
                </div>
                <div class="statistic col-md-3 col-xs-12">
                    <div class="circ offset-md-3 col-md-6">
                        <h5 id="like">+2000</h5>
                    </div>
                    <p>Empresas Atendidas</p>
                </div>
                <div class="statistic col-md-3 col-xs-12">
                    <div class="circ offset-md-3 col-md-6">
                        <h5 id="clients">+2000</h5>
                    </div>
                    <p>Clients Ativos</p>
                </div>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <div class="info1 col-md-6 align-self-center col-xs-6">
                    <img src="{{asset('img/icone-lampada.png')}}" alt="">
                    <h5>Contabilidade Completa e Especializada<br>
                        para Micro e Pequenas Empresas</h5>
                </div>
                <div class="info2 col-md-6 align-self-center col-xs-6">
                    <h5>Atendimento para os estados:<br>
                        SP - RJ - MG - GO - PR - SC - RS</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="plans" id="plans">
        <div class="container">
            <h2 style="margin-top: 50px;">Planos Mensais</h2>
            <p class="col-xs-10 offset-xs-1">Confira abaixo nossos planos mensais para manter a contabilidade da sua empresa em dia!<br>Selecione um dos planos e formule já seu orçamento!</p>
            <div class="row">
                @foreach($planos as $plano)
                    <div class="plan col-md-{{12/count($planos)}} col-xs-12">
                        <div class="pad">
                            <h5 class="title">{{$plano->plano}}</h5>
                            <hr>
                            <h4>a partir de:</h4>
                            <h2><span>R$</span>{{$plano->preco}}<span>,00 /mês</span></h2>
                            <hr>
                            <ul>
                                <li>Contrato sem fidelidade</li>
                                <li>Não cobramos 13º</li>
                            </ul>
                            <hr>
                            <h3 class="states">Exclusivo para<br>SP/ RJ/ MG/ GO/ PR/ SC/ RS</h3>
                            <hr>
                            <form action="{{route('orcamento-plano', $plano->id, 'plano')}}">
                                <button>SIMULE UM ORÇAMENTO</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="services">
        <div class="container">
            <h2>Serviços Avulsos</h2>
            <div class="row">
                @foreach($servicos as $servico)
                    <div class="col-md-{{12/count($servicos)}} service col-xs-12">
                        <div class="pad">
                            <h4>{{$servico->servico}}</h4>
                            <span class="line"></span>
                            <h5 class="description">Exclusivo para {{$servico->estados}}</h5>
                            <form action="{{route('orcamento-servico', $servico->id, 'servico')}}">
                                <button>SIMULE UM ORÇAMENTO</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="question-accordion">
        <div class="container">
            <h2>- Perguntas?</h2>
            <div class="panel-group col-xs-12" id="accordion">
                @foreach($perguntas as $index => $pergunta)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 data-toggle="collapse" data-parent="#accordion" href="#item{{$index}}" class="panel-title expand">
                                <i class="right-arrow pull-right">+</i>
                                <a>{{$pergunta->pergunta}}</a>
                            </h4>
                        </div>
                        <div id="item{{$index}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                {{$pergunta->resposta}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="courses">
        <div class="container">
            <h2 class="col-md-4 col-xs-10">CONHEÇA OS<br>
                CURSOS CONTWEB</h2>
            <button>CURSOS ONLINE</button>
        </div>
    </div>
@endsection










