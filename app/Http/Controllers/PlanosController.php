<?php

namespace App\Http\Controllers;

use App\Planos;
use Illuminate\Http\Request;
use App\Perguntas;

class PlanosController extends Controller
{

    /**
     * Function that list all plans.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPlanos(){
        $planos = Planos::All();
        return view('index', compact('planos'));
    }

    public function listarPlanos(){
        $planos = Planos::All();
        return view('system.consultas.listar-planos', compact('planos'));
    }

    /**
     * Function that list questions and plans.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPerguntas(){
        $perguntas = Perguntas::all();
        $planos = Planos::all();

        return view('system.consultas.planos-mensais', compact('perguntas', 'planos'));
    }

    /**
     * Function that add a question and plan.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function addPergunta(Request $request){
        $pergunta = new Perguntas();
        $pergunta->setAttribute('pergunta', $request->input('pergunta'));
        $pergunta->setAttribute('respostas', $request->input('respostas'));

        $novoPlano = $request->input('plano-novo');

        if(!empty($novoPlano)){
            if(Planos::where('plano', $novoPlano."-")->first() != null){
                return view('planos-mensais');
            }

            $plano = new Planos();
            $plano->setAttribute('plano', $novoPlano);
            $plano->setAttribute('preco', $request->input('preco-plano'));
            $plano->save();

            $pergunta->setAttribute('plano', $plano->getAttributeValue('id'));
        }else{
            $pergunta->setAttribute('plano', $request->input('plano'));
        }

        $pergunta->save();

        return redirect()->route('planos-mensais');
    }

    /**
     * Function that delete a question.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePergunta($id){
        Perguntas::find($id)->delete();
        return redirect()->route('planos-mensais');
    }

    public function viewEditarPergunta($id){
        $pergunta = Perguntas::find($id);
        $planos = Planos::all();
        return view('system.consultas.editar-pergunta', compact('pergunta', 'planos'));
    }

    /**
     * Function that update a question.
     *
     */
    public function editarPergunta($id, Request $request){
        $pergunta = Perguntas::find($id);

        $pergunta->setAttribute('pergunta', $request->input('pergunta'));
        $pergunta->setAttribute('respostas', $request->input('respostas'));

        $novoPlano = $request->input('plano-novo');

        if(!empty($novoPlano)){
            if(Planos::where('plano', $novoPlano."-")->first() != null){
                return view('planos-mensais');
            }

            $plano = new Planos();
            $plano->setAttribute('plano', $novoPlano);
            $plano->setAttribute('preco', $request->input('preco-plano'));
            $plano->save();

            $pergunta->setAttribute('plano', $plano->getAttributeValue('id'));
        }else{
            $pergunta->setAttribute('plano', $request->input('plano'));
        }

        $pergunta->save();

        return redirect()->route('planos-mensais');
    }

    /**
     * Function that list question and plans for form budget.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orcamentos($id){
        $perguntas = Perguntas::where('plano', $id)->get();
        $plano = Planos::find($id)->first()->plano;
        return view('orcamento', compact('perguntas', 'plano'));
    }

    public function deletePlano($id){
        $plano = Planos::find($id);
        $plano->delete();

        return redirect()->route('listar-planos');
    }
}
