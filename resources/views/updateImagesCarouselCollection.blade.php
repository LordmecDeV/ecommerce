@extends('layouts.user_type.auth')
@section('content')

<div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <form enctype="multipart/form-data" method="post" action="/alterar-carousel-colecoes">
                @csrf
                {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="">Qual imagem alterar</label>
                        <select class="form-control" id="" name="image_carousel">
                        <option>Mosaico</option>
                        <option>Produtos em destaque</option>
                        <option>Lançamentos</option>
                        <option>Quadros</option>
                        <option>Luminaria</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Link da imagem</label>
                        <input class="form-control" type="text" name="link_image_carousel" id="">
                    </div>

                    <div class="form-group">
                        <label for="" class="form-control-label">Link da coleção de produtos(Mais vendidos, Lançamentos, Mosaico, etc)</label>
                        <input class="form-control" type="text" name="link_collection" id="">
                    </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
                <button type="submit" class="btn btn-primary mt-3">Atualizar imagens da coleção</button>
                </form>
        </div>
    </div>
</div>

@endsection