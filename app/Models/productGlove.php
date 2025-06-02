<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productGlove extends Model
{
     protected $table = 'Glove';

    protected $fillable = [
        'name',
        'price',
        'weight',
        'quantity',
        'image_url',
        'description',
    ];
}
