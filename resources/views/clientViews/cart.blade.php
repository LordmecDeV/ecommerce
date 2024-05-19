@extends('layouts.headerClient.header')
@section('content')
<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0"> <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16"><path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg> Carrinho</h5>
          </div>
          <div class="card-body">
          @if(!empty($message))
          <div class="alert alert-danger">
            {{ $message }}
          </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif
            @foreach($cartItems as $item)
            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                <img src="{{$item->image_product_1}}"class="w-100" alt="Blue Jeans Jacket" />
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </div>
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong>{{$item->name}}</strong></p>
                <p>SKU: {{$item->sku}}</p>
                <p>Modelo: {{$item->type_product}}</p>
                <div class="d-flex align-items-center">
                <form class="" method="POST" action="{{ route('excluir-item-do-carrinho') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                <button type="submit" class="btn btn-primary btn-sm me-1 mb-2" title="Remove item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg> 
                </button>
                </form>
                <!-- Data -->
                </div>
              </div>
          
              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">
                  
                  <div class="form-outline">
                    
                    
                  </div>

                  
                </div>
                <!-- Quantity -->

                <!-- Price -->
                <p class="text-start text-md-center">
                  <strong>Preço: R${{$item->price}}</strong>
                </p>
                <!-- Price -->
              </div>
            </div>
            <!-- Single item -->

            <hr class="my-4" />
            @endforeach
           
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
          <h5 class="mb-0"> <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16"><path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg> Calcule o frete: </h5>
          <div class="container px-4 text-left">
            <div class="row gx-5 ">

              <div class="col">
                <div class="p-3 ">
                  <ul class="">
                    <li class="list-group-item fw-bold">Cidade: {{$city}}</li>
                    <li class="list-group-item fw-bold">CEP: {{$cep}}</li>
                    <li class="list-group-item fw-bold">Endereço: {{$location}}</li>
                    <li class="list-group-item fw-bold">Número: {{$number}}</li>
                  </ul>
                </div>
              </div>

              <div class="col">
                <div class="p-5">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Alterar endereço
                  </button>
                </div>
              </div>
                </div>
              </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Selecione o serviço desejado</th>
                        <th scope="col">Tipo de serviço</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Entrega em até</th>
                        <th scope="col">Transportadora</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($quotations as $transporterName => $freightDetails)
                      <tr>
                        <td><input type="checkbox" class="form-check-input frete-checkbox" id="checkbox-{{ strtolower($transporterName) }}" data-frete="{{ $freightDetails['totalFrete'] }}"></td>
                        <th scope="row"><h6 class="fw-bold">{{ $transporterName }}</h5></th>
                        <td><p class="fw-bold fontCalculateFrete">R$ {{ $freightDetails['totalFrete'] }}</p></td>
                        <td><h5 class="fw-bold">{{ $freightDetails['deliveryTime'] }}</h5></td>
                        <td>
                          @if ($transporterName === 'SEDEX')
                            <img src="https://logodownload.org/wp-content/uploads/2017/03/sedex-logo-5.png" height="150" width="150" class="img-fluid" alt="Company Logo">
                          @elseif ($transporterName === 'PAC')
                            <img src="https://www.geralferramentas.com.br/pub/media/catalog/product/cache/ebd33fa67d0860d79e515ee268e8835d/p/a/pac2270.png" height="150" width="150" class="img-fluid" alt="Company Logo">
                          @elseif ($transporterName === '.Package')
                            <img src="https://cdn.cookielaw.org/logos/ca573dc2-6848-4d5d-811b-a73af38af8db/351dcc81-561f-44be-ad95-966e6f1bb905/f0416ebe-67db-4d95-aee0-56e49a2678f4/logo_jadlog.png" height="150" width="150" class="img-fluid" alt="Company Logo">
                          @elseif ($transporterName === '.Com')
                            <img src="https://cdn.cookielaw.org/logos/ca573dc2-6848-4d5d-811b-a73af38af8db/351dcc81-561f-44be-ad95-966e6f1bb905/f0416ebe-67db-4d95-aee0-56e49a2678f4/logo_jadlog.png" height="150" width="150" class="img-fluid" alt="Company Logo">  
                          @else
                            <img src="URL_DA_IMAGEM_PADRAO" height="150" width="150" class="img-fluid" alt="Company Logo">
                          @endif
                          </td>
                      </tr>
                    @endforeach 
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body">
            <p><strong>Nós aceitamos:</strong></p>
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
              alt="Visa" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
              alt="American Express" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
              alt="Mastercard" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp"
              alt="PayPal acceptance mark" />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Resumo</h5>
          </div>
          <div class="card-body">
          <div id="cupom-message" class="alert alert-success" style="display: none;"></div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Produtos
                <span id="valor-produtos">R${{$totalPriceCart}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Frete
                <span id="frete-valor">R$ 0.00</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total</strong>
                </div>
                <span id="valor-total">R$ 0.00</span>
              </li>
            </ul>
            <form id="cupom-form" method="POST" action="/aplicar-cupom">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">CUPOM</span>
                    <input type="text" class="form-control input-group-lg" name="cupom" id="cupom-input" placeholder="Aplicar desconto" aria-label="" aria-describedby="basic-addon1">
                    <button class="btn btn-primary" id="aplicar-cupom" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27-1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287+.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                        </svg>
                    </button>
                </div>
            </form>
            <button type="button" class="btn btn-primary btn-lg btn-block">
              Finalizar compra
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="container-fluid bg-white"><!-- inicio do footer -->
    </div><!-- final do footer -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Alterar endereço de entrega</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="{{ route('atualizarEndereco') }}" method="post"> 
            @csrf
            @method('PUT')
             <div class="col-sm">
              <label for="" class="form-label">CEP:</label>
              <input type="text" class="form-control rounded-5" name="cep"  value="{{$cep}}" id="cep" placeholder="04867098" required>
              </div>

            <div class="col-sm">
              <label for="lastName" class="form-label">Endereço:</label>
              <input type="text" class="form-control" id="logradouro"  value="{{$location}}" placeholder="85626673407" name="location" required>
            </div>

            <div class="col-sm">
              <label for="lastName" class="form-label">Número:</label>
              <input type="text" class="form-control" value="{{$number}}" id="numero" name="number" required>
            </div>

            <div class="col-sm">
              <label for="username" class="form-label">Referência:</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="referencia" name="reference" required>
              </div>
            </div>

            <div class="col-sm">
              <label for="" class="form-label">Complemento:</label>
              <input type="text" class="form-control" id="complemento" name="complement" required>
            </div>

            <div class="col-sm">
              <label for="lastName" class="form-label">Bairro:</label>
              <input type="text" class="form-control" id="bairro"  name="neighborhood" required>
            </div>

            <div class="col-sm">
              <label for="lastName" class="form-label">Cidade:</label>
              <input type="text" class="form-control" id="cidade" placeholder="São Paulo" name="city" required>
            </div>

            <div class="col-sm">
              <label for="lastName" class="form-label">Estado:</label>
              <input type="text" class="form-control" id="estado" placeholder="São Paulo" name="state" required>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Calcular</button>
          </div>
          </form>
        </div>
      </div>
    </div>

<script>
const cepInput = document.querySelector('#cep');
cepInput.addEventListener('blur', handleCepBlur);

async function handleCepBlur() {
    const cep = cepInput.value.replace(/\D/g, '');
    const url = `https://viacep.com.br/ws/${cep}/json/`;

    try {
        const response = await fetch(url);
        const data = await response.json();

        document.querySelector('#logradouro').value = data.logradouro;
        document.querySelector('#bairro').value = data.bairro;
        document.querySelector('#cidade').value = data.localidade;
        document.querySelector('#estado').value = data.uf;
    } catch (error) {
        console.error(error);
    }
}
$(document).ready(function() {
    // Inicialmente, nenhum checkbox está selecionado
    let selectedFrete = 0;

    // Manipule a seleção de checkbox
    $('.frete-checkbox').change(function() {
        // Desmarque todos os outros checkboxes
        $('.frete-checkbox').not(this).prop('checked', false);

        // Atualize o valor do frete com base no checkbox selecionado
        selectedFrete = parseFloat($(this).data('frete').replace(',', '.'));
        updateFreteValue(selectedFrete);
    });

    // Função para atualizar o valor do frete na página
    function updateFreteValue(value) {
        $('#frete-valor').text('R$ ' + value.toFixed(2));
    }
});
$(document).ready(function() {
    // Inicialmente, nenhum checkbox está selecionado
    let selectedFrete = 0;
    let totalProdutos = parseFloat("{{ $totalPriceCart }}");

    // Função para atualizar o valor total na página
    function atualizarValorTotal() {
        // Calcula o valor total somando o valor dos produtos e o valor do frete selecionado
        let valorTotal = totalProdutos + selectedFrete;

        // Atualiza os elementos HTML com os valores calculados
        $('#frete-valor').text('R$ ' + selectedFrete.toFixed(2));
        $('#valor-total').text('R$ ' + valorTotal.toFixed(2));
        // Verifique se algum frete foi selecionado
        if ($('.frete-checkbox:checked').length > 0) {
            $('#aplicar-cupom').prop('disabled', false); // Habilita o botão
        } else {
            $('#aplicar-cupom').prop('disabled', true); // Desabilita o botão
        }
    }

    // Manipule a seleção de checkbox
    $('.frete-checkbox').change(function() {
        // Desmarque todos os outros checkboxes
        $('.frete-checkbox').not(this).prop('checked', false);

        // Atualize o valor do frete com base no checkbox selecionado
        selectedFrete = parseFloat($(this).data('frete').replace(',', '.'));
        atualizarValorTotal();
    });

    // Chame a função de cálculo inicial
    atualizarValorTotal();
});

$(document).ready(function() {
    $('#aplicar-cupom').click(function() {
        event.preventDefault(); // Verifique se esta mensagem aparece no console.
        const cupom = $('#cupom-input').val();

        $.ajax({
            url: '/aplicar-cupom',
            method: 'POST',
            data: {
                cupom: cupom,
                _token: $('#cupom-form input[name="_token"]').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    const desconto = parseFloat(response.desconto);

                    // Pega o valor atual do campo #valor-total
                    const valorTotal = parseFloat($('#valor-total').text().replace('R$ ', ''));

                    // Calcula o novo valor total com o desconto aplicado
                    const novoValorTotal = valorTotal - desconto;

                    // Atualiza o campo #valor-total
                    $('#valor-total').text('R$ ' + novoValorTotal.toFixed(2));
                    // Exibe a mensagem de sucesso
                    $('#cupom-message').text('Cupom aplicado com sucesso, no valor de: R$ ' + desconto.toFixed(2));
                    $('#cupom-message').removeClass('alert-danger').addClass('alert-success').show();
                    // Desabilita o botão após aplicar o cupom
                    $('#aplicar-cupom').prop('disabled', true);
                } else {
                    // Cupom inválido
                    $('#cupom-message').text('Cupom inválido').removeClass('alert-success').addClass('alert-danger').show();
                }
            },
            error: function() {
                // Trate os erros, se necessário
            }
        });
    });
});

</script>
@endsection