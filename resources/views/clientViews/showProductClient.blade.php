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
              <li class="list-inline-item"><button type="button" class="btn btn-outline-dark">Branca</button></li>
              <li class="list-inline-item"><button type="button" class="btn btn-outline-dark">Preta</button></li>
            </ul>
        </li>
        <li class="list-group mt-2">
        <h6 class="border-bottom">Selecione o tamanho:</h6>
          <ul class="list-inline d-flex justify-content-start">
            <li class="list-inline-item"><button type="button" class="btn btn-outline-dark" id="btn-3-placas" data-price="{{$getSmallFrame}}" onclick="updatePriceField(this)">30x55</button></li>
            <li class="list-inline-item"><button type="button" class="btn btn-outline-dark" id="btn-3-placas-reto" data-price="{{$getMidFrame}}" onclick="updatePriceField(this)">40x66</button></li>
            <li class="list-inline-item"><button type="button" class="btn btn-outline-dark" id="btn-5-placas" data-price="{{$getBigFrame}}" onclick="updatePriceField(this)">55x92</button></li>
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
              <input type="hidden" id="price" name="quantity" value="1">
              <button type="submit" class="btn btn-primary btn-lg rounded-5">Adicionar ao carrinho</button>
            </form>
          </div>
        </li>
        <li class="list-group">
          <div class="d-flex justify-content-start mt-4">
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">CEP</span>
              <input type="text" class="form-control-sm input-group-sm" placeholder="Digite seu CEP" aria-label="" aria-describedby="basic-addon1">
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
              <li class="list-inline-item"><button type="button" class="btn btn-outline-dark" id="btn-5-placas" data-price="{{$price->price}}" onclick="updatePriceField(this)">5 Placas</button></li>
              @endforeach
            </ul>
        </li>
        <li class="list-group mt-2">
          <ul class="list-group list-group-flush c">
            <li class="list-group"><h2 class="product-price" data-price="{{$viewProduct->price}}" onclick="updatePriceField(this)">{{$viewProduct->price}} <span>no pix</span> </h2></li>
            <li class="list-group"><h6 class="fontBuyProduct">com 3% de desconto</h6></li>
             <li class="list-group"><h6 class="fontBuyProduct2"><h6>A partir de <span>R$$$</span></h6></li><!-- criar variavel para aplicar desconto no valor do produto -->
            <li class="list-group"><a href class="fontBuyProduct3">mais formas de pagamento<svg style="margin-left:20px;" xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/><path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/></svg></a></li>
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
              <input type="text" class="form-control-sm input-group-sm" placeholder="Digite seu CEP" aria-label="" aria-describedby="basic-addon1">
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
            <li class="list-group"><a href class="fontBuyProduct3">mais formas de pagamento<svg style="margin-left:20px;" xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/><path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/></svg></a></li>
          </ul>
      </li>
        <li class="list-group mt-4">
          <div class="d-flex justify-content-start">
            <button type="button" class="btn buttonBuy btn-lg rounded-5">Adicionar ao carrinho</button>
          </div>
        </li>
        <li class="list-group">
          <div class="d-flex justify-content-start mt-4">
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">CEP</span>
              <input type="text" class="form-control-sm input-group-sm" placeholder="Digite seu CEP" aria-label="" aria-describedby="basic-addon1">
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


       

  <div class="container-fluid mt-5"><!--Descrição-->
    <div class="d-flex justify-content-center">
      <button style="" class="btn mt-3" type="button" onclick="Mudarestado('minhaDiv')"><h1>Descrição</h1> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/></svg></button>
    </div> 
        <div class="" id="minhaDiv" style="display:none;">
        <img src="https://sat02pap005files.storage.live.com/y4mRBau8W1UjHcasic0XKGkfdGmhL0152CBM1Vf5H7744AK946AXdiwWl3XwJRnK8NxmeDeMqErffMKQuBKojbsEm2Uo3UQMqjVo2hJWUpA027lLQC3SuGM_pBGO6JRt8eEmaQR2m69l9ktiZWPidsKg_CaxlpoHGGD8bMwjasSGOPNrBbuKzJHY9WQ_hZhdmn5?width=1500&height=12497&cropmode=none" class="mx-auto d-block mt-5" alt="CATALOGO-PAINEIS-pdf-1" border="0">
        </div>         
  </div><!--Descrição final-->

  <div class="container-fluid p-0"><!-- inicio da div de carrousel de produtos -->
    <div class="d-flex align-items-center justify-content-center">
    <h2 class="text-center mt-5">Mais vendidos</h2>
    </div>
    <div class="slick-carousel mt-5" style="margin-left:45px;"><!-- inicio do slick -->
    @foreach($bestSeller as $bestSellers)
    <div class="card space-margin-left-5  shadow mb-5 bg-body rounded-4" style="width: 18rem;"><!-- inicio do card --> 
    <img src="{{$bestSellers->image_product_1}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title text-center title-card">{{$bestSellers->name}}</h5>
    <p class="card-text text-center price-card">R$ {{$bestSellers->price}} <a href="#" class="a-href-card">no pix</a></p>
    <h5 class="card-text text-center discount-card">Com 3% de desconto</h5>
    <h5 class="card-text text-center discount-card">A partir de R$ 74,90</h5>
    <h5 class="card-text text-center discount-card">até 4x de R$ 18,72 sem juros</h5>
    <a href="{{ route('showProductClient', ['id' => $bestSellers->id]) }}" class="btn btn-secondary d-flex justify-content-center">Ver mais...</a>
    </div>
    </div><!-- final do card -->
    @endforeach
    </div><!-- final do slick -->
    </div><!-- final da div de carrousel de produtos -->

<div class="container-fluid bg-white mt-5">
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
      <p>© 2022 Company, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>
  </footer>
</div>

   
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
    </script>
@endsection