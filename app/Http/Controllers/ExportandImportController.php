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
        try {
            Excel::import(new ProductsImport,request()->file('file'));
        } catch (\Maatwebsite\Excel\Exceptions\SheetNotFoundException $e) {
            return redirect()->back()->withErrors(['Erro: Não foi possível encontrar a planilha no arquivo.']);
        } catch (\Maatwebsite\Excel\Exceptions\NoTypeDetectedException $e) {
            return redirect()->back()->withErrors(['Erro: Não foi possível detectar o tipo de arquivo.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Erro: Ocorreu um erro durante a importação do arquivo.']);
        }
               
        return back();
    }
}
