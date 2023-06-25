<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MelhorEnvio\Resources\Shipment\Product as MelhorEnvioProduct;
use App\Models\Product;
use App\Models\PriceAndSize;
use App\Models\ShoppingCart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use MelhorEnvio\Shipment;
use MelhorEnvio\Resources\Shipment\Package;
use MelhorEnvio\Enums\Service;
use MelhorEnvio\Enums\Environment;


class ShoppingCartController extends Controller
{
    public function createProductInCart(Request $request)
    {
        $addInCart = $request->all();
        // Verifica se o campo 'characteristics' existe no request
        if (isset($addInCart['characteristics'])) {
            // Converte o valor do campo 'characteristics' para JSON antes de salvar
            $addInCart['characteristics'] = json_encode($addInCart['product_characteristics']);
        }
        ShoppingCart::create($addInCart);
        return redirect('/carrinho');
    }


        public function cartView()
    {
        $userId = auth()->id();
        $cartItems = DB::table('shopping_cart')
                        ->join('products', 'shopping_cart.product_id', '=', 'products.id')
                        ->join('price_and_size', 'shopping_cart.product_characteristics', '=', 'price_and_size.price')
                        ->select('shopping_cart.product_id', 'shopping_cart.quantity', 'products.*', 'price_and_size.*')
                        ->where('shopping_cart.user_id', $userId)
                        ->get();

        $cartItems = $cartItems->unique(function($item) {
            return $item->product_id . '-' . $item->price;
        });

        $quotations = $this->calculateFrete($cartItems); // calcular o frete para os itens no carrinho
        $totalSedexFrete = $this->calculateTotalFreight($quotations, 'SEDEX');
        $totalPacFrete = $this->calculateTotalFreight($quotations, 'PAC');
        $user = auth()->user();
        $cep = $user->cep;
        $location = $user->location;
        $city = $user->city;  
        $number = $user->number;     
        $message = $this->checkCartIsEmpty($userId);  //verifica se o carrinho esta vazio
        $totalPriceCart = $this->getTotalCartValue($userId); //calcula o total de itens adicionados no carrinho pelo usuário logado e retorna o valor em uma variável
        
        return view('clientViews.cart', compact('cartItems', 'quotations', 'message', 'totalPriceCart', 'totalPacFrete', 'totalSedexFrete', 'cep', 'location', 'city', 'number'));
    }

    public function calculateTotalFreight($quotations, $transportadora)
    {
        $totalFrete = 0;
        $deliveryTime = 0;
        $companyName = '';
        $companyImage = '';

        foreach ($quotations as $quotation) {
            foreach ($quotation as $item) {
                if (isset($item['name']) && $item['name'] === $transportadora) {
                    if (isset($item['packages'])) {
                        $packages = $item['packages'];
                        foreach ($packages as $package) {
                            if (isset($package['price'])) {
                                $totalFrete += (float) $package['price'];
                            }
                        }
                    }
                    $deliveryTime = $item['delivery_time'];
                    $companyName = $item['name'];
                    if (isset($item['company']['picture'])) {
                        $companyImage = $item['company']['picture'];
                    }
                }
            }
        }

        // Formata o valor de totalFrete substituindo o ponto por vírgula
        $totalFrete = number_format($totalFrete, 2, ',', '.');

        return [
            'totalFrete' => $totalFrete,
            'deliveryTime' => $deliveryTime,
            'companyName' => $companyName,
            'companyImage' => $companyImage,
        ];
    }



    public function checkCartIsEmpty($userId)
    {
        $cartItems = DB::table('shopping_cart')
                    ->where('user_id', $userId)
                    ->exists();

        if (!$cartItems) {
            return 'Seu carrinho está vazio!';
        }
        return '';
    }

    public function getTotalCartValue($userId) 
    {
        $total = DB::table('shopping_cart')
                    ->where('user_id', $userId)
                    ->sum('product_characteristics');
        return $total;
    }

    public function destroy(Request $request)
    {
        $userId = auth()->id();
        $productId = $request->product_id;
        $cartItem = ShoppingCart::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();
        if (!$cartItem) 
        {
            return back()->with('error', 'Item não encontrado no carrinho.');
        }
        $cartItem->delete();
        return back()->with('success', 'Item removido do carrinho com sucesso.');
    }

    public function calculateFrete($cartItems)
    {
        $shipment = new Shipment('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImYwODJmMjkzMjFlNGU3NmUxZjBjNmZiOTk1NGU3ODZmYTVmMzYzZDhmY2FjNDJhN2YwZGEzMDQ3NDEyNWJmYjMxMGI2NzcxYTBiNDljNmE5In0.eyJhdWQiOiIxIiwianRpIjoiZjA4MmYyOTMyMWU0ZTc2ZTFmMGM2ZmI5OTU0ZTc4NmZhNWYzNjNkOGZjYWM0MmE3ZjBkYTMwNDc0MTI1YmZiMzEwYjY3NzFhMGI0OWM2YTkiLCJpYXQiOjE2ODczMTI3NzgsIm5iZiI6MTY4NzMxMjc3OCwiZXhwIjoxNzE4OTM1MTc4LCJzdWIiOiJiNTA3ZDlhZi1iNDJiLTQzMDgtYjBhOC1lYWU0MzBiNDM2ODEiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSIsIndlYmhvb2tzLXVwZGF0ZSIsIndlYmhvb2tzLWRlbGV0ZSIsInRkZWFsZXItd2ViaG9vayJdfQ.ZfQCk-Met9uym8a2TR4xRnz5ehzpeOlIN1Z5j3lHTc0QcYXB7Sidi5ov9C8fKdZrialEIwhlHbz1rztPuxWZF6dEvjnyNbAlecHXTTRT2PCWOwca0mvEmDpRAR2GIfG_Hb8kCSvtO6N3eiLtarHbmpJQnLOszue3r9u6GGs9Y3NWzksNp0wAddBCMisfoqtU8zjJ4HLNmIth-R4nb-9bAnzuO7GE4gh61L1i2ucNafGmzFbjthSBWQBi1IuwjSzIUZYo7IIitbf7Y5XJU7RtfLWSDLU8ZXVjLsp2fSh2llq6nUio3neD70OIIlu_HABV_RETQCfTVreJJtGBgL-PBHmOwyJMQeDzw_WUcLwSKstiOb3WQrzmtykBMJ3WJvFllIfdoiIiAioWbzkaIMemeXxw3NOzMNBFQOgkDDcyLNaVLBGU3F3DFbsWkvLLDS-J0xPj0hxe_STGa-iXAgTIm241ECWrgTE1ohz9skrsUhyIrtyD0zK3fI4d7hLrWYlgUMDtRPoOSWpgEZ3RW2RznZeyNYaAa2hvwLsY6lKOwziiXUvnNDLyowmyn2l42JhQslWR2OFk7IyqL_655Kd38Dnq8jEsPdrYUIUdvze7sQQ7HZ1usbu2H27Ue79sPVt3l2jkdmkqlyGUNHcuTEpWgrxRxEw5bU6b_-MuQJrZaMs', Environment::PRODUCTION);
        $calculator = $shipment->calculator();

        $quotations = [];
        $user = auth()->user();
        $cep = $user->cep;
        $cep_format = str_replace(['-', ' '], '', $cep);
        if (empty($cep_format)) {
            return []; // Retorna um array vazio em caso de CEP inválido.
        }
        // dd($cep_format);
        // Calcular o frete de cada produto individualmente
        foreach ($cartItems as $item) {
            $calculator = $shipment->calculator();
            $calculator->postalCode('04865065', $cep_format);
            $melhorEnvioProduct = new MelhorEnvioProduct(
                $item->height,
                $item->width,
                $item->length,
                $item->weight,
                '1',
                '1'
            );
            $calculator->addProducts($melhorEnvioProduct);
            $calculator->addServices(
                Service::CORREIOS_PAC, 
                Service::CORREIOS_SEDEX,
                Service::CORREIOS_MINI,
                Service::JADLOG_PACKAGE, 
                Service::JADLOG_COM, 
                Service::AZULCARGO_AMANHA,
                Service::AZULCARGO_ECOMMERCE,
                Service::LATAMCARGO_JUNTOS,
                Service::VIABRASIL_RODOVIARIO
            );    
            $calculator->setOwnHand(); // mão própria
            $calculator->setReceipt(); // aviso de recebimento
            $calculator->setCollect(); // coleta
            $quotations[] = $calculator->calculate();
            //dd($quotations);
        }
         return $quotations;
        // Somar os valores de frete de cada produto individualmente para obter o frete total
        
    }

    public function updateAddress(Request $request)
    {
        // Valide os campos de entrada, se necessário
        $validatedData = $request->validate([
            'cep' => 'required',
            'location' => 'required',
            'number' => 'required',
            'reference' => 'required',
            'complement' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);

        // Recupere o usuário autenticado
        $user = auth()->user();

        // Atualize as informações de endereço do usuário
        $user->cep = $request->cep;
        $user->location = $request->location;
        $user->number = $request->number;
        $user->reference = $request->reference;
        $user->complement = $request->complement;
        $user->neighborhood = $request->neighborhood;
        $user->city = $request->city;
        $user->state = $request->state;

        // Salve as alterações no banco de dados
        $user->save();

        // Retorne uma resposta de sucesso ou redirecione para a página desejada
        return redirect()->back()->with('success', 'Endereço atualizado com sucesso.');
    }
            
}
