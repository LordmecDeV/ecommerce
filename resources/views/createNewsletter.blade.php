@extends('layouts.user_type.auth')
@section('content')

<div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <form enctype="multipart/form-data" method="post" action="/store-newsletter">
                @csrf
                {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="" class="form-control-label">Titulo da campanha</label>
                        <input class="form-control" id="title_campaign" type="text" name="title_campaign"/>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Titulo do conteúdo</label>
                        <input class="form-control" id="title_content" type="text" name="title_content"/>
                    </div>
                    <div class="form-group">
                        <label for="produto">Selecione os produtos</label>
                        <select multiple class="form-control" name="products_in_mail[]">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="display:none;">
                        <label for="" class="form-control-label">Imagem de fundo newsletter</label>
                        <input class="form-control" id="image" type="text" name="image"/>
                    </div>
                    <div class="form-group" style="display:none;">
                        <label for="" class="form-control-label" >Cor do header</label>
                        <input class="form-control" id="color_header" type="text" name="color_header"/>
                    </div>
                    <div class="form-group" style="display:none;">
                        <label for="" class="form-control-label">Cor do footer</label>
                        <input class="form-control" id="color_footer" type="text" name="color_footer"/>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Link facebook</label>
                        <input class="form-control" id="link_facebook" type="text" name="link_facebook"/>
                    </div>  
                    <div class="form-group">
                        <label for="" class="form-control-label">Link instagram</label>
                        <input class="form-control" id="link_instagram" type="text" name="link_instagram"/>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Link whatsapp</label>
                        <input class="form-control" id="link_whatsapp" type="text" name="link_whatsapp"/>
                    </div>  
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
                <button type="submit" class="btn btn-primary mt-3">Criar</button>
                </form>
        </div>
    </div>
</div>

@endsection