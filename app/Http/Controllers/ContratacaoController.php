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
        $contratantesServico = ContratanteServico::all();

        return view('system.dashboard', compact('contratantes', 'contratantesServico'));
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

            if($key == 'estado'){
                $contratante->setAttribute($key, explode( ":", $field)[1]);
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

        $orcamento = Orcamento::find($respostas[0]->getAttribute('orcamento'));

        $html = '';

        foreach ($respostas as $resposta){
            $pergunta = Perguntas::find($resposta->pergunta);
            $html .= '<li>' . $pergunta->pergunta . ': ' . explode(":", $resposta->resposta)[0] . '</li>';
        }

        $contrato = str_replace('%html%', $html, $contrato);
        $contrato = str_replace('%dia%', date('d'), $contrato);
        $contrato = str_replace('%preco%', $orcamento->total, $contrato);
        $contrato = str_replace('%precop%', $this->convert_number_to_words($orcamento->total), $contrato);

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

    public function convert_number_to_words($number){

        $conjunction = ' e ';
        $separator   = ', ';
        $negative    = 'menos ';
        $decimal     = ' ponto ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'um',
            2                   => 'dois',
            3                   => 'três',
            4                   => 'quatro',
            5                   => 'cinco',
            6                   => 'seis',
            7                   => 'sete',
            8                   => 'oito',
            9                   => 'nove',
            10                  => 'dez',
            11                  => 'onze',
            12                  => 'doze',
            13                  => 'treze',
            14                  => 'quatorze',
            15                  => 'quinze',
            16                  => 'dezesseis',
            17                  => 'dezessete',
            18                  => 'dezoito',
            19                  => 'dezenove',
            20                  => 'vinte',
            30                  => 'trinta',
            40                  => 'quarenta',
            50                  => 'cinquenta',
            60                  => 'sessenta',
            70                  => 'setenta',
            80                  => 'oitenta',
            90                  => 'noventa',
            100                 => 'cento',
            200                 => 'duzentos',
            300                 => 'trezentos',
            400                 => 'quatrocentos',
            500                 => 'quinhentos',
            600                 => 'seiscentos',
            700                 => 'setecentos',
            800                 => 'oitocentos',
            900                 => 'novecentos',
            1000                => 'mil',
            1000000             => array('milhão', 'milhões'),
            1000000000          => array('bilhão', 'bilhões'),
            1000000000000       => array('trilhão', 'trilhões'),
            1000000000000000    => array('quatrilhão', 'quatrilhões'),
            1000000000000000000 => array('quinquilhão', 'quinquilhões')
        );

        if (!is_numeric($number)) {
            return false;
        }

        if ($number == 100) {
            $dictionary[100] = 'cem';
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words só aceita números entre ' . PHP_INT_MAX . ' à ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $conjunction . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = floor($number / 100)*100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                if ($baseUnit == 1000) {
                    $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[1000];
                } elseif ($numBaseUnits == 1) {
                    $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][0];
                } else {
                    $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][1];
                }
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
}
