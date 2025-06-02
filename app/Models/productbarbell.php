<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productbarbell extends Model
{
    protected $table = 'Barbell';

    protected $fillable = [
        'name',
        'price',
        'weight',
        'quantity',
        'image_url',
        'description',
    ];
}
