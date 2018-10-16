@extends('system.admin')

@section('admin-content')
    <div class="dashboard">
        <div class="container">
            <h2 class="blue">DASHBOARD</h2>
            <table class="table">
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
    </div>
@endsection