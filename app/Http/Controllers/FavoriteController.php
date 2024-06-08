<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function createFavoriteProduct(Request $request)
    {
        $favoriteProduct = $request->all();
        Favorite::create($favoriteProduct);

        return redirect('/favoritos');
    }

    public function favoriteView()
    {
        $user_id = auth()->id();
        $favoriteItems = DB::table('favorites')
            ->join('products', 'favorites.product_id', '=', 'products.id')
            ->select('products.*')
            ->where('favorites.user_id', $user_id)
            ->get();
        $message = $this->checkFavoriteIsEmpty($user_id);

        return view('clientViews.favorite', compact('favoriteItems', 'message'));
    }

    public function destroy(Request $request)
    {
        $userId = auth()->id();
        $productId = $request->product_id;
        $favoriteItem = Favorite::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();
        if (! $favoriteItem) {
            return back()->with('error', 'Item não encontrado nos favoritos.');
        }
        $favoriteItem->delete();

        return back()->with('success', 'Item removido dos favoritos com sucesso.');
    }

    public function checkFavoriteIsEmpty($userId)
    {
        $favoriteItem = DB::table('favorites')
                    ->where('user_id', $userId)
                    ->exists();

        if (! $favoriteItem) {
            return 'Seu carrinho está vazio!';
        }

        return '';
    }
}
