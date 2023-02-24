<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'id'    => $row['id'],
            'name'     => $row['name'],
            'description'    => $row['description'],
            'image_description'    => $row['image_description'],
            'image_product'    => $row['image_product'],
            'price'    => $row['price'],
            'status'    => $row['status'],
            'tag'    => $row['tag'],
            'sku'    => $row['sku'],
            'type_product'    => $row['type_product'],
        ]);
    }
}
