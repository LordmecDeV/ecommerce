@extends('layouts.headerClient.header')
@section('content')
<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0"> <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16"><path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg> Carrinho</h5>
          </div>
          <div class="card-body">
          @if(!empty($message))
          <div class="alert alert-danger">
            {{ $message }}
          </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
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
            @foreach($cartItems as $item)
            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="{{$item->image_product_1}}"
                    class="w-100" alt="Blue Jeans Jacket" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong>{{$item->name}}</strong></p>
                <p>SKU: {{$item->sku}}</p>
                <p>Modelo: {{$item->type_product}}</p>
                <div class="d-flex align-items-center">
                <form class="" method="POST" action="{{ route('excluir-item-do-carrinho') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                <button type="submit" class="btn btn-primary btn-sm me-1 mb-2" title="Remove item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg> 
                </button>
                </form>
                <button type="button" class="btn btn-danger btn-sm mb-2 align-middle" data-mdb-toggle="tooltip"
                  title="Move to the wish list">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/></svg>
                </button>
                <!-- Data -->
                </div>
              </div>
          
              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">
                  <button class="btn btn-outline-primary px-3 me-2" style="height:40px;"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16"><path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>
                  </button>

                  <div class="form-outline">
                    <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
                    
                  </div>

                  <button class="btn btn-outline-primary px-3 ms-2 btn-sm" style="height:40px;"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                  </button>
                </div>
                <!-- Quantity -->

                <!-- Price -->
                <p class="text-start text-md-center">
                  <strong>Preço: R${{$item->price}}</strong>
                </p>
                <!-- Price -->
              </div>
            </div>
            <!-- Single item -->

            <hr class="my-4" />
            @endforeach
           
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
          <h5 class="mb-0"> <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16"><path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg> Calcule o frete: </h5>
          <div class="container px-4 text-left">
            <div class="row gx-5">

              <div class="col">
                <div class="p-3 ">
                  <ul class="">
                    <li class="list-group-item fw-bold">Cidade: {{$city}}</li>
                    <li class="list-group-item fw-bold">CEP: {{$cep}}</li>
                    <li class="list-group-item fw-bold">Endereço: {{$location}}</li>
                  </ul>
                </div>
              </div>

              <div class="col">
                <div class="p-3">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Alterar endereço
                  </button>
                </div>
              </div>
                </div>
              </div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Selecione o serviço desejado</th>
                    <th scope="col">Tipo de serviço</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Entrega em ate</th>
                    <th scope="col">Transportadora</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" class="form-check-input" id="exampleCheck1"></td>
                      <th scope="row"><h6 class="fw-bold">{{ $totalPacFrete['companyName'] }}</h5></th>
                      <td><p class="fw-bold fontCalculateFrete">R$ {{ $totalPacFrete['totalFrete'] }}</p></td>
                      <td><h5 class="fw-bold">{{ $totalPacFrete['deliveryTime'] }}</h5></td>
                      <td> <img src="https://www.geralferramentas.com.br/pub/media/catalog/product/cache/ebd33fa67d0860d79e515ee268e8835d/p/a/pac2270.png" height="150" width="150" class="img-fluid" alt="Company Logo"></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="form-check-input" id="exampleCheck2"></td>
                      <th scope="row"><h5 class="fw-bold">{{ $totalSedexFrete['companyName'] }}</h5></th>
                      <td><p class="fw-bold fontCalculateFrete">R$ {{ $totalSedexFrete['totalFrete'] }}<p></td>
                      <td><h5 class="fw-bold">{{ $totalSedexFrete['deliveryTime'] }}</h5></td>
                      <td> <img src="https://img.elo7.com.br/product/main/27BA07B/sedex-sedex.jpg" height="100" width="100" class="img-fluid" alt="Company Logo"></td>
                    </tr>
                  </tbody>
                </table>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body">
            <p><strong>Nós aceitamos:</strong></p>
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
              alt="Visa" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
              alt="American Express" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
              alt="Mastercard" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp"
              alt="PayPal acceptance mark" />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Resumo</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Produtos
                <span>R${{$totalPriceCart}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Frete
                <span>valor do frete</span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span><strong>R${{$totalPriceCart}}</strong></span>
              </li>
            </ul>

            <button type="button" class="btn btn-primary btn-lg btn-block">
              Finalizar compra
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Alterar endereço de entrega</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Calcular</button>
          </div>
        </div>
      </div>
    </div>
@endsection