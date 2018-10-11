<?php

namespace App\Http\Controllers;

use App\Contratante;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Compound;

class ContratacaoController extends Controller
{
    public function contratarView(Request $request){
        $total = str_replace( "R$ ", "", $request->input('total'));
        $plano = $request->input('plano');

        if( empty($total) || empty($plano) ){
            return redirect(404);
        }

        return view('formulario-contratar', compact('total', 'plano'));
    }

    public function contratar(Request $request){
        $fields = [
            'date',
            "name_fantasy" ,
            "cnae_main" ,
            "cnae_secondary" ,
            "legal",
            "complement",
            "ente_federative" ,
            "status",
            "status_date",
            "status_reason" ,
            "special" ,
            "special_date" ,
            "share_capital" ,
            "partner" ,
            "qualification"
        ];

        foreach($request->input() as $key => $field){
            if(!in_array($key, $fields) && empty($field)){
                return redirect()->route('contratar-view',['error'=> true]);
            }
        }

        $contratante = new Contratante();

        foreach ($request->input() as $key => $field){
            if($key != '_token') {
                $contratante->setAttribute($key, $field);
            }
            if($key == 'total'){
                $contratante->setAttribute($key, str_replace(",", ".", str_replace("R$ ", "", $field)));
            }
            if($key == 'date'){
                $arrDate = explode('/', $field);
                $date = $arrDate[2] . "-" . $arrDate[1] . "-" . $arrDate[0] . " 00:00:00";
                $contratante->setAttribute($key, $date);
            }
        }

        $contratante->save();

        $email = $request->input('email');

        return redirect()->route('send-email-confirmation', compact('email'));
    }

    public function substituirDadosContrato(){

    }
}
