@extends('layouts.headerClient.header')
@section('content')
<div class="container-fluid p-0">
  <section class=" gradient-custom" style="min-height: 100vh;">>
    <div class="container py-5 h-100">
    <form enctype="multipart/form-data" method="post" action="/register-user">
    @csrf
    {{ method_field('POST') }}
    <div class="container shadow-lg p-5 bg-body rounded-5">
        <h3 class="mb-5">Dados para acesso:</h3>
        <div class="row g-3">
            <div class="col-sm-6">
              <label for="" class="form-label">Nome completo:</label>
              <input type="text" class="form-control rounded-5" name="name" id="" placeholder="Maria Almeida Freitas" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">CPF</label>
              <input type="text" class="form-control rounded-5" id="lastName" placeholder="85626673407" name="cpf" required>
            </div>

            <div class="col-sm-6">
              <label for="username" class="form-label">Telefone:</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control rounded-5" id="" name="phone" placeholder="11959798897" required>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="username" class="form-label">Data de nascimento:</label>
              <div class="input-group has-validation">
                <input type="date" class="form-control rounded-5" id="" name="birthdate" placeholder="08/06/1990" required>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="username" class="form-label">Email:</label>
              <div class="input-group has-validation">
                <input type="email" class="form-control rounded-5" id="" name="email" placeholder="maria.freitas@gmail.com" required>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="" class="form-label">Senha:</label>
              <input type="password" class="form-control rounded-5" id="password" name="password" placeholder="************" required>
            </div>
          </div>
    </div>

    <div class="container mt-5 shadow-lg p-5 bg-body rounded-5 mb-5">
        <h3 class="mb-5">Dados para envio:</h3>
        <div class="row g-3">
            <div class="col-sm-6">
              <label for="" class="form-label">CEP:</label>
              <input type="text" class="form-control rounded-5" name="cep" id="cep" placeholder="04867098" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Endereço:</label>
              <input type="text" class="form-control" id="logradouro" placeholder="Av. Paulista" name="location" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Número:</label>
              <input type="text" class="form-control" id="numero" name="number" required>
            </div>

            <div class="col-sm-6">
              <label for="username" class="form-label">Referência:</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="referencia" name="reference" required>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="" class="form-label">Complemento:</label>
              <input type="text" class="form-control" id="complemento" name="complement" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Bairro:</label>
              <input type="text" class="form-control" id="bairro"  name="neighborhood" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Cidade:</label>
              <input type="text" class="form-control" id="cidade" placeholder="São Paulo" name="city" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Estado:</label>
              <input type="text" class="form-control" id="estado" placeholder="São Paulo" name="state" required>
            </div>
          </div>
        <button class="btn btn-outline-dark btn-lg px-5 mt-4" type="submit">Cadastrar-se</button>
    </div>
    </form>
    </div>
  </section>
</div>
    
    <script>
        const cepInput = document.querySelector('#cep');
        cepInput.addEventListener('blur', handleCepBlur);

        async function handleCepBlur() {
            const cep = cepInput.value.replace(/\D/g, '');
            const url = `https://viacep.com.br/ws/${cep}/json/`;

            try {
            const response = await fetch(url);
            const data = await response.json();

            document.querySelector('#logradouro').value = data.logradouro;
            document.querySelector('#bairro').value = data.bairro;
            document.querySelector('#cidade').value = data.localidade;
            document.querySelector('#estado').value = data.uf;
            } catch (error) {
            console.error(error);
            }
        }
    </script>
@endsection