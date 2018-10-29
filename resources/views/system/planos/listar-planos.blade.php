@extends('system.admin')

@section('admin-content')
    <div class="listar-planos">
        <div class="container">
            <h2 class="blue">Planos</h2>
            <a href="{{route('adicionar-plano')}}" class="btn-adicionar">Adicionar Plano</a>
            <div class="mensagem">
                @if(@$s)
                    <span class="badge badge-success">Seu Plano Foi adicionado com sucesso!</span>
                @endif
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Plano</th>
                    <th scope="col">Publicado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($planos as $plano)
                    <tr>
                        <th scope="row">{{$plano->id}}</th>
                        <td>{{$plano->plano}}</td>
                        <td>{{$plano->created_at}}</td>
                        <td>
                            <a class="action-icon" href="{{route('editar-plano', ['id' => $plano->id])}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="action-icon" href="{{route('delete-plano', ['id' => $plano->id])}}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection