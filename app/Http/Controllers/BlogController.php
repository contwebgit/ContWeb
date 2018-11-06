<?php

namespace App\Http\Controllers;

use App\Hit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Categoria;

class BlogController extends Controller
{
    public function viewAddPost(){
        $categorias = Categoria::all();
        return view('system.blog.adicionar-post', compact('categorias'));
    }

    public function addPost(Request $request){
        $post = new Post();
        $post->setAttribute('titulo', $request->input('titulo'));
        $post->setAttribute('conteudo', $request->input('conteudo'));
        $post->setAttribute('author', Auth::id());
        $post->setAttribute('categoria', 1);

        $img = $request->file('imagem');
        $ext = $img->extension();
        $filename = time() . '.' . $ext;
        $img->move(public_path('img/'), $filename);

        $post->setAttribute('path', 'img/' . $filename);
        $post->save();

        return redirect()->route('listar-posts');
    }

    public function listarPosts(){
        $posts = Post::All();
        return view('system.blog.listar-posts', compact('posts'));
    }

    public function listarPostsOnPage(){
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('blogs', compact('posts'));
    }

    public function addCategoria(Request $request){
        $categoria = new Categoria();
        $categoria->setAttribute('categoria', $request->input('categoria'));
        $categoria->save();

        return redirect()->route('listar-categorias');
    }

    public function listarCategorias(){
        $categorias = Categoria::all();
        return view('system.blog.listar-categorias', compact('categorias'));
    }

    public function mostrarPost($id){
        $post = Post::find($id);
        $hit = new Hit();
        $hit->setAttribute('postid', $id);
        $hit->save();

        $ids = Hit::all()->groupBy('postid');

        $populares = [];
        foreach ($ids as $id){
            $populares[] = Post::find($id[0]->postid);
        }

        $recentes = Post::orderBy('id', 'desc')->limit(3)->get();

        $categorias = Categoria::all();

        $post_cat = Categoria::find($post->categoria)->categoria;
        $autor = User::find($post->author)->name;

        return view('post',[
            'post' => $post,
            'populares' => $populares,
            'recentes' => $recentes,
            'categorias'=> $categorias,
            'post_cat' => $post_cat,
            'autor' => $autor
        ]);
    }
}
