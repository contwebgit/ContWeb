@extends('system.admin')

@section('admin-content')
    <div class="editar-pergunta">
        <div role="dialog">
            <div class="container">
                <h2 class="blue">Adicionar Pergunta</h2>
                <form action="{{route('adicionar-pergunta-home-action')}}" method="POST">
                    @csrf
                    <div class="pergunta">
                        <input type="text" name="pergunta" class="form-control" placeholder="Pergunta" required>
                    </div>
                    <br>
                    <div class="resposta">
                        <textarea name="resposta" id="resposta" class="form-control" placeholder="Resposta"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection