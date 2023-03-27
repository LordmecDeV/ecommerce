<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Importação do Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <!-- Importação do Slick Theme CSS (opcional) -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        .color-header{
            background: #189AB4;
        }
        .color-header-2{
            background: #D4F1F4;
        }
        .buttonBuy{
          background-color: #189AB4;
          width: 250px;
        }
        .fontBuyProduct{
          color: #8A8A8A;
          font-size: 12px;
        }
        .fontBuyProduct2{
          color: #201F1F;
          font-size: 15px;
        }
        .fontBuyProduct3{
          color: #201F1F;
          font-size: 17px;
        }
        .space-margin-right-5{
            margin-right:50px;
        }
        .space-margin-right-4{
            margin-right:40px;
        }
        .space-margin-left-5{
            margin-right:50px;
        }
        .space-margin-right-9{
            margin-right:300px;
        }
        .space-margin-right-1{
            margin-right: 10px;
        }
        .text-header-login{
            font-size: 14px;
            text-align: right;
            color: white;
        }
        .container-href-login{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .a-href-login {
            color: #FFFFFF;
            font-weight: bold;
        }
        .a-href-bem-vindo {
            color: #FFFFFF;
            font-weight: normal;
            text-decoration: none;
        }
        .a-href-card {
            color: #36C5C4;
            font-weight: normal;
            text-decoration: none;
        }
        .price-card{
            color:#36C5C4;
            font-size: 23px;
        }
        .title-card{
            color:#201F1F;
            font-size: 16px;
        }
        .discount-card{
            color:#201F1F;
            font-size: 12px;
        }
        .height-footer {
            height: auto;
        }
        .width-coments {
            max-width: 200px;
        }
        .slick-prev.slick-arrow:before, .slick-next.slick-arrow:before{
            color: black;
        }
        .slider-for{
              position:relative;
        }
        .slider-for{
              position:relative;
        }
        body {
            overflow-x: hidden;
            background-color: #F3F6F4;
        }
        footer{
            background-color:white;
        }
        span{
            font-size:20px;
            color: red;
        }
        .parent {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(5, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        }

        .div1 { grid-area: 1 / 3 / 5 / 5; }
        .div2 { grid-area: 5 / 3 / 6 / 5; }
        .div3 { grid-area: 1 / 5 / 6 / 7; }
           
    </style>
</head>
<header>
<div class="px-3 py-2 color-header">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <!-- Logo -->
        <a href="/home"><img src="https://i.ibb.co/cbhjFyD/LOGO-BAIXA-RESOLU-O.png" alt="LOGO-BAIXA-RESOLU-O" border="0" width="256" height="85"></a>
      </div>
      <div class="col-12 col-lg-auto mb-2 mb-lg-0 text-center">
        <form class="d-flex input-group">
          <!-- Input de Pesquisa -->
          <input class="form-control me-2 rounded-pill" type="search" placeholder="Digite o que você procura" aria-label="Search">
        </form>
      </div>
      <div class="d-flex align-items-center">
        <!-- Ícones -->
        <!-- dropdown favoritos -->
        <div class="dropdown">
        <a class="dropdown-toggle space-margin-right-5 text-header-login" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" class="bi bi-heart-fill space-margin-right-1" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/></svg>Favoritos</a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        </div>
        <!-- fim dropdown -->
        <!-- ir para pagina de login ou cadastro -->
        <div class="container-href-login">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" class="bi bi-person-circle space-margin-right-1" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
        </div>
        <div class="text-header-login">
           <a href="/home" class="a-href-bem-vindo space-margin-right-4">Bem-vindo(a)</a>  <br><a href="pagina-de-login"class="a-href-login">entrar</a> ou <a href="pagina-de-cadastro" class="a-href-login">cadastrar</a>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="container-fluid p-0"><!-- submenu com lista de categorias de produtos -->
    <div class=" border-bottom color-header-2">
        <div class="text-end">
        <ul class="nav col-12 col-lg-auto my-2 justify-content-end my-md-0 text-small space-margin-right-9">
            <li>
              <a href="#" class="nav-link text-black">
             <img src="https://i.ibb.co/1fRLnpH/2316a681fa6fab7e7a6099f0bb194665.png" alt="2316a681fa6fab7e7a6099f0bb194665" width="40" height="40" border="0">
                Luminárias
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-black">
              <img src="https://i.ibb.co/f2Zg8ZW/3133e4cd4c88a55f18f7093f9d2fed89.png" alt="3133e4cd4c88a55f18f7093f9d2fed89" width="40" height="40" border="0">
                Mosaicos
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-black">
              <img src="https://i.ibb.co/pjj8J40/1cdfb6f3429d1c702cd1ad5c9a15474c.png" alt="1cdfb6f3429d1c702cd1ad5c9a15474c" width="40" height="40" border="0">
                Quadros
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-black">
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/></svg>
                Destaque
              </a>
            </li>
          </ul>
      </div>
      </div>
    </div> 
  </header><!--final do header--> 
<body>

  <div class="parent"><!--começo grid generator-->

    <div class="div1 mt-5"> 
      <div class="slider-for shadow-lg p-3 bg-body rounded-5">
        <div><img src="{{$viewProduct->image_product_1}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_1}}"></div>
        <div><img src="{{$viewProduct->image_product_2}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_2}}"></div>
        <div><img src="{{$viewProduct->image_product_3}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_3}}"></div>
        <div><img src="{{$viewProduct->image_product_4}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_4}}"></div>
        <div><img src="{{$viewProduct->image_product_5}}" class="img-fluid rounded-4" data-lazy="{{$viewProduct->image_product_5}}"></div>
      </div>
    </div>

    <div class="div2 "> 
      <div class="slider-nav" >
        <div><img width="200" height="150" src="{{$viewProduct->image_product_1}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_1}}"></div>
        <div><img width="200" height="150" src="{{$viewProduct->image_product_2}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_2}}"></div>
        <div><img width="200" height="150" src="{{$viewProduct->image_product_3}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_3}}"></div>
        <div><img width="200" height="150" src="{{$viewProduct->image_product_4}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_4}}"></div>
        <div><img width="200" height="150" src="{{$viewProduct->image_product_5}}" class="img-thumbnail rounded-3" data-lazy="{{$viewProduct->image_product_5}}"></div>
      </div>
    </div>

    <div class="div3 mt-5" style="margin-left:50px;">
       <ul class="list-group list-group-flush">
        <li class="list-group">
          <h1 class="">{{$viewProduct->name}}<h1>
        </li>
        <li class="list-group">
          <h6 class="border-bottom">Selecione a moldura:</h6> 
            <ul class="list-inline justify-content-start">
              <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="90" fill="black" class="bi bi-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/></svg></li>
              <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="90" fill="#8A8A8A" class="bi bi-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/></svg></li></li>
              <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="90" fill="pink" class="bi bi-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/></svg></li></li>
            </ul>
        </li>
        <li class="list-group mt-2">
        <h6 class="border-bottom">Selecione o tamanho:</h6>
          <ul class="list-inline d-flex justify-content-start">
            <li class="list-inline-item"><a href="https://imgbb.com/"><img src="https://i.ibb.co/HPp7cPt/Captura-de-tela-de-2023-03-26-18-13-17.png" alt="Captura-de-tela-de-2023-03-26-18-13-17" border="0" height="80px"></a></li>
            <li class="list-inline-item"><a href="https://imgbb.com/"><img src="https://i.ibb.co/nMSyRwJ/Captura-de-tela-de-2023-03-26-18-16-09.png" alt="Captura-de-tela-de-2023-03-26-18-16-09" border="0" height="80px"></a></li></li>
            <li class="list-inline-item"><a href="https://imgbb.com/"><img src="https://i.ibb.co/WD7cN1M/Captura-de-tela-de-2023-03-26-18-17-48.png" alt="Captura-de-tela-de-2023-03-26-18-17-48" border="0" height="80px"></a></li>
          </ul>
        </li>
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
            <button type="button" class="btn buttonBuy btn-lg rounded-5">Comprar</button>
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
  </div><!--final do grid-->

  <div class="container-fluid mt-5"><!--Descrição-->
    <div class="d-flex justify-content-center">
      <button style="" class="btn mt-3" type="button" onclick="Mudarestado('minhaDiv')"><h1>Descrição</h1> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/></svg></button>
    </div> 
        <div class="" id="minhaDiv" style="display:none;">
        <img src="https://i.ibb.co/JHfBRH7/CATALOGO-PAINEIS-pdf-1.jpg" class="mx-auto d-block mt-5" alt="CATALOGO-PAINEIS-pdf-1" border="0">
        </div>         
  </div><!--Descrição final-->

  <div class="container-fluid p-0"><!-- inicio da div de carrousel de produtos -->
    <div class="d-flex align-items-center justify-content-center">
    <h2 class="text-center mt-5">Mais vendidos</h2>
    </div>
    <div class="slick-carousel mt-5 p-3"><!-- inicio do slick -->
    @foreach($bestSeller as $bestSellers)
    <div class="card space-margin-left-5  shadow mb-5 bg-body rounded-4" style="width: 18rem;"><!-- inicio do card --> 
    <img src="{{$bestSellers->image_product_1}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title text-center title-card">{{$bestSellers->name}}</h5>
    <p class="card-text text-center price-card">R$ {{$bestSellers->price}} <a href="#" class="a-href-card">no pix</a></p>
    <h5 class="card-text text-center discount-card">Com 3% de desconto</h5>
    <h5 class="card-text text-center discount-card">A partir de R$ 74,90</h5>
    <h5 class="card-text text-center discount-card">até 4x de R$ 18,72 sem juros</h5>
    <a href="{{ route('showProductClient', ['id' => $bestSellers->id]) }}" class="btn btn-primary d-flex justify-content-center">Ver mais...</a>
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

    <!-- Importação do jQuery (necessário para o Slick) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Importação do Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
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
</body>
</html>