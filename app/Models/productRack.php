<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productRack extends Model
{
    protected $table = 'rack';

    protected $fillable = [
        'name',
        'price',
        'weight',
        'quantity',
        'image_url',
        'description',
    ];
}
