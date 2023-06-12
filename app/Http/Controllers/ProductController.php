<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;
use App\Models\PriceAndSize;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $todosProdutos = Product::latest()->paginate(10);
            return view('allProducts', compact('todosProdutos'));
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }

    public function dashboard()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('dashboard');
        } else {
            return abort(403, 'Acesso não autorizado.');
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // criação do produto
    public function store(Request $request)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $validatedData = $request->validate([
                'sku' => 'required|unique:products,sku',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'status' => 'required',
                'tag' => 'nullable',
                'type_product' => 'required',
                'carrousel' => 'nullable',
                'image_product_1' => 'nullable',
                'image_product_2' => 'nullable',
                'image_product_3' => 'nullable',
                'image_product_4' => 'nullable',
                'image_product_5' => 'nullable',
                'image_product_6' => 'nullable',
                'image_product_7' => 'nullable',
                'image_product_8' => 'nullable',
                'image_product_9' => 'nullable',
                'image_product_10' => 'nullable',
            ],
            [
                'sku.required' => 'O campo SKU é obrigatório.',
                'sku.unique' => 'SKU já existe.',
                'name.required' => 'O campo Nome é obrigatório.',
                'description.required' => 'O campo Descrição é obrigatório.',
                'price.required' => 'O campo Preço é obrigatório.',
                'status.required' => 'O campo Status é obrigatório.',
                'type_product.required' => 'O campo Tipo de Produto é obrigatório.',
            ]);
               Product::create($validatedData);
               return redirect('/todosProdutos');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }

    public function create()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('laravel-examples/user-profile');
        } else {
            return abort(403, 'Acesso não autorizado.');
        } 
    }

    public function homePage()
    {   
        $bestSeller = DB::table('products')->where('carrousel', '1')->get();
        $launch = DB::table('products')->where('carrousel', '2')->get();
        $highlight = DB::table('products')->where('carrousel', '3')->get();
        $mosaic = DB::table('products')->where('type_product', 'Mosaico')->get();
        $lighting = DB::table('products')->where('type_product', 'Luminaria')->get();
        //imagens do carousel
        $mainImageCarousel = DB::table('manage_content')
                                ->where('image_carousel', 'Imagem principal do carousel')
                                ->value('link_image_carousel');
        $imageCarousel2 = DB::table('manage_content')
                                ->where('image_carousel', 'Imagem 2')
                                ->value('link_image_carousel');
        $imageCarousel3 = DB::table('manage_content')
                                ->where('image_carousel', 'Imagem 3')
                                ->value('link_image_carousel');
        return view('clientViews.home', compact('bestSeller', 'launch', 'highlight', 'mosaic', 'lighting', 'mainImageCarousel', 'imageCarousel2', 'imageCarousel3'));
    }

    public function showProductClient($id)
    {
        $viewProduct = Product::find($id);
        $bestSeller = DB::table('products')->where('carrousel', '1')->get();
        $getPriceThreePlates = DB::table('price_and_size')->where('type_product', 'Mosaico - 3 Placas')->get();
        $getPriceThreeStraightPlates = DB::table('price_and_size')->where('type_product', 'Mosaico - 3 Placas Reto')->get();
        $getPriceFivePlates = DB::table('price_and_size')->where('type_product', 'Mosaico - 5 Placas')->get();
        $getSmallFrame = DB::table('price_and_size')->where('type_product', 'Quadro - 30x55')->value('price');
        $getMidFrame = DB::table('price_and_size')->where('type_product', 'Quadro - 40x66')->value('price');
        $getBigFrame = DB::table('price_and_size')->where('type_product', 'Quadro - 55x92')->value('price');
        $isFavorite = Favorite::where('user_id', auth()->id())
            ->where('product_id', $viewProduct->id)
            ->exists();
        return view('clientViews.showProductClient', compact('viewProduct', 'bestSeller', 'getPriceThreePlates','getPriceThreeStraightPlates','getPriceFivePlates', 'getSmallFrame', 'getMidFrame', 'getBigFrame', 'isFavorite'));
    }

    public function categoryLighting()
    {
        $viewLighting = DB::table('products')->where('type_product', 'Luminaria')->latest()->paginate(16);
        return view('clientViews.categoryProduct.categoryProductLuminaria', compact('viewLighting'));
    }

    public function categoryMosaic()
    {
        $viewMosaic = DB::table('products')->where('type_product', 'Mosaico')->latest()->paginate(16);
        return view('clientViews.categoryProduct.categoryProductMosaico', compact('viewMosaic'));
    }

    public function categoryFrame()
    {
        $viewFrame = DB::table('products')->where('type_product', 'Quadro')->latest()->paginate(16);
        return view('clientViews.categoryProduct.categoryProductQuadro', compact('viewFrame'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $viewProduct = Product::find($id);
            $viewImage = json_decode($viewProduct->image_product);
            $viewImageDescription = json_decode($viewProduct->image_description);
        return view('showProduct', compact('viewProduct', 'viewImageDescription', 'viewImage'));
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $updateProduct = $request->all();
            $product = Product::find($id);
            $product->update($updateProduct);
            return redirect('/todosProdutos');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
