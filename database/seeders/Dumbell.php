<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Dumbell extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('Dumbell')->insert([
        [
            'name' => 'Adjustable Dumbbell Set',
            'description' => 'Adjustable dumbbells from 2kg to 24kg – space saving solution',
            'price' => 89.99,
            'weight' => 24,
            'quantity' => 15,
            'image_url' => 'https://www.ironcompany.com/media/mf_webp/jpg/media/catalog/product/cache/0497f845716ff9ff5fb3d560ec6f3888/D/B/DBSUB2-Solid-Urethane-Dumbbells-xlg.webp',
            'created_at' => now(),
            'updated_at' => now(),
        ],
           [
            'name' => 'Hex Rubber Dumbbell 10kg',
            'description' => 'Single 10kg rubber-coated hex dumbbell for strength training',
            'price' => 29.99,
            'weight' => 10,
            'quantity' => 20,
            'image_url' => 'https://img.freepik.com/free-psd/top-view-dumbbells-isolated_23-2151849416.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
              [
            'name' => 'Cast Iron Dumbbell Pair 5kg',
            'description' => 'Classic cast iron dumbbells – pair of 5kg weights',
            'price' => 34.99,
            'weight' => 5,
            'quantity' => 25,
            'image_url' => 'https://img.freepik.com/free-psd/top-view-dumbbells-isolated_23-2151849444.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
            ]);
}
}
