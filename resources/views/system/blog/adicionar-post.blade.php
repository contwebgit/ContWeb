@extends('system.admin')

@section('admin-content')
   <div class="adicionar-post">
       <div class="container">
           <div class="header">
               <h2>Adicionar Post</h2>
           </div>
           <br>
           <div class="form">
               <form action="{{route('adicionar-post-action')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type="text" name="titulo" placeholder="Título" class="form-control col-md-8 offset-md-2">
                   <br>
                   <select name="categorias" id="categorias" class="form-control col-md-8 offset-md-2">
                       <option value="">Escolha um categoria</option>
                       @foreach($categorias as $categoria)
                           <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                       @endforeach
                   </select>
                   <br>
                   <input type="file" name="imagem" class="form-control col-md-8 offset-md-2">
                   <br>
                   <textarea name="conteudo" id="conteudo" cols="50" rows="10" placeholder="Conteúdo..." class="form-control col-md-8 offset-md-2"></textarea>
                   <br>
                   <button type="submit" class="btn-ac">Salvar</button>
               </form>
           </div>
       </div>
   </div>
@endsection