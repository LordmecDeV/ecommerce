@extends('layouts.headerClient.header')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
    </div>
  </div>
  <div class="row ">
    <div class="col d-flex justify-content-start mt-5 mb-5">
        <a class="text-muted" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16"><path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg></a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filtrar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Dropdown button
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <div class ="col">

    </div>
  </div>
  <div class="container">
  <div class="row">
    @foreach($launch as $launchs)
      <div class="col-md-3 mb-5">
        <div class="card p-2 space-margin-left-5 shadow bg-body circle-rounded" style="width: 18rem;">
          <!-- Início do card -->
          <a href="{{ route('showProductClient', ['id' => $launchs->id]) }}">
          <img src="{{$launchs->image_product_1}}" class="card-img-top circle-rounded" alt="...">
          <div class="card-body mb-4">
            <h2 class="card-title text-center fw-bold font-card-title color-card-information" style="margin-bottom: 0.1rem;">{{$launchs->name}}</h2>
            <h5 class="card-text text-center text-muted fw-bold font-price" style="margin-top: 0.05rem; margin-bottom: 0.05rem;">{{$launchs->type_product}}</h5>
            <p class="card-title text-center title-card text-decoration-line-through" style="margin-top: 0.05rem; margin-bottom: 0.05rem;">De <span class="span-card">R$149</span></p>
            <h5 class="card-text text-center fw-bold font-price font-price color-card-information" style="margin-top: 0.05rem;">Por R$ <span class="span-price color-card-information">{{$launchs->price}}</span></h5>
            <div class="circle circle-color-lauchs">
              <a href="{{ route('showProductClient', ['id' => $launchs->id]) }}" class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                </svg>
              </a>
            </div>
          </div>
          </a>
        </div>
      </div>
    @endforeach
  </div>
  {{$launch->links()}}
</div>
@endsection