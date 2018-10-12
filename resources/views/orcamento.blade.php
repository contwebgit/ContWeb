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
                <form action="" autocomplete="off">
                    @csrf
                    <div class="perguntas">
                        @foreach($perguntas as $pergunta)
                            <div class="pergunta">
                                <label for="{{$pergunta->id}}">{{$pergunta->pergunta}}</label>
                                @if(!empty($pergunta->respostas))
                                    <select name="resposta-{{$pergunta->id}}" id="{{$pergunta->id}}" class="form-control">
                                        <option value="0">0</option>
                                        @foreach(explode("\n", $pergunta->respostas) as $resposta)
                                            <option value="{{intval(explode("|", $resposta)[1])}}">{{explode("|", $resposta)[0]}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" name="resposta-{{$pergunta->id}}" id="{{$pergunta->id}}" class="input-line" placeholder="0">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </form>
                <div class="container">
                    @if(@!empty($perguntas[0]->plano))
                        <div class="economia" id="fixed-content">
                            <div class="atual">
                                <h3>R$ </h3>
                                <input type="number" name="atualmente" id="atualmente" autocomplete="off"  placeholder="Quanto você gasta atualmente?">
                            </div>
                            <div class="economia-total">
                                <p>Você irá economizar:</p>
                                <input id="economia-mes" type="text" class="input-line totalAtual" value="R$ 0,00"><br>
                                <span class="menor">ou</span><br>
                                <input id="economia-ano" type="text" class="input-line totalAtual" value="0,00">
                            </div>
                        </div>
                    @endif
                    <div class="total">
                        <h3>Seu orçamento é de:</h3>
                        <div class="line">
                            <form id="form-contratar" action="{{route('contratar-view')}}" method="POST">
                                @csrf
                                <input id="total" class="input-line totalAtual" name="total" value="R$ 0,00">
                                <input id="plano" type="hidden" name="plano" value="{{$obj->id}}">
                                <input type="hidden" id="cnpj" name="cnpj" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="container">
           <div class="contratar col-md-6 offset-md-3">
               <a href="" id="contratar" class="contratar" data-toggle="modal" data-target="#modal">Contratar</a>
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
