@extends('layouts.user_type.auth')
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabela de preços e tamanhos</h6>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo de produto</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Preço</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Largura</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Peso</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($viewAll as $viewAlls)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$viewAlls->type_product}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">R$ {{$viewAlls->price}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$viewAlls->width}}</p>
                      </td>
                      <td class="align-middle text-center">
                      <p class="text-xs text-secondary mb-0">{{$viewAlls->weight}}</p>
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('atualizar-preco-e-tamanho', ['id' => $viewAlls->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Editar
                        </a>
                      </td>
                      <td class="align-middle">
                        <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <form action="{{ route('produtos.destroy', $viewAlls->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Deletar</button>
                        </form>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="align-buttons" style="display:flex;justify-content:flex-end;align-items:flex-end;margin-right:40px;">
                    {{$viewAll->links()}}
                    <a href="{{ route('criar-precos-e-tamanhos') }}" class="btn bg-gradient-primary" style="margin-left:auto;">Adicionar produto</a>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>

@endsection