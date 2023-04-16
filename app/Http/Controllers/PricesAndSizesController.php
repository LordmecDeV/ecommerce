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
        return redirect('/todosProdutos');
    }

}
