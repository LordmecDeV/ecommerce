<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
        
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["id" ,'name', 'description', 'price', 'image_product_1', 'image_product_2', 'image_product_3', 'image_product_4', 'image_product_5', 'image_product_6', 'image_product_7','image_product_8', 'image_product_9', 'image_product_10', 'tag', 'sku', 'type_product', 'status'];
    }
}
