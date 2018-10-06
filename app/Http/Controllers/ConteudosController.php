<?php

namespace App\Http\Controllers;

use App\HomePergunta;
use App\ThemeOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConteudosController extends Controller
{

    protected $imageExtensions = [
      'jpg',
      'png',
      'svg'
    ];

    public function saveBanners(Request $request)
    {
        $banner = $request->file('banner');
        $opt = $request->input('opt');

        $path = null;

        if (!empty($banner) && !empty($opt)) {

            $ext = $request->banner->extension();

            $name = "banner-$opt.$ext";

            @unlink(public_path() . '/img/' . $name);

            $banner->move(public_path() . '/img', $name);
        }

        return redirect()->route('banners');
    }

    public function adicionarPergunta(Request $request){
        $pergunta = new HomePergunta();
        $pergunta->setAttribute('pergunta', $request->input('pergunta'));
        $pergunta->setAttribute('resposta', $request->input('resposta'));
        $pergunta->save();

        return redirect()->route('home-perguntas');
    }

    public function listarPerguntas(){
        $perguntas = HomePergunta::all();
        return view('system.conteudos.perguntas', compact('perguntas'));
    }
}
