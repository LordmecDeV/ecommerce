@extends('layouts.headerClient.header')
@section('content')
    <form enctype="multipart/form-data" method="post" action="/register-user">
    @csrf
    {{ method_field('POST') }}
    <div class="container mt-5 shadow-lg p-5 bg-body rounded-5">
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
              <input type="text" class="form-control" id="logradouro" placeholder="85626673407" name="location" required>
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
        <button class="btn btn-primary mt-5 btn-lg" type="submit">Cadastrar-se</button>
    </div>
    </form>

    <div class="container-fluid bg-white"><!-- inicio do footer -->
  <footer class="py-5">
    <div class="row">
      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-md-5 offset-md-1 mb-3">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>© 2023 Walmeida</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>
    </footer>
    </div><!-- final do footer -->
    
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