@extends('system.admin')

@section('admin-content')
   <div class="adicionar-post box">
       <div class="container">
           <h2 class="blue">Adicionar Post</h2>
           <div class="form">
               <form action="{{route('adicionar-post-action')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type="text" name="titulo" placeholder="Título" class="form-control">
                   <br>
                   <select name="categorias" id="categorias" class="form-control">
                       <option value="">Escolha um categoria</option>
                       @foreach($categorias as $categoria)
                           <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                       @endforeach
                   </select>
                   <br>
                   <input type="file" name="imagem" class="form-control">
                   <br>
                   <textarea name="conteudo" id="conteudo" cols="50" rows="10" placeholder="Conteúdo..." class="form-control"></textarea>
                   <br>
                   <button type="submit" class="btn btn-primary">Salvar</button>
               </form>
           </div>
       </div>
   </div>
@endsection