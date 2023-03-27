<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
        $todosProdutos = Product::latest()->paginate(10);
        return view('allProducts', compact('todosProdutos'));
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
    }

    public function formStoreProduct()
    {
        return view('crudProduct.createProduct');
    }

    public function homePage()
    {   
        $bestSeller = DB::table('products')->where('carrousel', '1')->get();
        $launch = DB::table('products')->where('carrousel', '2')->get();
        $highlight = DB::table('products')->where('carrousel', '3')->get();
        $mosaic = DB::table('products')->where('type_product', 'Mosaico')->get();
        $lighting = DB::table('products')->where('type_product', 'Luminaria')->get();
        return view('home', compact('bestSeller', 'launch', 'highlight', 'mosaic', 'lighting'));
    }

    public function showProductClient($id)
    {
        $viewProduct = Product::find($id);
        $bestSeller = DB::table('products')->where('carrousel', '1')->get();
        return view('showProductClient', compact('viewProduct', 'bestSeller'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viewProduct = Product::find($id);
        $viewImage = json_decode($viewProduct->image_product);
        $viewImageDescription = json_decode($viewProduct->image_description);
        return view('showProduct', compact('viewProduct', 'viewImageDescription', 'viewImage'));
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
        $updateProduct = $request->all();
        $product = Product::find($id);
        $product->update($updateProduct);
        return redirect('/todosProdutos');
        
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
