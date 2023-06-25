<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = "shopping_cart";
    protected $fillable = [
        'user_id', 'characteristics', 'product_id', 'product_characteristics', 'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
