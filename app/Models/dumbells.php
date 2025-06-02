<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dumbells extends Model // Singular, PascalCase
{
    protected $table = 'dumbells'; // Table name stays plural

    protected $fillable = [
        'name',
        'image_url',
        'price',
        'description',
    ];
}