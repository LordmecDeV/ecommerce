<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;
use App\Models\PriceAndSize;
use App\Models\Cupon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use MelhorEnvio\Shipment;
use MelhorEnvio\Resources\Shipment\Package;
use MelhorEnvio\Enums\Service;
use MelhorEnvio\Enums\Environment;
use MelhorEnvio\Resources\Shipment\Product as MelhorEnvioProduct;


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

    public function allCupomView()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $viewAll = Cupon::latest()->paginate(10);
            return view('allCupons', compact('viewAll'));
        } else {
            return abort(403, 'Acesso não autorizado.');
        } 
    }

    public function createCupomView()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('cupom');
        } else {
            return abort(403, 'Acesso não autorizado.');
        } 
    }

    public function createCupom(Request $request)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
           $validatedData = $request->validate([
            'cupom_name' => 'required|unique:cupons,cupom_name',
            'type' => 'required',
            'value' => 'required',
        ],
        [
            'cupom_name.required' => 'O campo nome do cupom é obrigatório.',
            'type.required' => 'O campo tipo de cupom é obrigatório.',
            'value.required' => 'O campo valor é obrigatório.',
        ]);
        Cupon::create($validatedData);
        return redirect('/todos-cupons');
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
            $type_product = $product->type_product;
            $minPrice = DB::table('price_and_size')->where('type_product', 'like', $type_product.'%')->min('price');
            $formattedPrice = number_format($minPrice, 2, ',', '.');
            $product->price = $formattedPrice;
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

        $type_product = $viewProduct->type_product;
        $minPrice = DB::table('price_and_size')->where('type_product', 'like', $type_product.'%')->min('price');
        $formattedPrice = number_format($minPrice, 2, ',', '.');
        $viewProduct->price = $formattedPrice;

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

    public function calculateFrete(Request $request)
    {
        $shipment = new Shipment('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcyMWFiNzI4ZmFmMWQ1ODEzZGYxNGI5Njc5YWQ5MjI2OTk0NTMyNDc1YWMxM2I3MTk0MTBjMTBmNTc4OGE0ZjRjYjFjMjFkOWY1ZTRmNGYwIn0.eyJhdWQiOiIxIiwianRpIjoiNzIxYWI3MjhmYWYxZDU4MTNkZjE0Yjk2NzlhZDkyMjY5OTQ1MzI0NzVhYzEzYjcxOTQxMGMxMGY1Nzg4YTRmNGNiMWMyMWQ5ZjVlNGY0ZjAiLCJpYXQiOjE2ODk1MjUzNTEsIm5iZiI6MTY4OTUyNTM1MSwiZXhwIjoxNzIxMTQ3NzUxLCJzdWIiOiJiNTA3ZDlhZi1iNDJiLTQzMDgtYjBhOC1lYWU0MzBiNDM2ODEiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSIsIndlYmhvb2tzLXVwZGF0ZSIsIndlYmhvb2tzLWRlbGV0ZSIsInRkZWFsZXItd2ViaG9vayJdfQ.KB9VbBDhrjTDBI3usrCW7r-E9uqQD4CpJN2OkFrqglvYmbbHEih9TDock_xmqti7CsqDZmFNSK_wyax5s_1rwg_6PfQXV9m8uj3b7wtd2d5zEEQFAgw_TuNpXZRgfynGsXnH5PT-1C-sgSXBWoDKP6r8_L7YDn3iiRdxHOEHh70ikdwjJYPmx_iCB45MLnmkYEQfkFdUQaHqOMZq1CYoP-umwPfdBDfYpmnelVqGnUSnBq1w_bN51XNfzDDa62AbJGfrdJ5u65NUyLw1uqx12_6pFu1pXb8B2_0SFVnu4eOFdnv9phFHjthsXSvxqVhUzVIVjlijZIRpo_f1lBPrSYgtf1IaM9d1bXfuMtZT-Z2u6UdjuGryC8DZauhJB5jBYOLpHNcQZiv44OPQfZ6HolfmvxSCSJI8eTI-1tvB9U3QCnYnUkUp5iVOZgG2zaavhs94UNqRkeC1-X2V4l9n0T0uTj9JSb3PgEQVQ6ZkPqaL6Rg2TG5Os-22WvMfQxpKRZgmFg37RZ1p__1IuR211XogRv1BXR3LMmEs7wXUDN-8YIVJSmvvNUFPFd8Ph0yuz_mdP_0oHYzu7PomKkBp2T7C-Z78E8OrorSCQnQMEhqj5yps26vQRUCStRMsI6hDQp7HDqKqhv6ZbRiqMIR9yHmpjGY1KvQ2LvXKq1iKKwo', Environment::PRODUCTION);
        $calculator = $shipment->calculator();

        $cep = $request->input('cep');
        $cep_format = str_replace(['-', ' '], '', $cep);
        $type_product = $request->input('type_product');
        // Verificar o tipo de produto selecionado
        if ($type_product === 'Mosaico') {
            $getPriceThreeStraightPlates = DB::table('price_and_size')
                ->where('type_product', 'Mosaico - 3 Placas Reto')
                ->get();

            // Verificar se existem valores para o produto selecionado
            if ($getPriceThreeStraightPlates->isNotEmpty()) {
                // Utilizar os valores obtidos para calcular o frete
                $product = $getPriceThreeStraightPlates[0];

                $calculator->postalCode('04865065', $cep_format);
                $melhorEnvioProduct = new MelhorEnvioProduct(
                    $product->width,
                    $product->height,
                    $product->length,
                    $product->weight,
                    '1',
                    '1'
                );
                $calculator->addProducts($melhorEnvioProduct);
            }
            } elseif ($type_product === 'Quadro') {
            $getPriceQuadro = DB::table('price_and_size')
                ->where('type_product', 'Quadro - 40x66')
                ->get();

            if ($getPriceQuadro->isNotEmpty()) {
                $product = $getPriceQuadro[0];

                $calculator->postalCode('04865065', $cep_format);
                $melhorEnvioProduct = new MelhorEnvioProduct(
                    $product->width,
                    $product->height,
                    $product->length,
                    $product->weight,
                    '1',
                    '1'
                );
                $calculator->addProducts($melhorEnvioProduct);
            }
            } elseif ($type_product === 'Luminaria') {
            $getPriceLuminaria = DB::table('price_and_size')
                ->where('type_product', 'Luminaria')
                ->get();

            if ($getPriceLuminaria->isNotEmpty()) {
                $product = $getPriceLuminaria[0];

                $calculator->postalCode('04865065', $cep_format);
                $melhorEnvioProduct = new MelhorEnvioProduct(
                    $product->width,
                    $product->height,
                    $product->length,
                    $product->weight,
                    '1',
                    '1'
                );
                $calculator->addProducts($melhorEnvioProduct);
            }
        }
        $calculator->addServices(
            Service::CORREIOS_SEDEX,
            Service::JADLOG_PACKAGE, 
            Service::JADLOG_COM
        );
        $calculator->setOwnHand(); // mão própria
        $calculator->setReceipt(); // aviso de recebimento
        $calculator->setCollect(); // coleta
        $quotations = $calculator->calculate();
        
        if (!empty($quotations)) {
            // Construir a resposta em formato JSON
            $response = [
                'success' => true,
                'quotations' => [],
            ];

            foreach ($quotations as $quotation) {
                if (isset($quotation['error'])) {
                    // Se houver um erro na cotação, adicione uma mensagem personalizada
                    $errorMessage = $quotation['error'];
                    $response['quotations'][] = [
                        'service' => $quotation['name'],
                        'error' => $errorMessage,
                        // Adicione outros campos relevantes que deseja exibir no modal
                    ];
                } else {
                    // Se não houver erro, adicione os dados da cotação normalmente
                    $response['quotations'][] = [
                        'service' => $quotation['name'],
                        'price' => $quotation['price'],
                        'delivery_time' => $quotation['delivery_time'],
                        // Adicione outros campos relevantes que deseja exibir no modal
                    ];
                }
            }
            
            return response()->json($response);
        } else {
            return response()->json(['success' => false]);
        }
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
