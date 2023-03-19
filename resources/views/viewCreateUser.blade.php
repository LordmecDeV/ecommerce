@extends('layouts.user_type.auth')
@section('content')
<h2 style="text-align:center;">Adicionar usuário</h2>
<form enctype="multipart/form-data" method="post" action="/criarUsuario">
    @csrf
    {{ method_field('POST') }}
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Nome</label>
        <input class="form-control" name="name" type="text" id="example-text-input">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Senha</label>
        <input class="form-control" type="password" name="password" id="example-search-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Email</label>
        <input class="form-control" type="email" name="email" id="example-email-input">
    </div>
    <div class="form-group">
        <label for="productPrice">Cargo:</label>
            <select class="form-select" name="role" aria-label="Default select example">
                <option>Administrador</option>
                <option>Usuário</option>
            </select>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Cancelar</a>
    <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
</form>
@endsection

