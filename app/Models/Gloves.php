<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gloves extends Model
{
    protected $table = 'gloves';

    protected $fillable = [
        'name',
        'image_url',
    ];
}
