@extends('layouts.user_type.auth')

@section('content')

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Cadastrar produto</h6>
            </div>
            <div class="card-body pt-4 p-3">
            <div class="d-flex justify-content-center">
                <form class="w-100" enctype="multipart/form-data"method="post" action="/criarProduto/cadastro">
                @csrf
                {{ method_field('POST') }}
                <div class="form-group mt-3">
                <label for="productName">Nome do produto:</label>
                <input type="text" class="form-control" id="productName" name="name" placeholder="Insira o nome do produto">
                </div>
                <div class="form-group mt-3">
                <label for="productPrice">Tag para filtrar produto:</label>
                <input type="text" class="form-control" name="tag" placeholder="Insira a tag de identificação do produto">
                </div>
                <div class="form-group mt-3">
                <label for="productPrice">Insira a SKU unica do produto:</label>
                <input type="text" class="form-control" name="sku" placeholder="Insira a SKU deste produto">
                </div>
                <div class="form-group mt-3">
                <label for="productPrice">Escolha o tipo de produto:</label>
                <select class="form-select" name="type_product" aria-label="Default select example">
                <option>Quadro</option>
                <option>Luminaria</option>
                <option>Mosaico</option>
                <option>Personalizado</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="productPrice">Escolha o status do produto:</label>
                <select class="form-select" name="status" aria-label="Default select example">
                <option selected>Ativo</option>
                <option>Desativado</option>
                </select>
            </div>
                <div class="form-group mt-3">
                <label for="productPrice">Preço do produto:</label>
                <input type="text" class="form-control" id="productPrice" name="price" placeholder="Insira o preço do produto">
                </div>
                <div class="form-group mt-3">
                <label for="formFile" class="form-label">Imagens para o carrousel do produto:</label>
                <input class="form-control" type="file" required multiple name="image_product[]">
                </div>
                <div class="form-group mt-3">
                <label for="formFile" class="form-label">Imagens descrição do produto:</label>
                <input class="form-control" type="file" required multiple name="image_description[]">
                </div>
                <div class="form-group mt-3">
                <label for="productDescription">Descrição do produto:</label>
                <textarea class="form-control" id="productDescription" required name="description" rows="3"></textarea>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Cancelar</a>
                <button type="submit" class="btn btn-primary mt-3">Criar produto</button>
                </form>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection