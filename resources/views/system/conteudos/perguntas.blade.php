@extends('system.admin')

@section('admin-content')
    <div class="listar-planos">
        <div class="container">
            <h2 class="blue">Home Perguntas</h2>
            <div class="mensagem">
                @if(@$s)
                    <span class="badge badge-success">Sua pergunta foi adicionada com sucesso!</span>
                @endif
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pergunta</th>
                    <th scope="col">Resposta</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($perguntas as $pergunta)
                    <tr>
                        <th scope="row">{{$pergunta->id}}</th>
                        <td>{{$pergunta->pergunta}}</td>
                        <td>{{$pergunta->resposta}}</td>
                        <td>
                            <a class="action-icon" href="{{route('editar-plano', ['id' => $pergunta->id])}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="action-icon" href="{{route('delete-plano', ['id' => $pergunta->id])}}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <a href="{{route('adicionar-pergunta-home-view')}}" class="btn btn-primary">Adicionar</a>
        </div>
    </div>
@endsection