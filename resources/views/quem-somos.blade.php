@extends('templates.template')

@section('content')
    <div class="quem-somos">
        <div class="header-quem-somos"></div>
        <div class="container">
           <div class="row">
               <div class="text col-md-6 col-xs-12">
                   <h2>Nossa História</h2>
                   <p>
                       Nosso escritório foi fundado há mais de 45 anos pelo Técnico Contábil João Augusto Alonso Lazzari, que desde então, em seu pioneirismo de atuação, vêm prestando serviços Contábeis para empresas com sede em Jaú (SP) e demais cidades do Estado de São Paulo.
                   </p>
                   <p>
                       O significado do nome “AGRINCO” resume nossas principais áreas de atuação: AGRÍCOLA, INDUSTRIAL, COMERCIAL e PRESTADORES DE SERVIÇOS (AGRI - IN – CO).
                   </p>
                   <p>
                       Ao longo desses anos e graças a excelência em nossos serviços prestados, hoje estamos instalados em uma sede própria, com cerca de 500m² de área construída e estacionamento exclusivo para nossos clientes. Toda esta infraestrutura é dotada de um moderno conjunto de Hardwares e Softwares, totalmente integrados, para viabilizar e agilizar todos os processos e rotinas executados pelo Escritório.
                   </p>
                   <p>
                       Devido a consequente expansão de nossa carteira de clientes por todo território Paulista, possibilitada pelo rápido avanço da internet, vimos a necessidade de criar um departamento interno, especializado no atendimento de forma digital e sistemática, a fim de atender tal demanda de clientes com a mesma excelência dos serviços presenciais já prestados.
                   </p>
                   <p>
                       Surgiu então a ContWeb - Contabilidade On-Line!
                   </p>
               </div>
               <div class="empresa col-md-6">
                   <img src="{{asset('img/banner-empresa.png')}}" alt="contweb">
               </div>
           </div>
        </div>
    </div>
    <div class="text-center">
        <h2>
            "Há 46 anos cuidando da saúde empresarial."
        </h2>
    </div>
@endsection