<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            $userId = auth()->id();
            $headerCartItems = DB::table('shopping_cart')
            ->join('products', 'shopping_cart.product_id', '=', 'products.id')
            ->join('price_and_size', 'shopping_cart.product_characteristics', '=', 'price_and_size.price')
            ->select('shopping_cart.product_id', 'shopping_cart.quantity', 'products.*', 'price_and_size.*')
            ->where('shopping_cart.user_id', $userId)
            ->get();
            $headerCartItems = $headerCartItems->unique(function($item) {
                return $item->product_id . '-' . $item->price;
            });
            $favoriteItems = DB::table('favorites')
            ->join('products', 'favorites.product_id', '=', 'products.id')
            ->select('products.*')
            ->where('favorites.user_id', $userId)
            ->get();
            $view->with([
                'headerCartItems' => $headerCartItems,
                'favoriteItems' => $favoriteItems,
            ]);
        });
    }
}
