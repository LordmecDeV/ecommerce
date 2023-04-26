<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PriceAndSize;
use App\Models\ShoppingCart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


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
            
}
