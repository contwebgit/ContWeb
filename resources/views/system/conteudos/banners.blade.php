@extends('system.admin')

@section('admin-content')
    <div class="banners pad-admin">
        <form class="form-group" method="POST" enctype="multipart/form-data" action="{{route('save-banners')}}">
            @csrf
            <h2 class="title">Configuração de banners do Site</h2>
            <div class="container">
                <div class="select-banner">
                    <label for="banners">Banner:</label>
                    <select name="opt" class="form-control col-md-6 offset-md-3" id="banners">
                        <option value="">Escolha uma opção</option>
                        <option value="home">Banner da Home</option>
                        <option value="cursos">Banner de Cursos</option>
                        <option value="quem-somos">Banner Quem Somos</option>
                        <option value="empresa">Foto da Empresa</option>
                        <option value="contato">Banner de Contato</option>
                    </select>
                </div>
                <div class="banner">
                    <input type="file" name="banner" class="form-control col-md-6 offset-md-3"/>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Salvar">
        </form>
    </div>
@endsection