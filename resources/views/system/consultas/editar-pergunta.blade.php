@extends('system.admin')

@section('admin-content')
    <div class="editar-pergunta">
        <div role="dialog">
            <div class="container">
                <h2>Perguntas para Orçamento</h2>
                <form action="{{route('editar-pergunta-action', ['id' => $pergunta->ID])}}" method="POST">
                    @csrf
                    <h3>Editar Pergunta: </h3>
                    <div class="plano">
                        <select name="plano" id="select-planos" class="form-control col-md-6">
                            <option value="">Escolha um Plano</option>
                            <option value="">Novo Plano</option>
                            @if(!empty($planos))
                                @foreach($planos as $plano)
                                    @if(false)
                                        <option value="{{$plano->id}}" selected>{{$plano->plano}}</option>
                                    @else
                                        <option value="{{$plano->id}}">{{$plano->plano}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="plano-novo">
                        <div class="row">
                            <input type="text" name="plano-novo" class="form-control col-md-3 pad" placeholder="Novo Plano">
                            <input type="text" name="preco-plano" class="form-control col-md-2 preco" placeholder="Preço">
                        </div>
                    </div>
                    <div class="pergunta">
                        <input type="text" name="pergunta" class="form-control col-md-6" placeholder="Pergunta" value="{{$pergunta->pergunta}}">
                    </div>
                    <div class="respostas">
                        <textarea name="respostas" id="respostas" class="form-control col-md-6" placeholder="Respostas...(resposta|valor)">{{$pergunta->respostas}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection