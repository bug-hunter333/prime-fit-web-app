<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Yoga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Yoga')->insert([
            [
                'name' => 'Eco-Friendly Cork Mat',
                'description' => 'The Eco-Friendly Cork Mat is a sustainable, non-toxic mat made from natural cork and rubber, providing a comfortable and eco-conscious surface for yoga, exercise, or relaxation. It offers excellent grip, durability, and is biodegradable.',
                'price' => 35.00,
                'quantity' => 20,
                'image_url' => 'https://m.media-amazon.com/images/I/51ToyuspHAL._AC_UF1000,1000_QL80_.jpg', // Optional image
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Extra-Thick Yoga Mat',
                'description' => 'The Extra-Thick Yoga Mat provides enhanced comfort and support during workouts with its cushioned, durable surface, perfect for yoga, Pilates, and floor exercises.',
                'price' => 40.00,
                'quantity' => 15,
                'image_url' => 'https://i.ebayimg.com/images/g/ko8AAOSwHMJYNsQW/s-l400.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Travel Yoga Mat',
                'description' => 'A Travel Yoga Mat is a lightweight, portable mat designed for on-the-go yoga practice. It offers comfort, stability, and easy folding for convenient storage and travel.',
                'price' => 25.00,
                'quantity' => 25,
                'image_url' => 'https://media.sku.ninja/hosting/prod/670456646_videos/202409261427411246510215.jpg?odnHeight=768&odnWidth=768&odnBg=FFFFFF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Non-Slip TPE Mat',
                'description' => 'The Non-Slip TPE Mat provides a stable, slip-resistant surface for workouts, made from eco-friendly TPE material for durability and comfort. Ideal for yoga, Pilates, and fitness routines.',
                'price' => 30.00,
                'quantity' => 30,
                'image_url' => 'https://images-na.ssl-images-amazon.com/images/I/816pg9rVxOL._AC_UL600_SR600,600_.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Printed Yoga Mat',
                'description' => 'A Printed Yoga Mat combines comfort and style, featuring a unique design with a non-slip surface for stability during yoga or fitness routines. It\'s lightweight, durable, and offers excellent cushioning for added support.',
                'price' => 28.00,
                'quantity' => 18,
                'image_url' => 'https://www.strengthdepot.com/assets/images/large_c57dae7c-33f3-4e48-bb11-b2dc1e5e2b14_2048x2048.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
