<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\PriceAndSize;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use MelhorEnvio\Enums\Environment;
use MelhorEnvio\Enums\Service;
use MelhorEnvio\Resources\Shipment\Package;
use MelhorEnvio\Resources\Shipment\Product as MelhorEnvioProduct;
use MelhorEnvio\Shipment;

class ShoppingCartController extends Controller
{
    public function createProductInCart(Request $request)
    {
        $addInCart = $request->all();
        // Verifica se o campo 'characteristics' existe no request
        if (isset($addInCart['characteristics'])) {
            // Converte o valor do campo 'characteristics' para JSON antes de salvar
            $addInCart['characteristics'] = json_encode($addInCart['characteristics']);
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

        $cartItems = $cartItems->unique(function ($item) {
            return $item->product_id . '-' . $item->price;
        });
        $quotations = $this->calculateFrete($cartItems); // calcular o frete para os itens no carrinho
        $user = auth()->user();
        $cep = $user->cep;
        $location = $user->location;
        $city = $user->city;
        $number = $user->number;
        $message = $this->checkCartIsEmpty($userId);  //verifica se o carrinho esta vazio
        $totalPriceCart = $this->getTotalCartValue($userId); //calcula o total de itens adicionados no carrinho pelo usuário logado e retorna o valor em uma variável

        return view(
            'clientViews.cart',
            compact(
                'cartItems',
                'quotations',
                'message',
                'totalPriceCart',
                'cep',
                'location',
                'city',
                'number'
            )
        );
    }

    public function checkCartIsEmpty($userId)
    {
        $cartItems = DB::table('shopping_cart')
                    ->where('user_id', $userId)
                    ->exists();

        if (! $cartItems) {
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
        if (! $cartItem) {
            return back()->with('error', 'Item não encontrado no carrinho.');
        }
        $cartItem->delete();

        return back()->with('success', 'Item removido do carrinho com sucesso.');
    }

    private function calculateTotalFreightForTransporter(array $quotations, string $transporterName)
    {
        $totalFrete = 0;
        $deliveryTime = 0;

        foreach ($quotations as $quotation) {
            foreach ($quotation as $item) {
                if (isset($item['name']) && $item['name'] === $transporterName) {
                    if (isset($item['packages'])) {
                        $packages = $item['packages'];
                        foreach ($packages as $package) {
                            if (isset($package['price'])) {
                                $totalFrete += (float)$package['price'];
                            } else {
                                if (isset($item['price'])) {
                                    $totalFrete += (float)$item['price'];
                                }
                            }
                        }
                    } elseif (isset($item['price'])) {
                        $totalFrete += (float)$item['price'];
                    }

                    if (isset($item['delivery_time'])) {
                        $deliveryTime = $item['delivery_time'];
                    }
                }
            }
        }

        // Formata o valor de totalFrete substituindo o ponto por vírgula
        $totalFrete = number_format($totalFrete, 2, ',', '.');

        return [
            'totalFrete' => $totalFrete,
            'deliveryTime' => $deliveryTime,
        ];
    }

    public function calculateFrete($cartItems)
    {
        $shipment = new Shipment('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcyMWFiNzI4ZmFmMWQ1ODEzZGYxNGI5Njc5YWQ5MjI2OTk0NTMyNDc1YWMxM2I3MTk0MTBjMTBmNTc4OGE0ZjRjYjFjMjFkOWY1ZTRmNGYwIn0.eyJhdWQiOiIxIiwianRpIjoiNzIxYWI3MjhmYWYxZDU4MTNkZjE0Yjk2NzlhZDkyMjY5OTQ1MzI0NzVhYzEzYjcxOTQxMGMxMGY1Nzg4YTRmNGNiMWMyMWQ5ZjVlNGY0ZjAiLCJpYXQiOjE2ODk1MjUzNTEsIm5iZiI6MTY4OTUyNTM1MSwiZXhwIjoxNzIxMTQ3NzUxLCJzdWIiOiJiNTA3ZDlhZi1iNDJiLTQzMDgtYjBhOC1lYWU0MzBiNDM2ODEiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSIsIndlYmhvb2tzLXVwZGF0ZSIsIndlYmhvb2tzLWRlbGV0ZSIsInRkZWFsZXItd2ViaG9vayJdfQ.KB9VbBDhrjTDBI3usrCW7r-E9uqQD4CpJN2OkFrqglvYmbbHEih9TDock_xmqti7CsqDZmFNSK_wyax5s_1rwg_6PfQXV9m8uj3b7wtd2d5zEEQFAgw_TuNpXZRgfynGsXnH5PT-1C-sgSXBWoDKP6r8_L7YDn3iiRdxHOEHh70ikdwjJYPmx_iCB45MLnmkYEQfkFdUQaHqOMZq1CYoP-umwPfdBDfYpmnelVqGnUSnBq1w_bN51XNfzDDa62AbJGfrdJ5u65NUyLw1uqx12_6pFu1pXb8B2_0SFVnu4eOFdnv9phFHjthsXSvxqVhUzVIVjlijZIRpo_f1lBPrSYgtf1IaM9d1bXfuMtZT-Z2u6UdjuGryC8DZauhJB5jBYOLpHNcQZiv44OPQfZ6HolfmvxSCSJI8eTI-1tvB9U3QCnYnUkUp5iVOZgG2zaavhs94UNqRkeC1-X2V4l9n0T0uTj9JSb3PgEQVQ6ZkPqaL6Rg2TG5Os-22WvMfQxpKRZgmFg37RZ1p__1IuR211XogRv1BXR3LMmEs7wXUDN-8YIVJSmvvNUFPFd8Ph0yuz_mdP_0oHYzu7PomKkBp2T7C-Z78E8OrorSCQnQMEhqj5yps26vQRUCStRMsI6hDQp7HDqKqhv6ZbRiqMIR9yHmpjGY1KvQ2LvXKq1iKKwo', Environment::PRODUCTION);
        $calculator = $shipment->calculator();

        $quotations = [];
        $user = auth()->user();
        $cep = $user->cep;
        $cep_format = str_replace(['-', ' '], '', $cep);
        if (empty($cep_format)) {
            return []; // Retorna um array vazio em caso de CEP inválido.
        }
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
        }
        // Calcular o frete total para cada transportadora desejada
        $desiredTransporters = ['SEDEX', '.Package', '.Com']; // Adicione outras transportadoras conforme necessário
        $totalFreights = [];

        foreach ($desiredTransporters as $transporter) {
            $totalFreights[$transporter] = $this->calculateTotalFreightForTransporter($quotations, $transporter);
        }

        return $totalFreights;
    }

    public function applyCupon(Request $request)
    {
        $cupomName = $request->input('cupom');
        $cupom = Cupon::where('cupom_name', $cupomName)->first();
        if ($cupom) {
            // Cupom válido, retorne o valor do desconto
            return response()->json(['success' => true, 'desconto' => $cupom->value]);
        }

        // Cupom inválido
        return response()->json(['success' => false]);
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
