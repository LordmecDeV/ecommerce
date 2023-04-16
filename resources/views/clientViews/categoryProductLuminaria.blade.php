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
  <div class="row ">
    <div class="col d-flex justify-content-center">
    <div class="container-fluid p-0">
    <div class="row row-cols-1 row-cols-md-4">
    @foreach($viewLighting as $viewLightings)
    <div class="col">
    <div class="card shadow mb-5 bg-body rounded-4" style="width: 18rem; margin-left:;"><!-- inicio do card --> 
    <img src="{{$viewLightings->image_product_1}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title text-center title-card">{{$viewLightings->name}}</h5>
    <p class="card-text text-center price-card">R$ {{$viewLightings->price}} <a href="#" class="a-href-card">no pix</a></p>
    <h5 class="card-text text-center discount-card">Com 3% de desconto</h5>
    <h5 class="card-text text-center discount-card">A partir de R$ 74,90</h5>
    <h5 class="card-text text-center discount-card">até 4x de R$ 18,72 sem juros</h5>
    <a href="{{ route('showProductClient', ['id' => $viewLightings->id]) }}" class="btn btn-primary d-flex justify-content-center">Ver mais...</a>
    </div>
    </div><!-- final do card -->
    </div>
    @endforeach
    </div>
    </div></div>
  </div>
</div>
@endsection