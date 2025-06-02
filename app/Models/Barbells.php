<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbells extends Model
{
    protected $table = 'Barbells'; 
    protected $fillable = [
        'name',
        'image_url',
    ];

}
