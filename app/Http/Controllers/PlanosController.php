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

    /**
     * Function that list plans.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listarPlanos(){
        $planos = Planos::All();
        return view('system.planos.listar-planos', compact('planos'));
    }

    /**
     * Function that list questions and plans.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPerguntas(){
        $perguntas = Perguntas::all();
        $planos = Planos::all();

        return view('system.planos.perguntas', compact('perguntas', 'planos'));
    }

    /**
     * Function that add a plan.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adicionarPlano(Request $request){
        $plano = new Planos();
        $plano->setAttribute('plano', $request->input('plano'));
        $plano->setAttribute('preco', $request->input('preco'));

        if(!empty($plano->getAttribute('plano')) && !empty($plano->getAttribute('preco'))) {
            $plano->save();
            return redirect()->route('listar-planos', ['s' => true]);
        }

        return redirect()->route('adicionar-plano', ['s' => false]);
    }

    /**
     * Function that return a view to edit a plan.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function editarPlanoView($id){
        $plano = Planos::find($id);
        $perguntas = Perguntas::where('plano', $id)->get();

        if(!empty($plano)){
            return view('system.planos.editar-plano', compact('plano', 'perguntas'));
        }

        return redirect(404);
    }

    /**
     * Function to edit plan.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editarPlano(Request $request){
        $id = $request->get('id');
        $plano = Planos::find($id);

        $plano->setAttribute('plano', $request->input('plano'));
        $plano->setAttribute('preco', $request->input('preco'));
        $plano->save();

        return redirect()->route('listar-planos');

    }

    /**
     * Function to delete a plan.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deletePlano($id){
        $plano = Planos::find($id);
        $plano->delete();

        return view('system.planos.listar-planos');
    }

    public function adicionarPerguntaView(Request $request){
        $plano = $request->get('id');
        return view('system.planos.adicionar-pergunta', compact('plano'));
    }

    /**
     * Function that add a question and plan.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function adicionarPergunta(Request $request){
        $pergunta = new Perguntas();
        $pergunta->setAttribute('pergunta', $request->input('pergunta'));
        $pergunta->setAttribute('respostas', $request->input('respostas'));
        $pergunta->setAttribute('estados', implode(",", $request->input('estados')));
        $pergunta->setAttribute('plano', $request->get('id'));

        $pergunta->save();

        return redirect()->route('editar-plano', ['id' => $request->get('id')]);
    }

    /**
     * Function that delete a question.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePergunta($id){
        $pergunta = Perguntas::find($id);
        $plano = $pergunta->plano;
        $pergunta->delete();
        return redirect()->route('editar-plano', ['id' => $plano]);
    }

    /**
     * Function return a view to edit a question.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewEditarPergunta($id){
        $pergunta = Perguntas::find($id);
        $plano = Planos::find($pergunta->plano);
        return view('system.planos.editar-pergunta', compact('pergunta', 'plano'));
    }

    /**
     * Function to edit a question.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editarPergunta(Request $request){
        $id = $request->get('id');
        $pergunta = Perguntas::find($id);
        $plano = $pergunta->plano;

        $pergunta->setAttribute('pergunta', $request->input('pergunta'));
        $pergunta->setAttribute('respostas', $request->input('respostas'));
        $pergunta->setAttribute('estados', implode(",", $request->input('estados')));

        $pergunta->save();

        return redirect()->route('editar-plano', ['id' => $plano]);
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

}
