@extends('system.admin')

@section('admin-content')
    <div class="planos-mensais">
        <h2>Perguntas para Orçamento</h2>
        <div class="container">
            <form action="{{route('add-pergunta')}}" method="POST">
                @csrf
                <h3>Nova Pergunta: </h3>
                <div class="plano">
                    <select name="plano" id="select-planos" class="form-control col-md-6 offset-md-3">
                        <option value="">Escolha um Plano</option>
                        <option value="">Novo Plano</option>
                        @if(!empty($planos))
                            @foreach($planos as $plano)
                                <option value="{{$plano->id}}">{{$plano->plano}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="plano-novo">
                    <input type="text" name="plano-novo" class="form-control col-md-6 offset-md-3" placeholder="Novo Plano">
                </div>
                <div class="pergunta">
                    <input type="text" name="pergunta" class="form-control col-md-6 offset-md-3" placeholder="Pergunta">
                </div>
                <div class="respostas">
                    <textarea name="respostas" id="respostas" class="form-control col-md-6 offset-md-3" placeholder="Respostas...(resposta|valor)"></textarea>
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
                <th scope="col">Plano
                <th scope="col">Pergunta</th>
                <th scope="col">Resposta</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($perguntas as $key => $pergunta)
                <tr>
                    <th>{{$pergunta->id}}</th>
                    <th>{{$pergunta->plano}}</th>
                    <td>{{$pergunta->pergunta}}</td>
                    <td>{{$pergunta->respostas}}</td>
                    <td>
                        <a class="action-icon" href="">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="action-icon" href="{{route('delete-pergunta', ['id' => $pergunta->id ])}}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection