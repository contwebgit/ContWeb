@extends('system.admin')

@section('admin-content')
    <div>
        <div class="container">
            <h2 class="blue">Adicionar Pergunta</h2>
            <form action="{{route('upload-contrato-action')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" name="template">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection