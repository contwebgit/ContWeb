@extends('templates.template')

@section('content')
    <form action="{{route('contratar-servico-action')}}" method="POST">
        @csrf

        <input type="hidden" name="total" value="{{$total}}">
        <input type="hidden" name="servico" value="{{$servico}}">
        <input type="hidden" name="orcamento" value="{{$orcamento}}">
        <input type="hidden" id="cpf" name="cpf" value="{{$cpf}}">
        <style>label{margin-left: 5px; color: #1b4b72;} .form-control{ width: 96%; }</style>
        <div class="contratar-servico">
            <div class="container">
                <div class="wrapper-title">
                    <p class="text-center title">FORMULÁRIO DE CONTRATAÇÃO DE SERVIÇOS ESPORÁDICOS.</p>
                </div>
                <div class="panel panel-default" style="margin-right: -4%;">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="cpf">CPF</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cpf" id="InputCPF" title="CPF ou CNPJ" placeholder="CPF ou CNPJ" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="name">Nome ou Razão Social</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="InputName" title="Nome ou Razão Social" placeholder="Nome ou Razão Social" required="" autofocus="" value="">
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-8">
                                    <label for="email">Email</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="InputEmail" title="Endereço de email para contato" placeholder="Endereço de email para contato" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="phone">Telephone</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="InputPhone" title="Número de telefone para contato" placeholder="Número de telefone para contato" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="cep">CEP</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cep" id="InputCep" title="Cep da Empresa" placeholder="Cep da Empresa" required="">
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-6">
                                    <label for="logradouro">Logradouro</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="logradouro" id="InputLogradouro" title="Logradouro/Endereço da Empresa" placeholder="Logradouro" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="numero">Numero</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="numero" id="InputNumero" title="Número/Endereço da Empresa" placeholder="Número" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="complemento">Complemento</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="complemento" id="InputComplemento" title="Complemento (Opcional)" placeholder="Complemento (Opcional)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-4">
                                    <label for="estado">Estado</label>
                                    <div class="form-group">
                                        <select class="form-control" name="estado" id="InputEstado" title="Estado/UF" >
                                            <option value="">Selecione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="cidade">Cidade</label>
                                    <div class="form-group">
                                        <select class="form-control" name="cidade" id="InputCidade" title="Cidade" disabled></select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="bairro">Bairro</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="bairro" id="InputBairro" title="Bairro" placeholder="Bairro" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- panel / -->
            </div>
            <div class="wrapper-title container">
                <p class="text-center title">ORÇAMENTO</p>
            </div>
           <div class="container">
               <div class="form-perguntas col-md-12 col-xs-12" style="color: #1b4b72;">

                   <table class="table table-striped table-bordered">
                       <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Pergunta</th>
                           <th scope="col">Resposta</th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach($perguntas as $key => $pergunta)
                           <tr>
                               <th scope="row">{{$key}}</th>
                               <td>{{$pergunta}}</td>
                               <td>{{explode(":",$respostas[$key]->resposta)[0]}}</td>
                           </tr>
                       @endforeach
                       <tr>
                           <td></td>
                           <td></td>
                           <td colspan="2">
                               <h4>Total: R$ {{$total}}</h4>
                           </td>
                       </tr>
                       </tbody>
                   </table>
               </div>
           </div>
            <button type="submit" class="btn btn-contratar col-md-6 offset-md-3">Contratar</button>
        </div>
    </form>
@endsection
