<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todosProdutos = Product::latest()->paginate(15);
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
       $product = $request->all();
       $descriptionImage = $request->file('image_description');
       $arquivo = $request->file('image_product');
       $salvarArquivosDescricao = [];
        foreach ($descriptionImage as $descriptionImages) {
            $extension = $descriptionImages->getClientOriginalExtension();
            if (!in_array($extension, ['jpg', 'png', 'pdf', 'txt'])) {
                return redirect()->back()->withErrors("Tipo de arquivo não permitido: $extension");
            }
            $filename = $descriptionImages->getClientOriginalName();
            $filename = pathinfo($filename, PATHINFO_FILENAME);
            $filename = Str::slug($filename) . '_' . time();
            $filename = $filename . '.' . $extension;
            $salvarArquivoDescricao = $descriptionImages->storeAs(public_path('imagens'), $filename);
            $descriptionImages->move(public_path('imagens'), $filename);
            $salvarArquivosDescricao[] = $salvarArquivoDescricao;
        }
        $salvarArquivos = [];
        foreach ($arquivo as $arquivos) {
            $extension = $arquivos->getClientOriginalExtension();
            if (!in_array($extension, ['jpg', 'png', 'pdf', 'txt'])) {
                return redirect()->back()->withErrors("Tipo de arquivo não permitido: $extension");
            }
            $filename = $arquivos->getClientOriginalName();
            $filename = pathinfo($filename, PATHINFO_FILENAME);
            $filename = Str::slug($filename) . '_' . time();
            $filename = $filename . '.' . $extension;
            $salvarArquivo = $arquivos->storeAs(public_path('imagens'), $filename);
            $arquivos->move(public_path('imagens'), $filename);
            $salvarArquivos[] = $salvarArquivo;
        }
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image_description' => json_encode($salvarArquivosDescricao),
            'tag' => $request->input('tag'),
            'sku' => $request->input('sku'),
            'type_product' => $request->input('type_product'),
            'status' => $request->input('status'),
            'image_product' => json_encode($salvarArquivos),
        ];
       $createProduct = Product::create($data);
       return redirect('/todosProdutos');
    }

    public function formStoreProduct()
    {
        return view('crudProduct.createProduct');
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
