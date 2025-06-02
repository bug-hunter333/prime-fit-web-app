<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'weight',
        'quantity',
        'image_url'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'weight' => 'decimal:2',
        'quantity' => 'integer'
    ];

    // Accessor for formatted price
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    // Check if product is in stock
    public function isInStock()
    {
        return $this->quantity > 0;
    }

    // Get available quantity
    public function getAvailableQuantity()
    {
        return $this->quantity;
    }

    // Check if product has weight
    public function hasWeight()
    {
        return $this->weight > 0;
    }

    // Get formatted weight
    public function getFormattedWeightAttribute()
    {
        if ($this->weight > 0) {
            return $this->weight . 'kg';
        }
        return 'N/A';
    }

    // Get products by category (based on product name keywords)
    public static function getByCategory($category)
    {
        $searchTerms = [
            'dumbbells' => ['dumbbell', 'adjustable', 'hex', 'cast iron'],
            'barbells' => ['barbell', 'olympic', 'curl', 'trap', 'ez curl'],
            'plates' => ['plates', 'bumper', 'weight'],
            'gloves' => ['gloves', 'palm', 'wrist', 'finger', 'mesh', 'padding'],
            'racks' => ['rack', 'squat', 'power', 'rig', 'wall-mounted'],
            'mats' => ['mat', 'yoga', 'cork', 'tpe', 'travel']
        ];

        if (!isset($searchTerms[$category])) {
            return collect([]);
        }

        $query = self::query();
        foreach ($searchTerms[$category] as $term) {
            $query->orWhere('name', 'LIKE', '%' . $term . '%');
        }

        return $query->get();
    }

    // Search products by name
    public static function search($searchTerm)
    {
        return self::where('name', 'LIKE', '%' . $searchTerm . '%')->get();
    }
}