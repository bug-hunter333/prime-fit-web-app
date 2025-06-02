<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yoga extends Model
{
    protected $table = 'Yoga';

    protected $fillable = [
        'name',
        'image_url',
    ];
}
