<div class="sidebar col-md-4 col-xs-12">
    <div class="popular">
        <h5>Posts Populares</h5>
        @foreach($populares as $post)
            <div class="row col-md-12 col-xs-12 side-pad">
                <div class="post-thumb col-md-3 col-xs-3">
                    <img src="{{asset($post->path)}}" alt="contweb contabilidade">
                </div>
                <div class="col-md-9 col-xs-9" style="margin-top: 13px;">
                    <p>{{$post->titulo}}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="recent">
        <h5>Posts Recentes</h5>
        @foreach($recentes as $post)
            <div class="row col-md-12 col-xs-12 side-pad">
                <div class="post-thumb col-md-3 col-xs-3">
                    <img src="{{asset($post->path)}}" alt="contweb contabilidade">
                </div>
                <div class="col-md-9 col-xs-9" style="margin-top: 13px;">
                    <p>{{$post->titulo}}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="search">
        <i class="fas fa-search"></i>
        <form action="">
            @csrf
            <input type="text" class="form-control" placeholder="Pesquisar">
        </form>
    </div>
    <div class="categories">
        <h5>Categorias</h5>
        <ul>
            @foreach($categorias as $categoria)
                <li>{{$categoria->categoria}}</li>
            @endforeach
        </ul>
    </div>
</div>
