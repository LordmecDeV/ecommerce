@extends('layouts.headerClient.header')
@section('content')
<div class="container w-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded-5">

    
<main class="form-signin m-auto ">
<form method="POST" action="{{ route('login.store') }}">
  @csrf
  {{ method_field('POST') }}
  @auth
  <div class="alert alert-success">
      <p>Você já esta logado</p>
    </div>
  @endauth
  @guest
  <div class="d-flex justify-content-center">
    <img class="mb-4 d-flex justify-content-center align-self-center" src="https://i.ibb.co/cbhjFyD/LOGO-BAIXA-RESOLU-O.png" height="50" />
  </div>
    <div class="form-group">
      <label class="mb-3" for="floatingInput">Email</label>
      <input type="email" class="form-control mb-3 rounded-5" id="floatingInput" placeholder="name@example.com" name="email">
    @error('email')
    <div class="alert alert-danger">
      {{ $message }}
    </div>
    @enderror  
    </div>
    <div class="form-group">
      <label class="mb-3" for="floatingPassword">Senha</label>
      <input type="password" class="form-control mb-3 rounded-5" id="floatingPassword" placeholder="Password" name="password">
    @error('password')
    <div class="alert alert-danger">
      {{ $message }}
    </div>  
    @enderror
    </div>

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Lembrar-me</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted"><a href="/register">Ainda não possuo cadastro!</a></p>
  </form>
  @endguest
</main>

    <div id="loom-companion-mv3" ext-id="liecbddmkiiihnedobmlmillhodjkdmb"><section id="shadow-host-companion"></section>
    </div>
    </div>

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
@endsection
