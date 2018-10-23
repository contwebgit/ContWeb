<?php

namespace App\Http\Controllers;

use App\Contratante;
use App\ContratanteServico;
use App\Orcamento;
use App\Perguntas;
use App\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \Mpdf\Mpdf as Mpdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\SendMailableServico;


class ContratacaoController extends Controller
{
    /**
     * Function to list Contratantes model.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listarContratantes(){
        $contratantes = Contratante::all();

        return view('system.dashboard', compact('contratantes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function contratarServicoView(Request $request){
        $total   = str_replace( "R$ ", "", $request->input('total'));
        $servico = $request->input('servico');
        $cpf     = $request->input('cpf');

        if( empty($total) || empty($servico) ){
            return redirect(404);
        }

        $orcamento = new Orcamento();
        $orcamento->setAttribute('total', str_replace(",", ".", $total));
        $orcamento->save();

        foreach($request->request as $key => $value){
            if(gettype($key) == 'integer') {
                $resposta = new Resposta();
                $resposta->setAttribute('orcamento', $orcamento->getAttribute('id'));
                $resposta->setAttribute('pergunta', $key);
                $resposta->setAttribute('resposta', $value);
                $resposta->save();
                unset($resposta);
            }
        }

        $respostas = Resposta::where('orcamento', $orcamento->getAttribute('id'))->get();
        $perguntas = [];

        foreach ($respostas as $key => $value){
            $pergunta = Perguntas::find($value->pergunta);
            $perguntas[$key] = $pergunta->getAttribute('pergunta');
        }


        return view('formulario-contratar-servico', [
            'total'     => $total,
            'servico'   => $servico,
            'cpf'       => $cpf,
            'orcamento' => $orcamento->getAttribute('id'),
            'perguntas' => $perguntas,
            'respostas' => $respostas
        ]);
    }


    public function contratarServico(Request $request){

        $contratante = new ContratanteServico();
        $contratante->setAttribute('orcamento', $request->input('orcamento'));

        foreach ($request->input() as $key => $field){

            if($key != '_token' and $key != 'total') {
                $contratante->setAttribute($key, $field);
            }

            if($key == 'date'){
                $arrDate = explode('/', $field);
                $date = $arrDate[2] . "-" . $arrDate[1] . "-" . $arrDate[0] . " 00:00:00";
                $contratante->setAttribute($key, $date);
            }
        }

        $contratante->save();

        $email = $request->input('email');

        $this->gerarContrato($email, $request->input('orcamento'));

        Mail::to($email)
            ->send(new SendMailableServico());

        unlink(public_path('/tmp/contrato-' . $email . '.pdf'));

        return view('agradecimentos');

    }

    /**
     * Function to return contract view.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function contratarView(Request $request){
        $total = str_replace( "R$ ", "", $request->input('total'));
        $plano = $request->input('plan');
        $cnpj = $request->input('cnpj');

        if( empty($total) || empty($plano) ){
            return redirect(404);
        }

        $orcamento = new Orcamento();
        $orcamento->setAttribute('total', str_replace(",", ".", $total));
        $orcamento->save();

        foreach($request->request as $key => $value){
            if(gettype($key) == 'integer') {
                $resposta = new Resposta();
                $resposta->setAttribute('orcamento', $orcamento->getAttribute('id'));
                $resposta->setAttribute('pergunta', $key);
                $resposta->setAttribute('resposta', $value);
                $resposta->save();
                unset($resposta);
            }
        }

        return view('formulario-contratar', [
            'total' => $total,
            'plano' => $plano,
            'cnpj' => $cnpj,
            'orcamento' => $orcamento->getAttribute('id')
        ]);
    }

    /**
     * Function to contract a plan.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        $contratante = new Contratante();
        $contratante->setAttribute('orcamento', $request->input('orcamento'));

        foreach ($request->input() as $key => $field){
            if(!in_array($key, $fields) && empty($field)){
                unset($contratante);
                return redirect()->route('contratar-view',['error'=> true]);
            }

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

        $this->gerarContrato($email, $request->input('orcamento'));

        Mail::to($email)
            ->send(new SendMailable($email));

        unlink(public_path('/tmp/contrato-' . $email . '.pdf'));

        return view('agradecimentos');
    }

    /**
     * Function to generate contract.
     *
     * @param $email
     * @param $id
     */
    public function gerarContrato($email, $id){
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $contrato = file_get_contents(public_path('contrato/contrato.html'));
        $style = file_get_contents(public_path('contrato/style.css'));

        $respostas = Resposta::where('orcamento', $id)->get();

        $html = '';

        foreach ($respostas as $resposta){
            $pergunta = Perguntas::find($resposta->pergunta);
            $html .= '<li>' . $pergunta->pergunta . ': ' . explode(":", $resposta->resposta)[0] . '</li>';
        }

        $contrato = str_replace('%html%', $html, $contrato);
        $contrato = str_replace('%dia%', date('d'), $contrato);

        $mes = [
            '',
            'Janeiro',
            'fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro'
        ];

        $contrato = str_replace('%mes%', $mes[date('m')], $contrato);
        $contrato = str_replace('%ano%', date('Y'), $contrato);

        try {
            $mpdf = new Mpdf();
            $mpdf->WriteHTML($style, 1);
            $mpdf->WriteHTML($contrato, 2);
            $mpdf->Output(public_path('/tmp/contrato-' . $email . '.pdf'), 'F');
        }catch(\Mpdf\MpdfException $e){
            Log::error($e->getMessage());
            die('Não foi possivel gerar o contrato, tente novamente mais tarde!');
        }
    }
}
