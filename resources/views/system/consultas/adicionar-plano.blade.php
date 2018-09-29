@extends('system.admin' )

@section('admin-content')
    <div class="adicionar-plano">
        <h2 class="blue">Adicionar Plano</h2>
        <div class="container">
            <form action="">
                <input type="text" name="plano" class="form-control" placeholder="Plano">
                <br>
                <input type="number" min="1" class="form-control" step="any" placeholder="Preço">
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
