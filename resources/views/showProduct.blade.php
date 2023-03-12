
@extends('layouts.user_type.auth')

@section('content')
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                @if($viewProduct->type_product == 'Quadro')
              <img src="https://www.designerd.com.br/wp-content/uploads/2021/10/mockup-quadro-sala.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                @elseif($viewProduct->type_product == 'Luminaria')
              <img src="https://dcu3z7fnvhgqn.cloudfront.net/Custom/Content/Products/16/54/1654_luminaria-de-piso-metal-preta-p8728771_z3_637252121138469759.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              @elseif($viewProduct->type_product == 'Mosaico')
              <img src="https://img.elo7.com.br/product/zoom/25FB1E7/mockup-quadro-mosaico-ziper-editavel-para-criacao-anuncio-trocar.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              @endif
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{$viewProduct->type_product}}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Administrar {{$viewProduct->type_product}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Informações do produto:</h6>
            </div>
            <div class="card-body p-3">
            <ul class="list-group">
            <li class="list-group-item">Nome: {{$viewProduct->name}}</li>
            <li class="list-group-item">SKU: {{$viewProduct->sku}}</li>
            <li class="list-group-item">Tags: {{$viewProduct->tag}}</li>
            <li class="list-group-item">Tipo de produto: {{$viewProduct->type_product}}</li>
            <li class="list-group-item">Status: {{$viewProduct->status}}</li>
            <li class="list-group-item">Preço: {{$viewProduct->price}}</li>
            </ul>
            <button type="button" class="btn bg-gradient-primary mt-3" data-bs-toggle="modal" data-bs-target="#updateProduct">Atualizar produto</button>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Descrição do produto:</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#updateProductDescription"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16"><path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/></svg></button>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <p class="text-sm">
              {{$viewProduct->description}}
              </p>
              <hr class="horizontal gray-light my-4" >
              <button style="" class="btn btn-primary" type="button" onclick="Mudarestado('minhaDiv')">Ver imagens do produto</button>
              <div class="slider-container" id="minhaDiv" style="display:none;">
            <div class="slider">
                <img src="{{$viewProduct->image_product_1}}" class="img-fluid shadow border-radius-lg" alt="Slide 1">
                <img src="{{$viewProduct->image_product_2}}" class="img-fluid shadow border-radius-lg" alt="Slide 2">
                <img src="{{$viewProduct->image_product_3}}" class="img-fluid shadow border-radius-lg" alt="Slide 3">
                <img src="{{$viewProduct->image_product_4}}" class="img-fluid shadow border-radius-lg" alt="Slide 4">
                <img src="{{$viewProduct->image_product_5}}" class="img-fluid shadow border-radius-lg" alt="Slide 5">
                <img src="{{$viewProduct->image_product_6}}" class="img-fluid shadow border-radius-lg" alt="Slide 6">
                <img src="{{$viewProduct->image_product_7}}" class="img-fluid shadow border-radius-lg" alt="Slide 7">
                <img src="{{$viewProduct->image_product_8}}" class="img-fluid shadow border-radius-lg" alt="Slide 8">
                <img src="{{$viewProduct->image_product_9}}" class="img-fluid shadow border-radius-lg" alt="Slide 9">
                <img src="{{$viewProduct->image_product_10}}" class="img-fluid shadow border-radius-lg" alt="Slide 10">
            </div>
            <div class="slider-controls">
                <button class="prev-slide btn btn-danger">Anterior</button>
                <button class="next-slide btn btn-danger">Próximo</button>
            </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Vendas deste produto:</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="avatar me-3">
                    <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Sophie B.</h6>
                    <p class="mb-0 text-xs">Hi! I need more information..</p>
                  </div>
                  <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Informações do pedido</a>
                </li>
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="avatar me-3">
                    <img src="../assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Anne Marie</h6>
                    <p class="mb-0 text-xs">Awesome work, can you..</p>
                  </div>
                  <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Informações do pedido</a>
                </li>
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="avatar me-3">
                    <img src="../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Ivanna</h6>
                    <p class="mb-0 text-xs">About files I can..</p>
                  </div>
                  <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Informações do pedido</a>
                </li>
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="avatar me-3">
                    <img src="../assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Peterson</h6>
                    <p class="mb-0 text-xs">Have a great afternoon..</p>
                  </div>
                  <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Informações do pedido</a>
                </li>
                <li class="list-group-item border-0 d-flex align-items-center px-0">
                  <div class="avatar me-3">
                    <img src="../assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Nick Daniel</h6>
                    <p class="mb-0 text-xs">Hi! I need more information..</p>
                  </div>
                  <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Informações do pedido</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-1">Imagens</h6>
              <p class="text-sm">Carrousel de imagens do produto</p>
            </div>
            <div class="card-body p-3">
              <div class="row">
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card h-100 card-plain border">
                    <div class="card-body d-flex flex-column justify-content-center text-center">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus text-secondary mb-3"></i>
                        <h5 class=" text-secondary">Atualizar imagens do produto</h5>
                    </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('layouts.footers.auth.footer')
    </div>
  </div>
        <!-- Modal -->
        <div class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Atualizar dados do produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="w-100" enctype="multipart/form-data"method="post" action="{{ route('atualizarProduto', ['id' => $viewProduct->id]) }}">
            {{ csrf_field() }}
            {{ method_field('put') }}
                <div class="form-group mt-3">
                <label for="productName">Nome do produto:</label>
                <input type="text" class="form-control" value="{{$viewProduct->name}}" id="productName" name="name">
                </div>
                <div class="form-group mt-3">
                <label for="productPrice">Tag para filtrar produto:</label>
                <input type="text" class="form-control" name="tag" value="{{$viewProduct->tag}}">
                </div>
                <div class="form-group mt-3">
                <label for="productPrice">Insira a SKU unica do produto:</label>
                <input type="text" class="form-control" name="sku" value="{{$viewProduct->sku}}">
                </div>
                <div class="form-group mt-3">
                <label for="productPrice">Escolha o tipo de produto:</label>
                <select class="form-select" name="type_product" aria-label="Default select example">
                <option {{($viewProduct->type_product == 'Quadro' ? 'selected' : '' )}}>Quadro</option>
                <option {{($viewProduct->type_product == 'Luminaria' ? 'selected' : '' )}}>Luminaria</option>
                <option {{($viewProduct->type_product == 'Mosaico' ? 'selected' : '' )}}>Mosaico</option>
                <option {{($viewProduct->type_product == 'Personalizado' ? 'selected' : '' )}}>Personalizado</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="productPrice">Escolha o status do produto:</label>
                <select class="form-select" name="status" aria-label="Default select example">
                <option {{($viewProduct->status == 'Ativo' ? 'selected' : '' )}}>Ativo</option>
                <option {{($viewProduct->status == 'Desativado' ? 'selected' : '' )}}>Desativado</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="productPrice">Preço do produto:</label>
                <input type="text" class="form-control" id="productPrice" value="{{$viewProduct->price}}" name="price">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn bg-gradient-primary">Atualizar</button>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="updateProductDescription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Atualizar descrição</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="w-100" enctype="multipart/form-data"method="post" action="{{ route('atualizarProduto', ['id' => $viewProduct->id]) }}">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group mt-3">
                <label for="productDescription">Descrição do produto:</label>
                <textarea class="form-control" value="{{$viewProduct->description}}" id="productDescription" required name="description" rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn bg-gradient-primary">Atualizar</button>
            </form>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Atualizar Imagem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="w-100" enctype="multipart/form-data"method="post" action="{{ route('atualizarProduto', ['id' => $viewProduct->id]) }}">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group mt-3">
                <label for="productName">Imagem 1:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_1}}" name="image_product_1" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 2:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_2}}" name="image_product_2" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 3:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_3}}" name="image_product_3" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 4:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_4}}" name="image_product_4" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 5:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_5}}" name="image_product_5" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 6:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_6}}" name="image_product_6" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 7:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_7}}" name="image_product_7" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 8:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_8}}" name="image_product_8" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 9:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_9}}" name="image_product_9" placeholder="Insira o link da imagem">
                <label for="productName">Imagem 10:</label>
                <input type="text" class="form-control" id="productName" value="{{$viewProduct->image_product_10}}" name="image_product_10" placeholder="Insira o link da imagem">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn bg-gradient-primary">Adicionar</button>
            </form>
            </div>
            </div>
        </div>
        </div>
@endsection
