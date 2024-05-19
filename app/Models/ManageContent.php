<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageContent extends Model
{
    use HasFactory;

    protected $table = "manage_content";
    protected $fillable = [
        'type_description', 'description', 'image_carousel', 'link_image_carousel', 'link_collection'
    ];
}
