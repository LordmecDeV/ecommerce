<?php

namespace App\Http\Controllers;

use App\Models\PriceAndSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PricesAndSizesController extends Controller
{
    public function index()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $viewAll = PriceAndSize::latest()->paginate(10);

            return view('pricesAndSizes', compact('viewAll'));
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function getStore()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('createPricesAndSizes');
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $validatedData = $request->all();
            PriceAndSize::create($validatedData);

            return redirect('/precos-e-tamanhos');
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function getUpdate($id)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $updateProduct = PriceAndSize::find($id);

            return view('updatePricesAndSizes', compact('updateProduct'));
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $updateProduct = $request->all();
            $product = PriceAndSize::find($id);
            $product->update($updateProduct);

            return redirect('/precos-e-tamanhos');
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function destroy($id)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $product = PriceAndSize::findOrFail($id);
            $product->delete();

            return redirect()->route('precos-e-tamanhos')->with('success', 'Produto excluído com sucesso!');
        }

        return abort(403, 'Acesso não autorizado.');
    }
}
