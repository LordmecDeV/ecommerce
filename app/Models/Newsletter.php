<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'newsletter';
    protected $fillable = [
        'title_campaign', 'title_content', 'products', 'color_footer', 'color_header', 'image', 'link_facebook', 'link_instagram', 'link_whatsapp', 'products_in_mail',
    ];
}
