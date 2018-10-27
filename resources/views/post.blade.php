@extends('templates.template')

@section('content')
    <div class="post-single">
       <div class="container">
           <div class="header">
               <h2>{{$post->titulo}}</h2>
           </div>
           <div class="info-post">
               <div class="row">
                   <div class="date">
                       <div class="row">
                           <i class="far fa-calendar-alt"></i>
                           <h5>{{$post->created_at}}</h5>
                       </div>
                   </div>
                   <div class="author">
                       <div class="row">
                           <i class="fas fa-user-circle"></i>
                           <h5>by {{$post->titulo}}</h5>
                       </div>
                   </div>
                   <div class="category">
                       <div class="row">
                           <i class="fas fa-chart-line"></i>
                           <h5>{{$post->categoria}}</h5>
                       </div>
                   </div>
               </div>
           </div>
           <div class="content">

               <p>{{$post->conteudo }}</p>
           </div>
       </div>
    </div>
@endsection
