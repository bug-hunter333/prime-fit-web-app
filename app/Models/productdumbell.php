<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productdumbell extends Model
{
    
    protected $table = 'Dumbell';

    protected $fillable = [
        'name',
        'price',
        'weight',
        'quantity',
        'image_url',
        'description',
    ];
}
