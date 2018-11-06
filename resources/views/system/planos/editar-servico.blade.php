@extends('system.admin' )

@section('admin-content')
    <div class="adicionar-plano">
        <h2 class="blue">Adicionar Serviço</h2>
        <div class="container">
            <form action="{{route('editar-servico-action', ['id' => $servico->id])}}" method="POST">
                @csrf
                <input value="{{$servico->servico}}" type="text" name="servico" class="form-control" placeholder="Serviço" required>
                <br>
                <input value="{{$servico->preco}}" type="number" name="preco" min="1" class="form-control" step="any" placeholder="Preço" required>
                <br>
                <div class="estados">
                    <h4>Estados:</h4>
                    @foreach(['SP', 'RJ', 'MG', 'GO', 'PR', 'SC', 'RS'] as $estado)
                        <div class="form-check">
                            @if(in_array($estado, explode( ",", $servico->estados) ))
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
                <br><br>
                <div>
                    @if($servico->preencher == 1)
                        <input type="checkbox" name="preencher" value="1" checked>
                    @else
                        <input type="checkbox" name="preencher" value="1">
                    @endif
                    Fazer Consulta na RFB
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
        <br>
        <div class="container">
            <h2 class="blue">Perguntas</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pergunta</th>
                    <th scope="col">Resposta</th>
                    <th scope="col">Estados</th>
                    <th scope="col">Opções</th>
                </tr>
                </thead>
                <tbody>
                @foreach($perguntas as $key => $pergunta)
                    <tr>
                        <th>{{$pergunta->id}}</th>
                        <td>{{$pergunta->pergunta}}</td>
                        <td>{{$pergunta->respostas}}</td>
                        <td>{{$pergunta->estados}}</td>
                        <td>
                            <a class="action-icon" href="{{route('editar-pergunta', [ 'id' => $pergunta->id ])}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="action-icon" href="{{route('delete-pergunta', [ 'id' => $pergunta->id ])}}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route('adicionar-pergunta-servico', ['id' => $servico->id, 'role' => 'servico'])}}" class="btn btn-primary">Adicionar</a>
        </div>
    </div>
@endsection
