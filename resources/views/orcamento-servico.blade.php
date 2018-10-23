@extends('templates.template')

@section('content')
    <style>#total-calc{margin-right: 0!important;}</style>
    <div class="orcamentos">
        <div class="banner"></div>
        <form id="form-orcamento-servico" action="{{route('contratar-servico-view')}}" autocomplete="off" method="POST">
            <div class="row">
                <div class="bg-orcamentos container">
                    <h2>{{$obj->servico}}</h2>
                    @csrf
                    <div class="perguntas col-md-6">
                        <div class="pergunta">
                            <label for="estado">Estado:</label>
                            <select name="estado" id="estado-orcamento" class="form-control" required>
                                <option id="SP" value="SP">SP</option>
                                <option id="RJ" value="RJ">RJ</option>
                                <option id="MG" value="MG">MG</option>
                                <option id="GO" value="GO">GO</option>
                                <option id="PR" value="PR">PR</option>
                                <option id="SC" value="SC">SC</option>
                                <option id="RS" value="RS">RS</option>
                            </select>
                        </div>
                        @foreach($perguntas as $pergunta)
                            <div class="pergunta">
                                <label for="{{$pergunta->id}}">{{$pergunta->pergunta}}</label>
                                @if(!empty($pergunta->respostas))
                                    <select name="{{$pergunta->id}}" id="{{$pergunta->id}}" class="form-control" required>
                                        <option value="0:0">0</option>
                                        @foreach(explode("\n", $pergunta->respostas) as $resposta)
                                            <option value="{{explode("|", $resposta)[0]}}:{{intval(explode("|", $resposta)[1])}}">{{explode("|", $resposta)[0]}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" name="resposta-{{$pergunta->id}}" id="{{$pergunta->id}}" class="input-line" placeholder="0">
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div id="total-calc">
                        <div class="total col-md-6">
                            <h3>Seu orçamento é de:</h3>
                            <div class="line">
                                <input id="total" class="input-line totalAtual" name="total" value="R$ 0,00">
                                <input id="servico" type="hidden" name="servico" value="{{$obj->id}}">
                                <input type="hidden" id="cnpj-cpf" name="cnpj-cpf" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="contratar col-md-6 offset-md-3">
                    <button type="submit" id="contratar-servico" class="btn btn-contratar" data-toggle="modal" data-target="#modal">Contratar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
