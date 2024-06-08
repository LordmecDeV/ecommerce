@extends('layouts.user_type.auth')
@section('content')

<div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <form enctype="multipart/form-data" method="post" action="/alterar-carousel">
                @csrf
                {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="">Criar ou alterar imagem do carousel da Home de produtos(Desktop ou Mobile)</label>
                        <select class="form-control" id="" name="image_carousel">
                        <option>Imagem 1</option>
                        <option>Imagem 2</option>
                        <option>Imagem 3</option>
                        <option>Imagem mobile 1</option>
                        <option>Imagem mobile 2</option>
                        <option>Imagem mobile 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Link da imagem</label>
                        <input class="form-control" type="text" name="link_image_carousel" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Link da campanha</label>
                        <input class="form-control" type="text" name="link_collection" id="">
                    </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
                <button type="submit" class="btn btn-primary mt-3">Atualizar imagens do carousel</button>
                </form>
        </div>
    </div>
</div>

@endsection