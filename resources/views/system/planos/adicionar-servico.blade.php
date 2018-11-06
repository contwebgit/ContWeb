@extends('system.admin' )

@section('admin-content')
    <div class="adicionar-plano">
        <h2 class="blue">Adicionar Serviço</h2>
        <div class="container">
            <form action="{{route('adicionar-servico-action')}}" method="POST">
                @csrf
                <input type="text" name="servico" class="form-control" placeholder="Serviço" required>
                <br>
                <input type="number" name="preco" min="1" class="form-control" step="any" placeholder="Preço" required>
                <br>
                <div class="estados">
                    <h4>Estados:</h4>
                    @foreach(['SP', 'RJ', 'MG', 'GO', 'PR', 'SC', 'RS'] as $estado)
                        <div class="form-check">
                            <input class="form-check-input" name="estados[]" type="checkbox" value="{{$estado}}" id="{{$estado}}">
                            <label class="form-check-label" for="estados">
                                {{$estado}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <br><br>
                <div>
                    <input type="checkbox" name="preencher" value="1">
                    Fazer Consulta na RFB
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
