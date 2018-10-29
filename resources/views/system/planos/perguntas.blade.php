@extends('system.admin')

@section('admin-content')
    <div class="">
        <div id="modal-planos" class="modal" role="dialog">
            <h4>Perguntas para Orçamento<button type="submit" class="btn btn-secundary close" data-dismiss="modal">x</button></h4>
            <div class="container">
                <form action="" method="POST">
                    @csrf
                    <h3>Nova Pergunta: </h3>
                    <div class="plano">
                        <select name="plano" id="select-planos" class="form-control">
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
                        <div class="row">
                            <input type="text" name="plano-novo" class="form-control" placeholder="Novo Plano">
                            <input type="text" name="preco-plano" class="form-control preco" placeholder="Preço">
                        </div>
                    </div>
                    <div class="pergunta">
                        <input type="text" name="pergunta" class="form-control" placeholder="Pergunta">
                    </div>
                    <div class="respostas">
                        <textarea name="respostas" id="respostas" class="form-control" placeholder="Respostas...(resposta|valor)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="blue">Perguntas</h2>
        <button id="adicionar-pergunta" class="btn-ac">
            Nova Pergunta
        </button>
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
                        <a class="action-icon" href="{{route('editar-pergunta', [ 'id' => $pergunta->id ])}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="action-icon" href="{{route('delete-pergunta', [ 'id' => $pergunta->id ])}}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection