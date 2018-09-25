@extends('system.admin')

@section('admin-content')
    <div class="listar-posts">
        <div class="header">
            <h2>
                Lista de Posts
            </h2>
        </div>
       <div class="container">
           <table class="table table-striped">
               <thead>
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">Título</th>
                   <th scope="col">Categoria</th>
                   <th scope="col">Conteúdo</th>
                   <th scope="col">Autor</th>
                   <th scope="col">Publicado</th>
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
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
    </div>
@endsection

