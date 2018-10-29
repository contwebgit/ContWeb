@extends('system.admin')

@section('admin-content')
    <div class="editar-pergunta">
        <div role="dialog">
            <div class="container">
                <h2 class="blue">Adicionar Pergunta</h2>
                <form action="{{route('adicionar-pergunta-' . $role . '-action',  $obj)}}" method="POST">
                    @csrf
                    @if($role == 'servico')
                        <input type="hidden" name="servico" value="{{$obj}}">
                    @else
                        <input type="hidden" name="plano" value="{{$obj}}">
                    @endif
                    <div class="pergunta">
                        <input type="text" name="pergunta" class="form-control" placeholder="Pergunta" required>
                    </div>
                    <br>
                    <div class="respostas">
                        <textarea name="respostas" id="respostas" class="form-control" placeholder="Respostas...(resposta|valor)"></textarea>
                    </div>
                    <br>
                    <div class="estados">
                        <h4 class="blue">Estados:</h4>
                        @foreach(['SP', 'RJ', 'MG', 'GO', 'PR', 'SC', 'RS'] as $estado)
                            <div class="form-check">
                                <input class="form-check-input" name="estados[]" type="checkbox" value="{{$estado}}" id="{{$estado}}">
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