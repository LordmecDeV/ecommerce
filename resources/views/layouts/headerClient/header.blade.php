<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walmeida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Importação do Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <!-- Importação do Slick Theme CSS (opcional) -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Catamaran:wght@500&family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap');
        .color-header{
          background: #000000;  /* fallback for old browsers */
          background: -webkit-linear-gradient(to right, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
          background: linear-gradient(to right, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .color-header-2{
            background: #D4F1F4;
        }
        .color-card-information{
          color: black;
        }
        .font-price{
          font-family: 'Montserrat', sans-serif;
          font-size: 20px;
        }
        .font-card-title{
          font-family: 'Montserrat', sans-serif;
          font-size: 23px;
        }
        .btn-moldura.btn-selected {
            background-color: #000 !important;
            color: #fff !important;
        }
        .btn-tamanho.btn-selected {
            background-color: #000 !important;
            color: #fff !important;
        }
        .buttonBuy{
          background-color: #189AB4;
          width: 250px;
        }
        .fontBuyProduct{
          color: #8A8A8A;
          font-size: 12px;
        }
        .circle {
          position: absolute;
          bottom: -30px; /* Metade da altura do círculo */
          left: 50%;
          transform: translateX(-50%);
          width: 80px; /* Largura do círculo */
          height: 80px; /* Altura do círculo */
          border-radius: 50%;
          margin-top: -30px; /* Metade da altura do círculo */
          transition: all 0.3s ease-in-out; /* Transição suave */
          cursor: pointer; /* Altera o cursor do mouse ao passar por cima */
          display: flex;
          align-items: center;
          justify-content: center;
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Efeito de sombra para sobreposição */
          border: 5px solid white; /* Adiciona a borda branca */
        }
        .circle-rounded{
          border-radius: 4.5%;
        }
        .custom-button {
          background: none;
          border: none;
          padding: 0;
          color: inherit;
          cursor: pointer;
          /* Outros estilos personalizados, se necessário */
        }
        .circle-color-lauchs{
          background-color: #ff007f;
        }
        .circle-color-best-sellers{
          background-color: #007bff;
        }
        .circle-color-highlights{
          background-color: #F7D060;
        }
        .circle-color-mosaics{
          background-color: #5BC0F8;
        }
        .circle-color-lighting{
          background-color: #94B4A4;
        }
        .circle-color-frame{
          background-color: #440047;
        }
        .circle:hover {
          width: 90px; /* Largura aumentada do círculo */
          height: 90px; /* Altura aumentada do círculo */
        }
        .circle:hover i {
          transform: scale(1.3); /* Aumenta o tamanho do ícone */
        }
        .fontCalculateFrete{
          font-size: 15px;
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
        .span-card{
            font-size:20px;
            color: grey;
        }
        .span-price{
            font-size:30px;
        }
        .parent {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(5, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        }
        .card:hover {
          transform: scale(1.02);
          transition: all 0.2s ease-in-out;
        }
        .div1 { grid-area: 1 / 3 / 5 / 5; }
        .div2 { grid-area: 5 / 3 / 6 / 5; }
        .div3 { grid-area: 1 / 5 / 6 / 7; }
        @media screen and (min-width: 768px) {
            .margin-responsive {
            margin-left: 290px;
            }
          }
        @media screen and (max-width: 767px) {
            .slider-nav {
            display: none;
            }
            .search-nav {
            display: none;
            }
            .information-none{
              display: none;
            }
            .carousel-height{
              height: 400px;
            }
            .button-width{
              width: 100%;
            }
          }
          .gradient-custom {
          /* fallback for old browsers */
          background-color: #8BC6EC;
          background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
          }
          
    </style>
</head>
<header>
  <!-- Jumbotron -->
  <div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="row gy-3">
        <!-- Left elements -->
        <div class="col-lg-2 col-sm-4 col-4">
          <a href="/home" target="_blank" class="float-start">
            <img src="https://i.ibb.co/cbhjFyD/LOGO-BAIXA-RESOLU-O.png" height="50" />
          </a>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <div class="order-lg-last col-lg-5 col-sm-8 col-8">
          <div class="d-flex float-end">
            <a class="btn btn-primary rounded-circle p-3 lh-1" style="margin-right:10px;" data-bs-toggle="offcanvas" href="#offcanvasUser" role="button" aria-controls="offcanvasExample"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg></a>
            <a class="btn btn-primary rounded-circle p-3 lh-1" style="margin-right:10px;" data-bs-toggle="offcanvas" href="#offcanvasFavorite" role="button" aria-controls="offcanvasExample" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/></svg></a>
            <a role="button" aria-controls="offcanvasExample" href="#offcanvasRight" data-bs-toggle="offcanvas" class="btn btn-primary rounded-circle p-3 lh-1" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a>
          </div>
        </div>
        <!-- offcanvas usuario -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasUser" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Meus dados</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div>
          @auth
          <ul class="list-group list-group-flush text-start">
            <li class="list-group-item list-group-item-action text-reset" ><a href="/informacoes-do-usuario" class="text-reset">Minha conta</li></a>
            <a href=""><li class="list-group-item list-group-item-action text-reset"><a href="" class="text-reset">Meus pedidos</li></a>
            <a href=""><li class="list-group-item list-group-item-action text-reset"><a href="/favoritos" class="text-reset">Favoritos</li></a>
            <a href=""><li class="list-group-item list-group-item-action text-reset"><a href="" class="text-reset">Rastrear pedidos</li></a>
            <a href=""><li class="list-group-item list-group-item-action text-reset"><a href="{{ url('/logout')}}" class="text-reset">Sair</li></a>
            
          </ul>
          @endauth
          @guest
            <p>Faça o <a href="{{ route('login') }}">login</a> ou <a href="/register">registre-se</a> para continuar.</p>
          @endguest
          </div>
          
        </div>
      </div>
        <!-- Center elements -->
        <!-- offcanvas carrinho -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRight">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRight">Carrinho</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
            <div class="offcanvas-body">
              @auth
              <div>
                @foreach($headerCartItems as $items)
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                    <img src="{{$items->image_product_1}}" class="img-fluid rounded-3" alt="item cart">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">{{$items->type_product}}</h6>
                      <h6 class="text-black mb-0">{{$items->name}}</h6>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0">R${{$items->price}}</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                     
                    </div>
                  </div>
                  <hr class="my-4">
                @endforeach
              </div>
              <div class="d-flex justify-content-end">
                <a href="/carrinho" class="btn btn-primary">Ir para o carrinho</a>
              </div>
              @endauth
              @guest
              <p>Você precisa estar logado para adicionar itens ao carrinho. Faça o <a href="{{ route('login') }}">login</a> ou <a href="/register">registre-se</a> para continuar.</p>
              @endguest
            </div>
          </div>
          <!-- offcanvas favoritos -->
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasFavorite" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Favoritos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
            <div class="offcanvas-body">
              @auth
              <div>
                @foreach($favoriteItems as $items)
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                    <a href="{{ route('showProductClient', ['id' => $items->id]) }}"><img src="{{$items->image_product_1}}" class="img-fluid rounded-3" alt="Cotton T-shirt"></a>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">{{$items->type_product}}</h6>
                      <a href="{{ route('showProductClient', ['id' => $items->id]) }}"><h6 class="text-black mb-0">{{$items->name}}</h6></a>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                  <hr class="my-4">
                @endforeach
              </div>
              <div class="d-flex justify-content-end">
                <a href="/favoritos" class="btn btn-primary">Ver meus favoritos</a>
              </div>
              @endauth
              @guest
              <p>Você precisa estar logado para adicionar itens aos favoritos. Faça o <a href="{{ route('login') }}">login</a> ou <a href="/register">registre-se</a> para continuar.</p>
              @endguest
            </div>
          </div>
        <!-- Right elements -->
        <div class="col-lg-5 col-md-12 col-12">
          <div class="input-group float-center">
            <div class="form-outline">
              <input type="search" id="form1" class="form-control" />
            </div>
            <button type="button" class="btn btn-primary shadow-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
            </button>
          </div>
        </div>
        <!-- Right elements -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container justify-content-center justify-content-md-between">
      <!-- Toggle button -->
      <button
              class="navbar-toggler border py-2 text-dark"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarLeftAlignExample"
              aria-controls="navbarLeftAlignExample"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/categoria/mais-vendidos">Mais vendidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/categoria/destaques">Produtos em destaque</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/categoria/lancamentos">Lançamentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/categoria/luminaria">Luminária</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/categoria/mosaico">Mosaicos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/categoria/quadro">Quadros</a>
          </li>
            </ul>
          </li>
        </ul>
        <!-- Left links -->
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!-- Products -->
    <body>
    <!-- Importação do jQuery (necessário para o Slick) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Importação do Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    @yield('content')
    </body>
    @section('footer')
      @include('footer')
    @endsection 
</html>