@extends('templates.template')

@section('content')
    <div class="post-single">
       <div class="container">
           <div class="row">
               <div class="post col-md-8">
                   <div class="header-post">
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
                                   <h5>by {{$autor}}</h5>
                               </div>
                           </div>
                           <div class="category">
                               <div class="row">
                                   <i class="fas fa-chart-line"></i>
                                   <h5>{{$post_cat}}</h5>
                               </div>
                           </div>
                       </div>
                   </div>
                   <img width="100%" src="{{asset($post->path)}}" alt="{{$post->titulo}}">
                   <div class="content">
                       <p>{!! $post->conteudo !!}</p>
                   </div>
               </div>
               @include('templates.sidebar-blog')
           </div>
       </div>
    </div>
@endsection
