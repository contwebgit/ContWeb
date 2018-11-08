@extends('templates.template')

@section('content')
    <div class="orcamentos">
        <div class="banner"></div>
        <div class="row">
            <div class="bg-orcamentos container">
                @if(!empty($obj->plano))
                    <h2>{{$obj->plano}}</h2>
                @else
                    <h2>{{$obj->servico}}</h2>
                @endif
                <form id="form-orcamento" action="{{route('contratar-view')}}" autocomplete="off" method="POST">
                    @csrf
                    <div class="perguntas">
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
                        @if(count($perguntas) > 0)
                            @foreach($perguntas as $pergunta)
                                <div class="pergunta">
                                    <label for="{{$pergunta->id}}">{{$pergunta->pergunta}}</label>
                                    @if(!empty($pergunta->respostas))
                                        <select name="{{$pergunta->id}}" id="{{$pergunta->id}}" class="form-control" required>
                                            <option value="0:0" checked>---</option>
                                            @foreach(explode("\n", $pergunta->respostas) as $resposta)
                                                <option value="{{explode("|", $resposta)[0]}}:{{intval(explode("|", $resposta)[1])}}">{{explode("|", $resposta)[0]}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" name="resposta-{{$pergunta->id}}" id="{{$pergunta->id}}" class="input-line" placeholder="0">
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="pergunta">
                                <h4>INFELIZMENTE ESTE SERVIÇO NÃO ESTÁ DISPONÍVEL PARA O SEU ESTADO</h4>
                            </div>
                        @endif
                    </div>
                    <div id="total-calc">
                        @if(@!empty($perguntas[0]->plano))
                            <div class="economia" id="fixed-content">
                                <div class="atual">
                                    <h3>R$ </h3>
                                    <input type="text" name="atualmente" id="atualmente" autocomplete="off"  placeholder="Quanto você gasta atualmente?">
                                </div>
                                <div class="economia-total">
                                    <p>Você irá economizar:</p>
                                    <input id="economia-mes" type="text" class="input-line totalAtual" value="R$ 0,00 / Mês" disabled><br>
                                    <span class="menor">ou</span><br>
                                    <input id="economia-ano" type="text" class="input-line totalAtual" value="R$ 0,00 / Ano" disabled>
                                </div>
                            </div>
                        @endif
                        <div class="total">
                            <h3>Seu orçamento é de:</h3>
                            <div class="line">
                                <input id="total" class="input-line totalAtual" value="R$ 0,00" disabled>
                                <input id="totalVal" type="hidden" class="totalAtual" name="total" value="R$ 0,00">
                                <input id="plano" type="hidden" name="plan" value="{{$obj->id}}">
                                <input type="hidden" id="cnpj" name="cnpj" value="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       <div class="container">
           <div class="contratar col-md-6 offset-md-3">
               @if(count($perguntas) > 0)
                   <button id="contratar" class="btn btn-contratar" data-toggle="modal" data-target="#modal" disabled>Contratar</button>
               @else
                   <button id="contratar" class="btn btn-contratar" data-toggle="modal" data-target="#modal" disabled>Contratar</button>
               @endif
           </div>
       </div>
    </div>
    <div class="modal" id="modal-cnpj" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preencha seu CNPJ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="cnpj-aux" class="form-control" placeholder="CNPJ" required>
                </div>
                <div class="modal-footer">
                    <button id="autopreencher" class="btn btn-primary">Ir</button>
                </div>
            </div>
        </div>
    </div>
@endsection
