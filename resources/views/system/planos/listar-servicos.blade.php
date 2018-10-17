@extends('system.admin')

@section('admin-content')
    <div class="listar-servicos">
        <div class="container">
            <h2 class="blue">Servicos</h2>
            <a href="{{route('adicionar-servico')}}" class="btn-adicionar">Adicionar Plano</a>

            <div class="mensagem">
                @if(@$s)
                    <span class="badge badge-success col-md-12">Seu Serviço foi adicionado com sucesso!</span>
                @endif
                @if(@$d)
                    <span class="badge badge-danger col-md-12">Seu Serviço foi excluido com sucesso!</span>
                @endif
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Estados</th>
                    <th scope="col">Publicado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($servicos as $servico)
                    <tr>
                        <th scope="row">{{$servico->id}}</th>
                        <td>{{$servico->servico}}</td>
                        <td>{{$servico->preco}}</td>
                        <td>{{$servico->estados}}</td>
                        <td>{{$servico->created_at}}</td>
                        <td>
                            <a class="action-icon" href="{{route('editar-servico', ['id' => $servico->id])}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="action-icon" href="{{route('delete-servico', ['id' => $servico->id])}}">
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