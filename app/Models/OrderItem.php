<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_type',
        'product_id',
        'product_name',
        'price',
        'quantity',
        'subtotal'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'subtotal' => 'decimal:2'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Dynamic relationship to get the actual product
    public function product()
    {
        switch ($this->product_type) {
            case 'dumbell':
                return $this->belongsTo(Productdumbell::class, 'product_id');
            case 'barbell':
                return $this->belongsTo(Productbarbell::class, 'product_id');
            // Add other product types as needed
            default:
                return null;
        }
    }
}