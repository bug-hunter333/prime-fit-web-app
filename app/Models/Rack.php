<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
     protected $table = 'Racks';

    protected $fillable = [
        'name',
        'image_url',
    ];
}
