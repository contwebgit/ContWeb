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
                    <div class="form-check">
                        <input class="form-check-input" name="estados[]" type="checkbox" value="SP" id="estados">
                        <label class="form-check-label" for="estados">
                            SP
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="estados[]" type="checkbox" value="RJ" id="estados">
                        <label class="form-check-label" for="estados">
                            RJ
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="estados[]" type="checkbox" value="MG" id="estados">
                        <label class="form-check-label" for="estados">
                            MG
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="estados[]" type="checkbox" value="GO" id="estados">
                        <label class="form-check-label" for="estados">
                            GO
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="estados[]" type="checkbox" value="PR" id="estados">
                        <label class="form-check-label" for="estados">
                            PR
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="estados[]" type="checkbox" value="SC" id="estados">
                        <label class="form-check-label" for="estados">
                            SC
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="estados[]" type="checkbox" value="RS" id="estados">
                        <label class="form-check-label" for="estados">
                            RS
                        </label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
