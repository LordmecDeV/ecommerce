@extends('layouts.headerClient.header')
@section('content')
<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Favoritos</h5>
          </div>
        @foreach($favoriteItems as $item)
          <div class="card-body">
        <!-- mensagens de aviso -->
        @if(!empty($message))
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
        @endif

            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="{{$item->image_product_1}}"
                    class="w-100" alt="Blue Jeans Jacket" />
                  <a href="{{ route('showProductClient', ['id' => $item->id]) }}">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>
              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <a href="{{ route('showProductClient', ['id' => $item->id]) }}"><p><strong>{{$item->name}}</strong></p></a>
                <p>SKU: {{$item->sku}}</p>
                <p>Modelo: {{$item->type_product}}</p>
                <div class="d-flex align-items-center">
                <form class="" method="POST" action="{{ route('excluir-item-do-favorito') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="product_id" value="{{ $item->id }}">
                <button type="submit" class="btn btn-primary btn-sm me-1 mb-2" title="Remove item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg> 
                </button>
                </form>
                
                <!-- Data -->
                </div>
              </div>
                <!-- Price -->
                
                <!-- Price -->
              </div>
            </div>
            <!-- Single item -->
            <hr class="my-4" />
            @endforeach
          </div>
        </div>
</section>
@endsection