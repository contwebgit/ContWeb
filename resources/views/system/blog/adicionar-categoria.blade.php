@extends('system.admin')

@section('admin-content')
    <div class="adicionar-categorias">
        <div class="header">
            <h2>Adicionar Categoria</h2>
        </div>
        <div class="container">
            <form action="{{route('adicionar-categoria')}}" method="POST">
                @csrf
                <input type="text" name="categoria" placeholder="Categoria"  class="form-control col-md-6 offset-md-3">
                <br>
                <button type="submit" class="btn-ac col-md-4 offset-md-4">Adicionar</button>
            </form>
        </div>
    </div>
@endsection