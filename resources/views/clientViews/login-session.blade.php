@extends('layouts.headerClient.header')
@section('content')
<div class="container-fluid p-0">
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-body" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">
            <form method="POST" action="{{ route('login.store') }}">
                              @csrf
                  {{ method_field('POST') }}
                  @auth
                  <div class="alert alert-success">
                      <p>Você já esta logado</p>
                    </div>
                  @endauth
                  @guest
                  @error('email')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                  @enderror
                  @error('password')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>  
                  @enderror 
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="mb-5">Por favor preencha seu email e senha!</p>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg text-dark" />
                  <label class="form-label text-dark" for="typeEmailX">Email</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg text-dark" />
                  <label class="form-label text-dark" for="typePasswordX">Senha</label>
                </div>

                <div class="">
                  <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label text-dark" for="remember">Lembrar-me</label>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Esqueceu sua senha?</a></p>

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark btn-lg px-5" type="submit">Entrar</button>
                </div>

              <div>
                <p class="mb-0">Ainda não tem uma conta?<a href="/register" class="text-dark-50 fw-bold"> Registrar-se</a>
                </p>
              </div>
            </form>
            @endguest
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
