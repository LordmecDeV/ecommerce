<?php

namespace App\Http\Controllers;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;

use Illuminate\Http\Request;

class ExportandImportController extends Controller
{
    public function export() 
    {
        return Excel::download(new ProductsExport, 'produtos.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ProductsImport,request()->file('file'));
               
        return back();
    }
}
