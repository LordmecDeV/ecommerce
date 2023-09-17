@extends('layouts.headerClient.header')
@section('content')
<div class="container">
  <div class="row mt-5 d-flex justify-content-center margin-responsive">
    <div class="col-8">
    <div class="slider-for shadow-lg p-3 bg-body rounded-5">
        <div><img src="{{$viewProduct->image_product_1}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_1}}"></div>
        <div><img src="{{$viewProduct->image_product_2}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_2}}"></div>
        <div><img src="{{$viewProduct->image_product_3}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_3}}"></div>
        <div><img src="{{$viewProduct->image_product_4}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_4}}"></div>
        <div><img src="{{$viewProduct->image_product_5}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_5}}"></div>
      </div>
    </div>
    <div class="col">
    <ul class="list-group list-group-flush">
        <li class="list-group">
        <form id="product-form"  class="" method="POST" action="{{route('adicionar-aos-favoritos')}}">
          @csrf
          {{ method_field('POST') }}
          <input type="hidden" name="user_id" value="{{auth()->id()}}">
          <input type="hidden" name="product_id" value="{{$viewProduct->id}}">
          <li class="list-inline-item"><button type="{{ $isFavorite ? 'button' : 'submit' }}" class="btn btn-link p-0 text-muted mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"  class="bi bi-heart-fill" fill="{{ $isFavorite ? 'red' : '#ced4da' }}" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/></svg></button></li>
        </form>
          <h1 class="">{{$viewProduct->name}}<h1>
        </li>
        @if($viewProduct->type_product == 'Quadro')
        <li class="list-group">
          <h6 class="border-bottom">Selecione a moldura:</h6> 
            <ul class="list-inline justify-content-start">
            <li class="list-inline-item"><button type="button" class="btn btn-outline-dark btn-moldura" id="btn-branca">Branca</button></li>
            <li class="list-inline-item"><button type="button" class="btn btn-outline-dark btn-moldura" id="btn-preta">Preta</button></li>
            </ul>
        </li>
        <li class="list-group mt-2">
        <h6 class="border-bottom">Selecione o tamanho:</h6>
          <ul class="list-inline d-flex justify-content-start">
            <li class="list-inline-item"><button type="button" class="btn btn-outline-dark btn-tamanho" id="btn-3-placas" data-price="{{$getSmallFrame}}" onclick="updatePriceField(this)">30x55</button></li>
            <li class="list-inline-item"><button type="button" class="btn btn-outline-dark btn-tamanho" id="btn-3-placas-reto" data-price="{{$getMidFrame}}" onclick="updatePriceField(this)">40x66</button></li>
            <li class="list-inline-item"><button type="button" class="btn btn-outline-dark btn-tamanho" id="btn-5-placas" data-price="{{$getBigFrame}}" onclick="updatePriceField(this)">55x92</button></li>
          </ul>
        </li>
        <li class="list-group mt-2">
          <ul class="list-group list-group-flush c">
            <li class="list-group"><h2 class="product-price" data-price="{{$viewProduct->price}}">R$ {{$viewProduct->price}} <span>no pix</span> </h2></li>
            <li class="list-group"><h6 class="fontBuyProduct">com 3% de desconto</h6></li>
            <li class="list-group"><h6 class="fontBuyProduct2"><h6>A partir de <span>R$&&&</span></h6></li><!-- criar variavel para aplicar desconto no valor do produto -->
          </ul>
      </li>
        <li class="list-group mt-4">
          <div class="d-flex justify-content-start">
          <form id="product-form" method="POST" action="{{route('adicionar-ao-carrinho')}}">
            @csrf
            {{ method_field('POST') }}
              <input type="hidden" name="product_price" id="product-price" value="{{$viewProduct->price}}">
              <input type="hidden" name="user_id" value="{{auth()->id()}}">
              <input type="hidden" name="product_id" value="{{$viewProduct->id}}">
              <input type="hidden" id="price" name="product_characteristics" value="">
              <input type="hidden" id="characteristics" name="characteristics" value="">
              <input type="hidden" id="price" name="quantity" value="1">
              <button type="submit" class="btn btn-primary btn-lg rounded-5">Adicionar ao carrinho</button>
            </form>
          </div>
        </li>
        <li class="list-group">
          <div class="d-flex justify-content-start mt-4">
          <div class="input-group">
              <span class="input-group-text" id="basic-addon1">CEP</span>
              <input type="text" class="form-control-sm input-group-sm" id="cep-input" placeholder="Digite seu CEP" aria-label="" aria-describedby="basic-addon1">
              <input type="hidden" name="type_product" value="Quadro">
              <button class="btn btn-primary" id="calcular-frete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16"><path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/><path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/></svg></button>
          </div>
          </div>
        </li>
      </ul>
    </div>
    </div>
  </div>
  @elseif($viewProduct->type_product == 'Mosaico')
  <h6 class="border-bottom">Selecione o tipo de mosaico:</h6> 
            <ul class="list-inline justify-content-start">
              @foreach ($getPriceThreePlates as $price)
              <li class="list-inline-item"><button type="button" class="btn btn-outline-dark" id="btn-3-placas" data-price="{{$price->price}}" onclick="updatePriceField(this)">3 Placas</button></li>
              @endforeach
              @foreach ($getPriceThreeStraightPlates as $price)
              <li class="list-inline-item"><button type="button" class="btn btn-outline-dark" id="btn-3-placas-reto" data-price="{{$price->price}}" onclick="updatePriceField(this)">3 Placas Reto</button></li>
              @endforeach
              @foreach ($getPriceFivePlates as $price)
              <li class="list-inline-item mt-2"><button type="button" class="btn btn-outline-dark" id="btn-5-placas" data-price="{{$price->price}}" onclick="updatePriceField(this)">5 Placas</button></li>
              @endforeach
            </ul>
        </li>
        <li class="list-group mt-2">
          <ul class="list-group list-group-flush c">
            <li class="list-group"><h2 class="product-price" data-price="{{$viewProduct->price}}" onclick="updatePriceField(this)">{{$viewProduct->price}} <span>no pix</span> </h2></li>
            <li class="list-group"><h6 class="fontBuyProduct">com 3% de desconto</h6></li>
             <li class="list-group"><h6 class="fontBuyProduct2"><h6>A partir de <span>R$$$</span></h6></li><!-- criar variavel para aplicar desconto no valor do produto -->
          </ul>
      </li>
        <li class="list-group mt-4">
          <div class="d-flex justify-content-start">
            <form id="product-form" method="POST" action="{{route('adicionar-ao-carrinho')}}">
            @csrf
            {{ method_field('POST') }}
              <input type="hidden" name="product_price" id="product-price" value="{{$viewProduct->price}}">
              <input type="hidden" name="user_id" value="{{auth()->id()}}">
              <input type="hidden" name="product_id" value="{{$viewProduct->id}}">
              <input type="hidden" id="price" name="product_characteristics" value="">
              <input type="hidden" id="price" name="quantity" value="1">
              <button type="submit" class="btn btn-primary btn-lg rounded-5">Adicionar ao carrinho</button>
            </form>
          </div>
        </li>
        <li class="list-group">
          <div class="d-flex justify-content-start mt-4">
          <div class="input-group">
              <span class="input-group-text" id="basic-addon1">CEP</span>
              <input type="text" class="form-control-sm input-group-sm" id="cep-input" placeholder="Digite seu CEP" aria-label="" aria-describedby="basic-addon1">
              <input type="hidden" name="type_product" value="Mosaico">
              <button class="btn btn-primary" id="calcular-frete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16"><path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/><path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/></svg></button>
          </div> 
          </div>
        </li>
      </ul>
    </div>
    </div>
  </div>
  @elseif($viewProduct->type_product == 'Luminaria')
        <li class="list-group mt-2">
          <ul class="list-group list-group-flush c">
            <li class="list-group"><h2>{{$viewProduct->price}} <span>no pix</span> </h2></li>
            <li class="list-group"><h6 class="fontBuyProduct">com 3% de desconto</h6></li>
             <li class="list-group"><h6 class="fontBuyProduct2"><h6>A partir de <span>R$74,90</span></h6></li><!-- criar variavel para aplicar desconto no valor do produto -->
          </ul>
      </li>
        <li class="list-group mt-4">
          <div class="d-flex justify-content-start">
          <form id="product-form" method="POST" action="{{route('adicionar-ao-carrinho')}}">
            @csrf
            {{ method_field('POST') }}
              <input type="hidden" name="product_price" id="product-price" value="{{$viewProduct->price}}">
              <input type="hidden" name="user_id" value="{{auth()->id()}}">
              <input type="hidden" name="product_id" value="{{$viewProduct->id}}">
              <input type="hidden" id="price" name="product_characteristics" value="{{$viewProduct->price}}">
              <input type="hidden" id="price" name="quantity" value="1">
              <button type="submit" class="btn btn-primary btn-lg rounded-5">Adicionar ao carrinho</button>
            </form>
          </div>
        </li>
        <li class="list-group">
          <div class="d-flex justify-content-start mt-4">
          <div class="input-group">
              <span class="input-group-text" id="basic-addon1">CEP</span>
              <input type="text" class="form-control-sm input-group-sm" id="cep-input" placeholder="Digite seu CEP" aria-label="" aria-describedby="basic-addon1">
              <input type="hidden" name="type_product" value="Luminaria">
              <button class="btn btn-primary" id="calcular-frete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16"><path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/><path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/></svg></button>
          </div>
          </div>
        </li>
      </ul>
    </div>
    </div>
  </div>
  @endif
  <div class="row mt-5 d-flex justify-content-center">
    <div class="col-4">
    <div class="slider-nav">
        <div><img width="200" height="150" src="{{$viewProduct->image_product_1}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_1}}"></div>
        <div><img width="200" height="150" src="{{$viewProduct->image_product_2}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_2}}"></div>
        <div><img width="200" height="150" src="{{$viewProduct->image_product_3}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_3}}"></div>
        <div><img width="200" height="150" src="{{$viewProduct->image_product_4}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_4}}"></div>
        <div><img width="200" height="150" src="{{$viewProduct->image_product_5}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_5}}"></div>
      </div>
    </div>
  </div>
</div>


       
<!--Descrição-->
<div class="container-fluid mt-5">
    <div class="d-flex justify-content-center">
      <button style="border: none;background: none;" class="mt-3" type="button" onclick="Mudarestado('minhaDiv')"><h1>Descrição</h1> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/></svg></button>
    </div> 
      <div class="" id="minhaDiv" style="display:none;">
        <img src="https://sat02pap005files.storage.live.com/y4mRBau8W1UjHcasic0XKGkfdGmhL0152CBM1Vf5H7744AK946AXdiwWl3XwJRnK8NxmeDeMqErffMKQuBKojbsEm2Uo3UQMqjVo2hJWUpA027lLQC3SuGM_pBGO6JRt8eEmaQR2m69l9ktiZWPidsKg_CaxlpoHGGD8bMwjasSGOPNrBbuKzJHY9WQ_hZhdmn5?width=1500&height=12497&cropmode=none" class="mx-auto d-block mt-5" alt="CATALOGO-PAINEIS-pdf-1" border="0">
      </div>         
</div>
<!--Descrição final-->

<div class="container-fluid mt-5">
  <div class="d-flex justify-content-center">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/mpP5SbbPHE8?si=Xb7VEGmD9ixyUx5l" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
</div>

  <div class="container-fluid p-0"><!-- inicio da div de carrousel de produtos -->
    <div class="d-flex align-items-center justify-content-center">
    <h2 class="text-center fw-bold mt-5">Mais vendidos</h2>
    </div>
    <div class="slick-carousel mt-5" style="margin-left:50px;"><!-- inicio do slick -->
    @foreach($bestSeller->slice(0, 10)->toArray() as $bestSellers)
    <div class="card p-2 space-margin-left-5  shadow mb-5 bg-body circle-rounded" style="width: 18rem;"><!-- inicio do card -->
    <a href="{{ route('showProductClient', ['id' => $bestSellers->id]) }}"> 
    <img src="{{$bestSellers->image_product_1}}" class="card-img-top circle-rounded" alt="...">
    <div class="card-body mb-4">
    <h2 class="card-title text-center fw-bold font-card-title color-card-information" style="margin-bottom: 0.1rem;">{{$bestSellers->name}}</h2>
    <h5 class="card-text text-center text-muted fw-bold font-price" style="margin-top: 0.05rem; margin-bottom: 0.05rem;">{{$bestSellers->type_product}}</h5>
    <p class="card-title text-center title-card text-decoration-line-through" style="margin-top: 0.05rem; margin-bottom: 0.05rem;">De <span class="span-card">R$149</span></p>
    <p class="card-text text-center fw-bold font-price font-price color-card-information" style="margin-top: 0.05rem;">Por R$<span class="span-price">{{$bestSellers->price}}</span></p>
    <div class="circle circle-color-best-sellers">
    <a href="{{ route('showProductClient', ['id' => $bestSellers->id]) }}" class="">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart-plus-fill" viewBox="0 0 16 16"><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/></svg>
    </a>
    </div>
    </div>
    </a>
    </div><!-- final do card -->
    @endforeach
    <a href="/categoria/mais-vendidos" class="mt-4 mb-5">
        <div class="d-flex align-items-center justify-content-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="400" height="400" fill="currentColor" class="bi bi-plus me-2" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
        </div>
      </a>
    </div><!-- final do slick -->

    </div><!-- final da div de carrousel de produtos -->

    <footer class="py-5">
      <div class="row">
        <div class="col-6 col-md-2 mb-3">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Home</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Features</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Pricing</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">FAQs</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">About</a>
            </li>
          </ul>
        </div>
        <div class="col-6 col-md-2 mb-3">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Home</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Features</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Pricing</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">FAQs</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">About</a>
            </li>
          </ul>
        </div>
        <div class="col-6 col-md-2 mb-3">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Home</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Features</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">Pricing</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">FAQs</a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-muted">About</a>
            </li>
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
          <li class="ms-3">
            <a class="link-dark" href="#">
              <svg class="bi" width="24" height="24">
                <use xlink:href="#twitter"></use>
              </svg>
            </a>
          </li>
          <li class="ms-3">
            <a class="link-dark" href="#">
              <svg class="bi" width="24" height="24">
                <use xlink:href="#instagram"></use>
              </svg>
            </a>
          </li>
          <li class="ms-3">
            <a class="link-dark" href="#">
              <svg class="bi" width="24" height="24">
                <use xlink:href="#facebook"></use>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </footer>

    <!-- Modal -->
<div class="modal" id="freteModal" tabindex="-1" aria-labelledby="freteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="freteModalLabel">Opções de Frete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Aqui serão exibidos os dados do frete -->
        <div id="freteOptions"></div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="fecharModalBtn">Fechar</button>
      </div>
    </div>
  </div>
</div>

@section('footer')
      @include('footer')
    @endsection 

    <script>
      $(document).ready(function(){
  $('.slider-nav').slick({
    arrows: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    vertical: false, // adicione essa linha para mudar para o modo vertical
    lazyLoad: 'ondemand',
    responsive: [
      {
        breakpoint: 768, // a partir de 768px de largura da tela
        settings: {
          slidesToShow: 2,
          vertical: true // mude para o modo vertical
        }
      },
      {
        breakpoint: 480, // a partir de 480px de largura da tela
        settings: {
          slidesToShow: 1,
          vertical: false, // mude para o modo horizontal
          arrows: true
        }
      }
    ]
  });
  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
});

      function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if (display == "none")
        document.getElementById(el).style.display = 'block';
        else
        document.getElementById(el).style.display = 'none';
      }

      $(document).ready(function() {
      $('#btn-3-placas').click(function() {
        switchPrice($(this).data('price'));
      });
      
      $('#btn-3-placas-reto').click(function() {
        switchPrice($(this).data('price'));
      });
      
      $('#btn-5-placas').click(function() {
        switchPrice($(this).data('price'));
      });
    });

    function switchPrice(newPrice) {
      $('.product-price').text('R$ ' + newPrice);
    }

    function updatePriceField(button) {
      var price = button.getAttribute("data-price");
      document.getElementById("price").value = price;
    }
      $('.slick-carousel').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
        breakpoint: 1024,
        settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

  // Função para calcular o frete e exibir os resultados em um modal
  function calcularFrete() {
        var cep = $('#cep-input').val(); // Obter o valor do campo CEP
        var type_product = $('input[name="type_product"]').val(); //
        // Realizar a chamada AJAX para o backend
        $.ajax({
            url: '/calcular-frete-produto', // Substitua pela URL correta para a rota Laravel
            method: 'GET',
            data: { cep: cep, type_product: type_product },
            dataType: 'json',
            success: function(response) {
                    if (response.success) {
                      var quotations = response.quotations;
                      var freteOptions = $('#freteOptions');

                      // Limpar os dados existentes antes de exibir os novos
                      freteOptions.empty();

                      // Adicionar os dados do frete ao modal
                      quotations.forEach(function(quotation) {
                        freteOptions.append('<p>Os valores de frete podem variar conforme o tamanho do produto</p>');
                        freteOptions.append('<p>Serviço: ' + quotation.service + '</p>');
                        freteOptions.append('<p>Preço: ' + quotation.price + '</p>');
                        freteOptions.append('<p>Prazo de Entrega: ' + quotation.delivery_time + ' dias</p>');
                        freteOptions.append('<hr>');
                      });

                      // Abrir o modal
                      $('#freteModal').modal('show');
                    } else {
                      alert('Não foi possível calcular o frete. Por favor, tente novamente.');
                    }
                  },
            error: function () {
                alert('Erro ao calcular o frete. Por favor, tente novamente.');
            }
        });
    }

    // Chamar a função calcularFrete quando o botão for clicado
    $('#calcular-frete-btn').click(function () {
        calcularFrete();
    });

    document.getElementById('fecharModalBtn').addEventListener('click', fecharModal);
    function fecharModal() {
      var modal = document.getElementById('freteModal');
      var modalBootstrap = new bootstrap.Modal(modal); // Cria uma instância do modal do Bootstrap

      modalBootstrap.hide(); // Fecha o modal corretamente

      // Se necessário, adicione outras ações após fechar o modal
    }
    document.addEventListener('DOMContentLoaded', function() {
        var btnBranca = document.getElementById('btn-branca');
        var btnPreta = document.getElementById('btn-preta');
        var productCharacteristics = document.getElementById('characteristics');

        btnBranca.addEventListener('click', function() {
            productCharacteristics.value = 'Branco';
        });

        btnPreta.addEventListener('click', function() {
            productCharacteristics.value = 'Preto';
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var molduraButtons = document.querySelectorAll('.btn-moldura');

        // Adiciona evento de clique aos botões de moldura
        molduraButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Remove a classe 'btn-selected' de todos os botões de moldura
                molduraButtons.forEach(function(btn) {
                    btn.classList.remove('btn-selected');
                });

                // Adiciona a classe 'btn-selected' apenas ao botão clicado
                this.classList.add('btn-selected');
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var tamanhoButtons = document.querySelectorAll('.btn-tamanho');

        // Adiciona evento de clique aos botões de tamanho
        tamanhoButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Remove a classe 'btn-selected' de todos os botões de tamanho
                tamanhoButtons.forEach(function(btn) {
                    btn.classList.remove('btn-selected');
                });

                // Adiciona a classe 'btn-selected' apenas ao botão clicado
                this.classList.add('btn-selected');
            });
        });
    });
    </script>
@endsection