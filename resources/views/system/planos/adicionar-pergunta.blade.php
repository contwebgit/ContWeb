@extends('system.admin')

@section('admin-content')
    <div class="editar-pergunta">
        <div role="dialog">
            <div class="container">
                <h2 class="blue">Adicionar Pergunta</h2>
                <form action="{{route('adicionar-pergunta-action', ['id' => app('request')->get('id')])}}" method="POST">
                    @csrf
                    @if($role == 'servico')
                        <input type="hidden" name="servico" value="{{app('request')->get('id')}}">
                    @else
                        <input type="hidden" name="plano" value="{{app('request')->get('id')}}">
                    @endif
                    <div class="pergunta">
                        <input type="text" name="pergunta" class="form-control" placeholder="Pergunta" required>
                    </div>
                    <br>
                    <div class="respostas">
                        <textarea name="respostas" id="respostas" class="form-control" placeholder="Respostas...(resposta|valor)"></textarea>
                    </div>
                    <br>
                    <div class="estados">
                        <h4 class="blue">Estados:</h4>
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
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection