@extends('system.admin')

@section('admin-content')
    <div class="planos-mensais">
        <h2>Perguntas para Orçamento</h2>
        <div class="container">
            <form action="{{route('add-pergunta')}}" method="POST">
                <h3>Nova Pergunta: </h3>
                <div class="pergunta">
                    <input type="text" name="pergunta" class="form-control col-md-6 offset-md-3" placeholder="Pergunta">
                </div>
                <div class="respostas">
                    <textarea name="respostas" id="respostas" class="form-control col-md-6 offset-md-3" placeholder="Respostas..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
    <div class=" planos-mensais perguntas container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pergunta</th>
                <th scope="col">Resposta</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($perguntas as $key => $pergunta)
                <tr>
                    <th>{{$key}}</th>
                    <td>{{$pergunta->pergunta}}</td>
                    <td>{{$pergunta->repostas}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection