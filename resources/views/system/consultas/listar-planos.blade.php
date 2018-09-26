@extends('system.admin')

@section('admin-content')
    <div class="listar-planos">
        <h2>Planos</h2>
        <div class="container">
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
                            <a class="action-icon" href="">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="action-icon" href="{{route('delete-plano', ['id' => $plano->id ])}}">
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