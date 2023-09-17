@extends('layouts.user_type.auth')
@section('content')
<div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <form enctype="multipart/form-data" method="post" action="/cadastrar-cupons">
                @csrf
                {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="" class="form-control-label">Nome do cupom:</label>
                        <input class="form-control price-input" id="cupom_name" type="text" name="cupom_name" />
                    </div>
                    <div class="form-group">
                        <label for="">Tipo do produto</label>
                        <select class="form-control" id="type" name="type">
                        <option value="fixed">Valor fixo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Valor do desconto</label>
                        <input class="form-control" type="text" name="value" id="value">
                    </div>    
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
                <button type="submit" class="btn btn-primary mt-3">Criar</button>
                </form>
        </div>
    </div>
</div>
@endsection