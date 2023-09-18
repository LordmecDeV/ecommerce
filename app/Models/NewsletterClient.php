<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterClient extends Model
{
    use HasFactory;

    protected $table = "newsletter_client";
    protected $fillable = [
        'client_mail'
    ];
}
