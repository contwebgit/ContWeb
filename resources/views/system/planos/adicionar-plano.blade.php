@extends('system.admin' )

@section('admin-content')
    <div class="adicionar-plano">
        <h2 class="blue">Adicionar Plano</h2>
        <div class="container">
            <form action="{{route('adicionar-plano-action')}}" method="POST">
                @csrf
                <input type="text" name="plano" class="form-control" placeholder="Plano" required>
                <br>
                <input type="number" name="preco" min="1" class="form-control" step="any" placeholder="Preço" required>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
