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
            'image_product_1'    => $row['image_product_1'],
            'image_product_2'    => $row['image_product_2'],
            'image_product_3'    => $row['image_product_3'],
            'image_product_4'    => $row['image_product_4'],
            'image_product_5'    => $row['image_product_5'],
            'image_product_6'    => $row['image_product_6'],
            'image_product_7'    => $row['image_product_7'],
            'image_product_8'    => $row['image_product_8'],
            'image_product_9'    => $row['image_product_9'],
            'image_product_10'    => $row['image_product_10'],
            'price'    => $row['price'],
            'status'    => $row['status'],
            'tag'    => $row['tag'],
            'sku'    => $row['sku'],
            'type_product'    => $row['type_product'],
        ]);
    }
}
