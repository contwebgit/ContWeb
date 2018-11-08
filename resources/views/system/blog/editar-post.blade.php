@extends('system.admin')

@section('admin-content')
    <div class="adicionar-post box">
        <div class="container">
            <h2 class="blue">Adicionar Post</h2>
            <div class="form">
                <form id="form-add-post" action="{{route('adicionar-post-action')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="titulo" placeholder="Título" class="form-control" value="{{$post->titulo}}">
                    <br>
                    <select name="categorias" id="categorias" class="form-control">
                        <option value="">Escolha um categoria</option>
                        @foreach($categorias as $categoria)
                            @if($post->categoria == $categoria->id)
                                <option selected value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                            @else
                                <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                            @endif
                        @endforeach
                    </select>
                    <br>
                    <input type="file" name="imagem" class="form-control" value="{{$post->path}}">
                    <br>
                    <h4 class="blue">Conteúdo</h4>
                    <div class="editor">
                        <div id="editor" contenteditable="false">
                            <section id="toolbar">
                                <div id="bold" class="icon fas fa-bold"></div>
                                <div id="italic" class="icon fas fa-italic"></div>
                                <div id="underline" class="icon fas fa-underline"></div>
                                <div id="strikeThrough" class="icon fas fa-strikethrough"></div>
                                <div id="createLink" class="icon fas fa-link"></div>
                                <div id="insertUnorderedList" class="icon fas fa-list-ul"></div>
                                <div id="insertOrderedList" class="icon fas fa-list-ol"></div>
                                <div id="justifyLeft" class="icon fas fa-align-left"></div>
                                <div id="justifyRight" class="icon fas fa-align-right"></div>
                                <div id="justifyCenter" class="icon fas fa-align-center"></div>
                                <div id="justifyFull" class="icon fas fa-align-justify"></div>
                            </section>
                            <section id="page" contenteditable="true">
                                {!! $post->conteudo !!}
                            </section>
                        </div>
                    </div>
                    <input type="hidden" name="conteudo" id="conteudo" value="">
                    <br>
                    <button type="button" id="btn-add-post" class="btn btn-primary">Salvar</button>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
@endsection
