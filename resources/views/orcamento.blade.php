@extends('templates.template')

@section('content')
    <div class="orcamentos">
        <div class="banner"></div>
        <div class="row">
            <div class="bg-orcamentos container">
                <h2>{{$plano}}</h2>
                <form action="">
                    <div class="perguntas">
                        @foreach($perguntas as $pergunta)
                            <div class="pergunta">
                                <label for="{{$pergunta->id}}">{{$pergunta->pergunta}}</label>
                                @if(!empty($pergunta->respostas))
                                    <select name="resposta-{{$pergunta->id}}" id="{{$pergunta->id}}" class="form-control">
                                        @foreach(explode("\n", $pergunta->respostas) as $resposta)
                                            <option value="{{explode("|", $resposta)[1]}}">{{explode("|", $resposta)[0]}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" name="resposta-{{$pergunta->id}}" id="{{$pergunta->id}}" class="input-line">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </form>
                <div class="container">
                    <div class="economia" id="fixed-content">
                        <div class="atual">
                            <input type="text" name="atualmente" id="atualmente" placeholder="Quanto você gasta atualmente?">
                        </div>
                        <div class="economia-total">
                            <p>Você irá economizar:</p>
                            <span class="menor">R$ </span>
                            <span class="input-line">146</span>
                            <span class="menor">,00 /mês</span><br>
                            <span class="menor">ou<br> R$ </span>
                            <span class="input-line">146</span>
                            <span class="menor">,00 /mês</span>
                        </div>
                    </div>
                    <div class="total">
                        <h3>Seu orçamento é de:</h3>
                        <div class="line">
                            <span class="menor">R$ </span>
                            <span class="input-line">176</span>
                            <span class="menor">,00</span>
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
