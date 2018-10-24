@extends('system.admin')

@section('admin-content')
    <div class="editar-pergunta">
        <div role="dialog">
            <div class="container">
                <h2 class="blue">Editar Pergunta</h2>
                <form action="{{route('editar-pergunta-action', ['id' => $pergunta->id])}}" method="POST">
                    @csrf
                    <div class="pergunta">
                        <input type="text" name="pergunta" class="form-control" placeholder="Pergunta" value="{{$pergunta->pergunta}}" required>
                    </div>
                    <br>
                    <div class="respostas">
                        <textarea name="respostas" id="respostas" class="form-control" placeholder="Respostas...(resposta|valor)">{{$pergunta->respostas}}</textarea>
                    </div>
                    <br>
                    <div class="estados">
                        <h4 class="blue">Estados:</h4>
                        @foreach(['SP', 'RJ', 'MG', 'GO', 'PR', 'SC', 'RS'] as $estado)
                            <div class="form-check">
                                @if(in_array($estado, explode( ",", $pergunta->estados) ))
                                    <input class="form-check-input" name="estados[]" type="checkbox" value="{{$estado}}" id="{{$estado}}" checked>
                                @else
                                    <input class="form-check-input" name="estados[]" type="checkbox" value="{{$estado}}" id="{{$estado}}">
                                @endif
                                <label class="form-check-label" for="estados">
                                    {{$estado}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection