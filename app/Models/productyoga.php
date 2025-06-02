<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productyoga extends Model
{
    protected $table = 'Yog';

    protected $fillable = [
        'name',
        'price',
        'weight',
        'quantity',
        'image_url',
        'description',
    ];
}
