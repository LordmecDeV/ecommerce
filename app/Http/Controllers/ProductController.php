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
        // Carrossel Best Seller
        $bestSeller = DB::table('products')->where('carrousel', '1')->get();
        $bestSeller = $this->applyMinPriceLogic($bestSeller);

        // Carrossel Launch
        $launch = DB::table('products')->where('carrousel', '2')->get();
        $launch = $this->applyMinPriceLogic($launch);

        // Carrossel Highlight
        $highlight = DB::table('products')->where('carrousel', '3')->get();
        $highlight = $this->applyMinPriceLogic($highlight);

        // Carrossel Mosaic
        $mosaic = DB::table('products')->where('type_product', 'Mosaico')->get();
        $mosaic = $this->applyMinPriceLogic($mosaic);

        // Carrossel Lighting
        $lighting = DB::table('products')->where('type_product', 'Luminaria')->get();
        $lighting = $this->applyMinPriceLogic($lighting);

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

        return view('clientViews.home', compact(
            'bestSeller',
            'launch',
            'highlight',
            'mosaic',
            'lighting',
            'mainImageCarousel',
            'imageCarousel2',
            'imageCarousel3'
        ));
    }

    private function applyMinPriceLogic($products)
    {
        foreach ($products as $product) {
            $typeProduct = $product->type_product;
            $minPrice = DB::table('price_and_size')->where('type_product', 'like', $typeProduct.'%')->min('price');
            $product->price = $minPrice;
        }

        return $products;
    }

    public function showProductClient($id)
    {
        $viewProduct = Product::find($id);
        $bestSeller = DB::table('products')->where('carrousel', '1')->get();
        $bestSeller = $this->applyMinPriceLogic($bestSeller);
        $isFavorite = Favorite::where('user_id', auth()->id())
            ->where('product_id', $viewProduct->id)
            ->exists();

        $typeProduct = $viewProduct->type_product;
        $minPrice = DB::table('price_and_size')->where('type_product', 'like', $typeProduct.'%')->min('price');
        $viewProduct->price = $minPrice;

        $getPriceThreePlates = DB::table('price_and_size')->where('type_product', 'Mosaico - 3 Placas')->get();
        $getPriceThreeStraightPlates = DB::table('price_and_size')->where('type_product', 'Mosaico - 3 Placas Reto')->get();
        $getPriceFivePlates = DB::table('price_and_size')->where('type_product', 'Mosaico - 5 Placas')->get();
        $getSmallFrame = DB::table('price_and_size')->where('type_product', 'Quadro - 30x55')->value('price');
        $getMidFrame = DB::table('price_and_size')->where('type_product', 'Quadro - 40x66')->value('price');
        $getBigFrame = DB::table('price_and_size')->where('type_product', 'Quadro - 55x92')->value('price');

        return view('clientViews.showProductClient', compact(
            'viewProduct',
            'bestSeller',
            'getPriceThreePlates',
            'getPriceThreeStraightPlates',
            'getPriceFivePlates',
            'getSmallFrame',
            'getMidFrame',
            'getBigFrame',
            'isFavorite'
        ));
    }


    public function categoryLighting()
    {
        $viewLighting = DB::table('products')->where('type_product', 'Luminaria')->latest()->paginate(16);
        $viewLighting = $this->applyMinPriceLogic($viewLighting);
        return view('clientViews.categoryProduct.categoryProductLuminaria', compact('viewLighting'));
    }

    public function categoryMosaic()
    {
        $viewMosaic = DB::table('products')->where('type_product', 'Mosaico')->latest()->paginate(16);
        $viewMosaic = $this->applyMinPriceLogic($viewMosaic);
        return view('clientViews.categoryProduct.categoryProductMosaico', compact('viewMosaic'));
    }

    public function categoryFrame()
    {
        $viewFrame = DB::table('products')->where('type_product', 'Quadro')->latest()->paginate(16);
        $viewFrame = $this->applyMinPriceLogic($viewFrame);
        return view('clientViews.categoryProduct.categoryProductQuadro', compact('viewFrame'));
    }

    public function categoryBestSeller()
    {
        $bestSeller = DB::table('products')->where('carrousel', '1')->latest()->paginate(16);
        $bestSeller = $this->applyMinPriceLogic($bestSeller);
        return view('clientViews.categoryProduct.categoryProductMaisVendidos', compact('bestSeller'));
    }

    public function categoryLaunch()
    {
        $launch = DB::table('products')->where('carrousel', '2')->latest()->paginate(16);
        $launch = $this->applyMinPriceLogic($launch);
        return view('clientViews.categoryProduct.categoryProductLancamentos', compact('launch'));
    }

    public function categoryHighlight()
    {
        $highlight = DB::table('products')->where('carrousel', '3')->latest()->paginate(16);
        $highlight = $this->applyMinPriceLogic($highlight);
        return view('clientViews.categoryProduct.categoryProductDestaques', compact('highlight'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $todosProdutos = Product::where('id', $search)
                            ->orWhere('name', 'like', '%'.$search.'%')
                            ->get();

        // Faça algo com os resultados da pesquisa (exibição na view, redirecionamento, etc.)

        // Retorne uma view com os resultados da pesquisa
        return view('searchResult', compact('todosProdutos'));
    }
    
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
