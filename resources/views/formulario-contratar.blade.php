@extends('templates.template')

@section('content')
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
                                            <input type="text" class="form-control" name="cnpj" id="InputCNPJ" value="" title="Número de inscrição (CNPJ)" placeholder="Número de inscrição (CNPJ)" required="" autofocus="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="date" id="InputDate" value="" title="Data de Abertura" placeholder="Data de Abertura">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="company" id="InputCompany" maxlength="100" value="" title="Nome da Empresa" placeholder="Nome da Empresa" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name_fantasy" id="InputNameFantasy" maxlength="100" value="" title="Nome Fantasia" placeholder="Nome Fantasia">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="cnae_main" id="InputCnaeMain" maxlength="1000" title="CNAE Principal" placeholder="CNAE Principal"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="cnae_secondary" id="InputCnaeSecondary" maxlength="1000" title="CNAE Secundário" placeholder="CNAE Secundário"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="legal" id="InputLegal" maxlength="100" value="" title="Natureza Jurídica" placeholder="Natureza Jurídica">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="address" id="InputAddress" maxlength="100" value="" title="Logradouro" placeholder="Logradouro" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="number" id="InputNumber" maxlength="5" value="" title="Número" placeholder="Número" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="complement" id="InputComplement" maxlength="100" value="" title="Complemento" placeholder="Complemento">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cep" id="InputCEP" value="" title="CEP" placeholder="CEP" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="district" id="InputDistrict" maxlength="100" value="" title="Bairro" placeholder="Bairro" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="county" id="InputCounty" maxlength="100" value="" title="Municipio" placeholder="Municipio" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="uf" id="InputUF" maxlength="100" value="" title="UF" placeholder="UF" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" id="InputEmail" maxlength="100" title="Email" placeholder="Email" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone" id="InputPhone" maxlength="100" title="Telefone" placeholder="Telefone" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="ente_federative" id="InputEnteFederative" maxlength="100" value="" title="Ente Federativo Responsável" placeholder="Ente Federativo Responsável">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="status" id="InputStatus" maxlength="100" value="" title="Situação Cadastral" placeholder="Situação Cadastral">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="status_date" id="InputStatusDate" maxlength="100" value="" title="Data da Situação Cadastral" placeholder="Data da Situação Cadastral">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="status_reason" id="InputStatusReason" maxlength="100" value="" title="Motivo de Situação Cadastral" placeholder="Motivo de Situação Cadastral">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="special" id="InputSpecial" maxlength="100" value="" title="Situação Especial" placeholder="Situação Especial">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="special_date" id="InputSpecialDate" maxlength="100" value="" title="Data da Situação Especial" placeholder="Data da Situação Especial">
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
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="share_capital" id="InputShareCapital" maxlength="100" value="" title="Capital Social" placeholder="Capiral Social">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="partner" id="InputPartner" maxlength="1000" title="Sócio" placeholder="Sócio"></textarea>
                                            <br>
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
                <div id="termos-contrato" class="wrapper-budget margin_top_50 padding_top_50 padding_bottom_50 text-center background_arm">
                    <div class="container">
                        <div class="row" style="background-color: #f8fafc;">
                            <div class="col-md-6 offset-md-3">
                                <input type="hidden" name="code" value="43575a4dd326c21f9c6665b5f4fe0901">
                                <button type="submit" class="btn btn-success btn-lg btn-block" id="buttonContrate" title="Clique Aqui para Concluir a Contratação">Clique Aqui para Concluir a Contratação</button>
                                <br>
                                <label for="checkbox"><input type="checkbox" id="checkbox" required> Ao prosseguir você concorda com os <a href="http://www.contweb.com.br/uploads/pdf/budget/43575a4dd326c21f9c6665b5f4fe0901.pdf" target="_blank" title="termos contratuais">termos contratuais</a></label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
