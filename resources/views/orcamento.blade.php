@extends('templates.template')

@section('content')
    <div class="orcamentos">
        <div class="banner"></div>
        <div class="bg-orcamentos">
            <form action="">
                <h2>{{$perguntas->plano}}</h2>
                <div class="container offset-md-2">
                    <div class="perguntas col-md-5">
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
                                    <input type="text" name="resposta-{{$pergunta->id}}" id="{{$pergunta->id}}" class="form-control">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
