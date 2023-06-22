@extends('layouts.user_type.auth')
@section('content')

<div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <form enctype="multipart/form-data"method="post" action="{{ route('atualizar-preco-e-tamanho-produto', ['id' => $updateProduct->id]) }}">
                {{ csrf_field() }}
                {{ method_field('put') }}
                    <div class="form-group">
                        <label for="">Tipo do produto</label>
                        <select class="form-control" id="" name="type_product">
                        <option {{($updateProduct->type_product == 'Mosaico - 3 Placas' ? 'selected' : '' )}}>Mosaico - 3 Placas</option>
                        <option {{($updateProduct->type_product == 'Mosaico - 3 Placas Reto' ? 'selected' : '' )}}>Mosaico - 3 Placas Reto</option>
                        <option {{($updateProduct->type_product == 'Mosaico - 5 Placas' ? 'selected' : '' )}}>Mosaico - 5 Placas</option>
                        <option {{($updateProduct->type_product == 'Quadro - 30x55' ? 'selected' : '' )}}>Quadro - 30x55</option>
                        <option {{($updateProduct->type_product == 'Quadro - 40x66' ? 'selected' : '' )}}>Quadro - 40x66</option>
                        <option {{($updateProduct->type_product == 'Quadro - 55x92' ? 'selected' : '' )}}>Quadro - 55x92</option>
                        <option {{($updateProduct->type_product == 'Luminaria' ? 'selected' : '' )}}>Luminaria</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Preço</label>
                        <input class="form-control" type="" value="{{$updateProduct->price}}" name="price" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Altura</label>
                        <input class="form-control" type="number" value="{{$updateProduct->height}}" name="height" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Largura</label>
                        <input class="form-control" type="number" value="{{$updateProduct->width}}" name="width" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Comprimento</label>
                        <input class="form-control" type="number" value="{{$updateProduct->length}}" name="length" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Peso</label>
                        <input class="form-control" type="text" value="{{$updateProduct->weight}}" name="weight" id="">
                    </div>    
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
                <button type="submit" class="btn btn-primary mt-3">Editar</button>
                </form>
        </div>
    </div>
</div>

@endsection