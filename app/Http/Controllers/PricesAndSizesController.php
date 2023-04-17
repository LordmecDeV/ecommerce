<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceAndSize;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PricesAndSizesController extends Controller
{
    public function index()
    {   
        $viewAll = PriceAndSize::latest()->paginate(10);
        return view('pricesAndSizes', compact('viewAll'));
    }

    public function getStore()
    {
        return view('createPricesAndSizes');
    }

    public function store(Request $request)
    {
        $validatedData = $request->all();
        PriceAndSize::create($validatedData);
        return redirect('/precos-e-tamanhos');
    }

    public function getUpdate($id)
    {
        $updateProduct = PriceAndSize::find($id);
        return view('updatePricesAndSizes', compact('updateProduct'));
    }

    public function update(Request $request, $id)
    {
        $updateProduct = $request->all();
        $product = PriceAndSize::find($id);
        $product->update($updateProduct);
        return redirect('/precos-e-tamanhos');
    }

    public function destroy($id)
    {
    $product = PriceAndSize::findOrFail($id);
    $product->delete();
    return redirect()->route('precos-e-tamanhos')->with('success', 'Produto excluído com sucesso!');
    }

}
