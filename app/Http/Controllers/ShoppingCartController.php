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
        //  dd($addInCart);
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
        $message = $this->checkCartIsEmpty($userId);  //verifica se o carrinho esta vazio
        $totalPriceCart = $this->getTotalCartValue($userId); //calcula o total de itens adicionados no carrinho pelo usuario logado e retorna o valor em uma variavel 
        return view('clientViews.cart', compact('cartItems', 'message', 'totalPriceCart'));
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

    public function calculateFrete()
    {
        $shipment = new Shipment('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjE1NzMzMWU0MWIxMWVmNzhiOWM0M2YwNTk5OWE4NWNiNGRmZWE3ZTI0YjBkNzE0M2I0MzcwNmZhNzBmOWQ3MGQyZTI0NDQ3MzlmNGQwNjU2In0.eyJhdWQiOiI5NTYiLCJqdGkiOiIxNTczMzFlNDFiMTFlZjc4YjljNDNmMDU5OTlhODVjYjRkZmVhN2UyNGIwZDcxNDNiNDM3MDZmYTcwZjlkNzBkMmUyNDQ0NzM5ZjRkMDY1NiIsImlhdCI6MTY4Mjc0OTg0MywibmJmIjoxNjgyNzQ5ODQzLCJleHAiOjE3MTQzNzIyNDMsInN1YiI6IjEzY2M3MDdkLWIzYzMtNGFlNy1hYjFhLWVmNTgxMzE5NGFlZSIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIl19.P1_7d_qNmYLn-pvX8YlWcWtzlFKH-E9l7Xv_gL9qHYXPsWYxF_fxGE9arvWLluBTIaxfjI1CQ1HeVOGnL1tZY0Bnb2bFgg7_vZk1g3kIa35XuXjBQ16yLpimKHRbcSAmnw4gfhHwsdAK6YXamcygBrSgYG8oQJuF02SYcDf-SNTsOIgF39GoH5ZKZYoelIGFeKAPb8DfeUysPTBFPB41Fyf9C3BKA3T0uW-DmoMXrrpapFiJK_Tpy-PWyzzBzW2z7wSbeoBuW8tksu9Yp0wbf5tVMM1tYCpR8xrexSwJ_o0rFGb60jezYPgNm--Da6h-QVwKU4lmVsZAnpcioz0B-iOWGqqiPyyGhCOUeIedGik30SzpuDmjIVDlrLmHMTwJuWdUFK6nMDwdGqUSRdBmBaN3Qj3N_kIjCc0S9_A0a32UN5oPZlpr3jwvTU3LS5IrozzF0u-zJ5ky4E1kZCnmDaJWZnMDw1WoSLCQCdZqC8LoKTATlP4SdloeGKvMYxjdUc69cPjD_it3-d1o42fs60c-COCcS1Ne9XqqP95ejS2956ZcdSuoKyRJhNVoMf7yAFKdUorqL-2Ujf6REDt0MhxJ-EKLxd-xWUk_HTCzXLMGGdsBBjESgHiNuWZotyIHSZQhkBP3ue8a4QN8P16LJMsugWzHUT_q8F9O56Fz7Ls', Environment::SANDBOX);
        $calculator = $shipment->calculator();
        $calculator->postalCode('04865065', '04865080');
        $melhorEnvioProduct = new MelhorEnvioProduct(
            '40', 
            '2.0', 
            '50', 
            '10', 
            '2.0',
            '100.0',
            '1'
        );       
        $calculator->addProducts($melhorEnvioProduct);
        $calculator->addServices(
            Service::CORREIOS_PAC, 
            Service::CORREIOS_SEDEX,
            Service::JADLOG_PACKAGE, 
            Service::JADLOG_COM
            );    
        $calculator->setOwnHand(); // mão própria
        $calculator->setReceipt(); // aviso de recebimento
        $calculator->setCollect(); // coleta
        $quotations = $calculator->calculate();
        foreach ($quotations as $quotation) {
            echo "Transportadora: " . $quotation['name'] . "\n";
            echo "Preço: " . $quotation['price'] . "\n";
            echo "Prazo de entrega: " . $quotation['delivery_time'] . "\n";
            echo "-----------------------------------\n";
        }
    }
            
}
