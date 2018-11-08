@extends('system.admin')

@section('admin-content')
    <div class="listar-posts box">
       <div class="container">
           <h2 class="blue">Lista de Posts</h2>
           <a href="{{route('adicionar-post')}}" class="btn btn-primary">Adicionar Post</a>
           <br>
           <table class="table table-striped">
               <thead>
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">Título</th>
                   <th scope="col">Categoria</th>
                   <th scope="col">Conteúdo</th>
                   <th scope="col">Autor</th>
                   <th scope="col">Publicado</th>
                   <th scope="col">Opções</th>
               </tr>
               </thead>
               <tbody>
               @foreach($posts as $post)
                   <tr>
                       <th scope="row">{{$post->id}}</th>
                       <td>{{$post->titulo}}</td>
                       <td>{{$post->categoria}}</td>
                       <td>{{str_limit($post->conteudo, 40)}}</td>
                       <td>{{$post->author}}</td>
                       <td>{{$post->created_at}}</td>
                       <td>
                           <a class="action-icon" href="{{route('editar-post', ['id' => $post->id])}}">
                               <i class="fas fa-edit"></i>
                           </a>
                           <a class="action-icon" href="{{route('delete-post', ['id' => $post->id])}}">
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

