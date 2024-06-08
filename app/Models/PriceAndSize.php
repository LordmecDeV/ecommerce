<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceAndSize extends Model
{
    use HasFactory;

    protected $table = 'price_and_size';
    protected $fillable = [
        'type_product', 'price', 'height', 'width', 'length', 'weight',
    ];
}
