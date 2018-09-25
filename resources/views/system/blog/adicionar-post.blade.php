@extends('system.admin')

@section('admin-content')
   <div class="adicionar-post">
       <div class="container">
           <div class="header">
               <h2>Adicionar Post</h2>
           </div>
           <br>
           <div class="form">
               <form action="{{route('adicionar-post-action')}}" method="POST">
                   @csrf
                   <input type="text" name="titulo" placeholder="Título" class="form-control col-md-8 offset-md-2">
                   <br>
                   <select name="categorias" id="categorias" class="form-control col-md-8 offset-md-2">
                       <option value="">Escolha um categoria</option>
                   </select>
                   <br>
                   <textarea name="conteudo" id="conteudo" cols="50" rows="10" placeholder="Conteúdo..." class="form-control col-md-8 offset-md-2"></textarea>
                   <br>
                   <button type="submit" class="btn-ac">Salvar</button>
               </form>
           </div>
       </div>
   </div>
@endsection