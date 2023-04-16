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
    <style>
        .color-header{
          background: #000000;  /* fallback for old browsers */
          background: -webkit-linear-gradient(to right, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
          background: linear-gradient(to right, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
        .card:hover {
          transform: scale(1.05);
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
    </style>
</head>
<header>
  <div class="container-fluid p-0">
    <nav class="navbar py-2 px-5 color-header d-flex align-items-center justify-content-between">
      <div>
        <a class="navbar-brand" href="/home">
          <img src="https://i.ibb.co/cbhjFyD/LOGO-BAIXA-RESOLU-O.png" alt="LOGO-BAIXA-RESOLU-O" border="0" width="256" height="85">
        </a>
      </div>
      <div class="search-nav">
      <form class="form-inline my-2 my-lg-0">
       
      </form>
      </div>
      <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-list" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>
        </button>
      </div>
    </nav>
  </div>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header border-bottom border-secondary">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel ">Walmeida</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
  <div class="offcanvas-body p-0">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="/categoria/luminaria" class="stretched-link">Luminária</a></li>
      <li class="list-group-item">A second item</li>
      <li class="list-group-item">A third item</li>
      <li class="list-group-item">A fourth item</li>
      <li class="list-group-item">And a fifth one</li>
    </ul>
  </div>
</header><!--final do header--> 
    <body>
      <!-- Importação do jQuery (necessário para o Slick) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Importação do Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    @yield('content')
    </body>
</html>