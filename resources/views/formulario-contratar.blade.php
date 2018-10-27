@extends('templates.template')

@section('content')
    <script src="//js.maxmind.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript" async></script>
    <style>label{margin-left: 5px; color: #1b4b72;}</style>
    <div class="contratar">
        <div class="container">
            <div class="head">
                <img src="{{asset('/img/logo.png')}}" alt="contweb">
                <br><br>
                <h1 class="blue">FORMULÁRIO DE CONTRATAÇÃO</h1>
            </div>
            <form action="{{route('contratar-action')}}" method="post">
                @csrf
                <input type="hidden" name="plan" value="{{$plano}}">
                <input type="hidden" name="total" value="{{$total}}">
                <input type="hidden" id="cnpj" value="{{$cnpj}}">
                <input type="hidden" name="orcamento" value="{{$orcamento}}">
                <input type="hidden" id="geopip" name="geoip" value="">
                <input type="hidden" id="agente" name="agente" value="">
                <div class="wrapper-budget margin_top_40">
                    <div class="container">
                        <div class="wrapper-title">
                            <h2 class="text-center title">DADOS DA EMPRESA</h2>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="cnpj">CNPJ</label>
                                            <input type="text" class="form-control" name="cnpj" id="InputCNPJ" value="" title="Número de inscrição (CNPJ)" placeholder="Número de inscrição (CNPJ)" required="" autofocus="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Data de criação">Data da Publicação</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="date" id="InputDate" value="" title="Data de Abertura" placeholder="Data de Abertura">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="company">Nome da Empresa</label>
                                        <label for="text"></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="company" id="InputCompany" maxlength="100" value="" title="Nome da Empresa" placeholder="Nome da Empresa" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="name_fantasy">Nome Fantasia</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name_fantasy" id="InputNameFantasy" maxlength="100" value="" title="Nome Fantasia" placeholder="Nome Fantasia">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="cnae_main">CNAE Principal</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="cnae_main" id="InputCnaeMain" maxlength="1000" title="CNAE Principal" placeholder="CNAE Principal"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="cnae_secondary">CNAE Secundário</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="cnae_secondary" id="InputCnaeSecondary" maxlength="1000" title="CNAE Secundário" placeholder="CNAE Secundário"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="legal">Natureza Jurídica</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="legal" id="InputLegal" maxlength="100" value="" title="Natureza Jurídica" placeholder="Natureza Jurídica">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="address">Logradouro</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="address" id="InputAddress" maxlength="100" value="" title="Logradouro" placeholder="Logradouro" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="number">Numero</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="number" id="InputNumber" maxlength="5" value="" title="Número" placeholder="Número" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="complement">Complemento</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="complement" id="InputComplement" maxlength="100" value="" title="Complemento" placeholder="Complemento">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="cep">CEP</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cep" id="InputCEP" value="" title="CEP" placeholder="CEP" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="district">Bairro</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="district" id="InputDistrict" maxlength="100" value="" title="Bairro" placeholder="Bairro" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="county">Municipio</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="county" id="InputCounty" maxlength="100" value="" title="Municipio" placeholder="Municipio" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="uf">UF</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="uf" id="InputUF" maxlength="100" value="" title="UF" placeholder="UF" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" id="InputEmail" maxlength="100" title="Email" placeholder="Email" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone">Telefone</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone" id="InputPhone" maxlength="100" title="Telefone" placeholder="Telefone" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <label for="status">Situação Cadastral</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="status" id="InputStatus" maxlength="100" value="" title="Situação Cadastral" placeholder="Situação Cadastral">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status_date">Data da Situação Cadastral</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="status_date" id="InputStatusDate" maxlength="100" value="" title="Data da Situação Cadastral" placeholder="Data da Situação Cadastral">
                                        </div>
                                    </div>
                                </div><!-- row / -->
                            </div><!-- panel-body / -->
                        </div><!-- panel / -->


                        <div class="wrapper-title margin_top_40">
                            <h2 class="text-center title">QUADRO SOCIETÁRIO</h2>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="share_capital">Capital Social</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="share_capital" id="InputShareCapital" maxlength="100" value="" title="Capital Social" placeholder="Capiral Social">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="partner">Sócios</label>
                                            <textarea class="form-control" name="partner" id="InputPartner" maxlength="1000" title="Sócio" placeholder="Sócios"></textarea>
                                            <br>
                                            <label for="qualification">Qualificação</label>
                                            <textarea class="form-control" name="qualification" id="InputQualification" maxlength="1000" title="Qualificação" placeholder="Qualificação (De acordo com a ordem dos sócios a cima.)"></textarea>
                                        </div>
                                    </div>

                                </div><!-- row / -->
                            </div><!-- panel-body / -->
                        </div><!-- panel / -->

                        <!-- Novos Campos | Mes de Início / Dia Vencto -->
                        <div class="wrapper-title margin_top_40">
                            <h2 class="text-center title">INFORMAÇÕES SOBRE COBRANÇA E INÍCIO DOS SERVIÇOS</h2>
                        </div>
                        <div class="panel panel-default col-lg-6 col-lg-offset-3 offset-md-3">
                            <div class="panel-body">
                                <div class="row">

                                    <!-- Field -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="service_start_month">QUAL O MÊS DE REFERÊNCIA QUE DESEJA INICIAR OS SERVIÇOS:</label>
                                            <select class="form-control" name="service_start_month" id="service_start_month" title="QUAL O MÊS DE REFERÊNCIA QUE DESEJA INICIAR OS SERVIÇOS:" required="required">
                                                <option value="">Selecione</option>
                                                <option value="Mês atual">Mês atual</option>
                                                <option value="Próximo mês">Próximo mês</option>
                                            </select>
                                        </div>
                                    </div><!-- Field / -->
                                    <br>
                                    <div class="col-md-12">
                                        <div id="month-message"></div>
                                    </div>
                                    <br>
                                    <!-- Field -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="payment_day">DIA DE VENCIMENTO DA MENSALIDADE:</label>
                                            <select class="form-control" name="payment_day" id="payment_day" title="DIA DE VENCIMENTO DA MENSALIDADE" required="required">
                                                <option value="">Selecione</option>
                                                <option value="05">05</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                            </select>
                                        </div>
                                    </div><!-- Field / -->
                                    <br>
                                    <span class="text-center text-primary" id="messageAboutPayment"></span>
                                </div><!-- row / -->
                            </div><!-- panel-body / -->
                        </div><!-- panel / novos campos -->
                    </div>
                </div>
                <div class="wrapper-title margin_top_40">
                    <h2 class="text-center title">ORÇAMENTO</h2>
                </div>
                <div class="form-perguntas col-md-12 col-xs-12" style="color: #1b4b72;">
                    <h4>Respostas</h4>
                    @foreach($perguntas as $key => $pergunta)
                        <h5>{{$pergunta}} R:{{explode(":",$respostas[$key]->resposta)[0]}}</h5><br>
                    @endforeach
                    <h4>Total: R$ {{$total}}</h4>
                </div>
                <div id="termos-contrato" class="wrapper-budget margin_top_50 padding_top_50 padding_bottom_50 text-center background_arm">
                    <div class="container">
                        <div class="row" style="background-color: #f8fafc;">
                            <div class="col-md-6 offset-md-3">
                                <input type="hidden" name="code" value="43575a4dd326c21f9c6665b5f4fe0901">
                                <button type="submit" class="btn btn-success btn-lg btn-block" id="buttonContrate" title="Clique Aqui para Concluir a Contratação" disabled>Clique Aqui para Concluir a Contratação</button>
                                <br>
                                <label for="checkbox-termos"><input type="checkbox" id="checkbox-termos" required> Ao prosseguir você concorda com os <a href="http://www.contweb.com.br/uploads/pdf/budget/43575a4dd326c21f9c6665b5f4fe0901.pdf" target="_blank" title="termos contratuais">termos contratuais</a></label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
