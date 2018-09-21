<?php

namespace App\Http\Controllers;

use App\Planos;
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

        $novoPlano = $request->input('plano-novo');

        if(!empty($novoPlano)){
            $plano = new Planos();
            $plano->setAttribute('plano', $novoPlano);
            $plano->save();

            $pergunta->setAttribute('plano', $plano->getAttributeValue('id'));
        }else{
            $pergunta->setAttribute('plano', $request->input('plano'));
        }

        $pergunta->save();

        return redirect()->route('planos-mensais');
    }

    public function deletePergunta($id){
        Perguntas::find($id)->delete();
        return redirect()->route('planos-mensais');
    }

    public function updatePergunta($id){

    }

    public function orcamentos(){
        $perguntas = Perguntas::all();
        $planos = Planos::all();
        return view('orcamento', compact('perguntas', 'planos'));
    }
}
//