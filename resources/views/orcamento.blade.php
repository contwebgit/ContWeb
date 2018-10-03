@extends('templates.template')

@section('content')
    <div class="orcamentos">
        <div class="banner"></div>
        <div class="row">
            <div class="bg-orcamentos container">
                <h2>{{$plano}}</h2>
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
                    <div class="economia" id="fixed-content">
                        <div class="atual">
                            <h3>R$ </h3>
                            <input type="number" name="atualmente" id="atualmente" autocomplete="off"  placeholder="Quanto você gasta atualmente?">
                        </div>
                        <div class="economia-total">
                            <p>Você irá economizar:</p>
                            <input id="economia-mes" type="text" class="input-line totalAtual" value="R$ 0,00"><br>
                            <span class="menor">ou</span><br>
                            <input id="economia-ano" type="text" class="input-line totalAtual" value="R$ 0,00">
                        </div>
                    </div>
                    <div class="total">
                        <h3>Seu orçamento é de:</h3>
                        <div class="line">
                            <input id="total" class="input-line totalAtual" value="R$ 0,00"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="container">
           <div class="contratar col-md-6 offset-md-3">
               <a href="" class="contratar col-md-12">Contratar Plano</a>
           </div>
       </div>
    </div>
@endsection
