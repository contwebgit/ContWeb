<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perguntas;

class ConsultasController extends Controller
{
    public function listPerguntas(){
        $perguntas = Perguntas::all();

        return view('system.consultas.planos-mensais', ['perguntas' => $perguntas]);
    }

    public function addPergunta(Request $request){
        $pergunta = new Perguntas();
        $pergunta->setAttribute('pergunta', $request->input('pergunta'));
        $pergunta->setAttribute('respostas', $request->input('respostas'));
    }
}
//