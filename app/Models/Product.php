<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'carrousel','image_product_1', 'image_product_2', 'image_product_3', 'image_product_4', 'image_product_5', 'image_product_6', 'image_product_7','image_product_8', 'image_product_9', 'image_product_10', 'tag', 'sku', 'type_product', 'status'
    ];

    public function carts()
    {
        return $this->hasMany(ShoppingCart::class);
    }
}
