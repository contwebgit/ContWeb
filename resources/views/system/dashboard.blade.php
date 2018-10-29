@extends('system.admin')

@section('admin-content')
    <div class="dashboard">
        <div class="container">
            <h2 class="blue">DASHBOARD</h2>
            <div class="row">
                <div class="planos-list col-md-6">
                    <h3 class="blue">Planos</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Plano</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contratantes as $contratante)
                            <tr>
                                <th scope="row">{{$contratante->id}}</th>
                                <td>{{$contratante->cnpj}}</td>
                                <td>{{$contratante->name_fantasy}}</td>
                                <td>{{$contratante->plan}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="servicos-list col-md-6">
                    <h3 class="blue">Serviços</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CNPJ/CPF</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Serviço</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contratantesServico as $contratanteServico)
                            <tr>
                                <th scope="row">{{$contratanteServico->id}}</th>
                                <td>{{$contratanteServico->cpf}}</td>
                                <td>{{$contratanteServico->name}}</td>
                                <td>{{$contratanteServico->servico}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection