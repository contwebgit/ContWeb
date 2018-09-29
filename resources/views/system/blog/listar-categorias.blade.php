@extends('system.admin')

@section('admin-content')
    <div class="listar-categorias">
        <div class="container">
            <div class="header">
                <h2>
                    Lista de Categorias
                </h2>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Publicado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <th scope="row">{{$categoria->id}}</th>
                        <td>{{$categoria->categoria}}</td>
                        <td>{{$categoria->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
