@extends('system.admin')

@section('admin-content')
    <div class="banners">
        <form class="form-group" method="POST" enctype="multipart/form-data" action="{{route('save-banners')}}">
            @csrf
            <h2 class="title blue">Configuração de banners do Site</h2>
            <br>
            <div class="container">
            <label for="banners">Banner:</label>
            <select name="opt" class="form-control">
                <option value="">Escolha uma opção</option>
                <option value="home">Banner da Home</option>
                <option value="cursos">Banner de Cursos</option>
                <option value="quem-somos">Banner Quem Somos</option>
                <option value="empresa">Foto da Empresa</option>
                <option value="contato">Banner de Contato</option>
            </select>
            <br>
            <input type="file" name="banner" class="form-control"/>
            <br>
            <input type="submit" class="btn btn-primary" value="Salvar">
            </div>
        </form>
    </div>
@endsection