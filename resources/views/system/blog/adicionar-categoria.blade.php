@extends('system.admin')

@section('admin-content')
    <div class="adicionar-categorias box">
        <div class="container">
            <h2 class="blue">Adicionar Categoria</h2>
            <br>
            <form action="{{route('adicionar-categoria')}}" method="POST">
                @csrf
                <input type="text" name="categoria" placeholder="Categoria"  class="form-control">
                <br>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection