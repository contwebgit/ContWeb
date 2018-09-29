@extends('system.admin')

@section('admin-content')
    <div class="editar-plano adicionar-plano">
        <h2 class="blue">Editar Plano</h2>
        <div class="container">
            <form action="{{route('editar-plano-action', ['id' => $plano->id])}}" method="POST">
                @csrf
                <input value="{{$plano->plano}}" type="text" name="plano" class="form-control" placeholder="Plano"  required>
                <br>
                <input value="{{$plano->preco}}" type="number" name="preco" min="1" class="form-control" step=".01" placeholder="Preço" required>
                <button type="submit" class="btn btn-primary">Salvar</button>
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
            <a href="{{route('adicionar-pergunta', ['id' => $plano->id])}}" class="btn btn-primary">Adicionar</a>
        </div>
    </div>
@endsection