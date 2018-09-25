<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Categoria;

class BlogController extends Controller
{
    public function addPost(Request $request){
        $post = new Post();
        $post->setAttribute('titulo', $request->input('titulo'));
        $post->setAttribute('conteudo', $request->input('conteudo'));
        $post->setAttribute('author', Auth::id());
        $post->setAttribute('categoria', 1);
        $post->save();

        return redirect()->route('listar-posts');
    }

    public function listarPosts(){
        $posts = Post::All();
        return view('system.blog.listar-posts', compact('posts'));
    }

    public function addCategoria(Request $request){
        $categoria = new Categoria();
        $categoria->setAttribute('categoria', $request->input('categoria'));
        $categoria->save();

        return redirect()->route('listar-categorias');
    }

    public function listarCategorias(){
        $categorias = Categoria::all();;
        return view('system.blog.listar-categorias', compact('categorias'));
    }
}
