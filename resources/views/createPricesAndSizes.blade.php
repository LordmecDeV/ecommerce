@extends('layouts.user_type.auth')
@section('content')

<div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <form enctype="multipart/form-data" method="post" action="/store-preco-e-tamanhos">
                @csrf
                {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="">Tipo do produto</label>
                        <select class="form-control" id="" name="type_product">
                        <option>Mosaico - 3 Placas</option>
                        <option>Mosaico - 3 Placas Reto</option>
                        <option>Mosaico - 5 Placas</option>
                        <option>Quadro - 30x55</option>
                        <option>Quadro - 40x66</option>
                        <option>Quadro - 55x92</option>
                        <option>Luminaria</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Preço</label>
                        <input class="form-control" type="text" name="price" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Altura</label>
                        <input class="form-control" type="number" name="height" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Largura</label>
                        <input class="form-control" type="number" name="width" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Comprimento</label>
                        <input class="form-control" type="number" name="length" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Peso</label>
                        <input class="form-control" type="text" name="weight" id="">
                    </div>    
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
                <button type="submit" class="btn btn-primary mt-3">Criar</button>
                </form>
        </div>
    </div>
</div>
@endsection