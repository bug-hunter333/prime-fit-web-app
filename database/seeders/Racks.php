<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Racks extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Racks')->insert([
            [
                'name' => 'Wall-Mounted Squat Rack with Plates',
                'description' => 'The Wall-Mounted Squat Rack with Plates is a space-saving, sturdy fitness equipment designed for squats and other strength exercises. It features a secure wall mount and comes with weight plates, offering a convenient and efficient setup for home gyms.',
                'price' => 1800.00,
                'quantity' => 10,
                'image_url' => 'https://equipfitness.net/cdn/shop/products/5976_1_grande.webp?v=1652378001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Freestanding Power Rack',
                'description' => 'A Freestanding Power Rack is a sturdy, independent frame designed for heavy-duty strength training. It allows for a variety of exercises like squats, bench presses, and pull-ups, offering adjustable safety bars for added security during workouts.',
                'price' => 400.00,
                'quantity' => 15,
                'image_url' => 'https://www.mifitness.co.za/wp-content/uploads/2017/11/Powercore-Rack-1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Half Rack with Pull-Up Bar',
                'description' => 'The Half Rack with Pull-Up Bar is a compact, sturdy fitness station that combines a squat rack with a pull-up bar, offering versatility for strength training. It supports various exercises like squats, bench presses, and pull-ups, making it perfect for home or gym use.',
                'price' => 300.00,
                'quantity' => 12,
                'image_url' => 'https://m.media-amazon.com/images/I/61Abyexr-EL._AC_UF350,350_QL80_.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Compact Squat Rack with 2 Weight Plates',
                'description' => 'The Compact Squat Rack with 2 Weight Plates is a space-saving, sturdy rack designed for squats and other weightlifting exercises. It comes with two weight plates, offering a complete setup for home or gym workouts.',
                'price' => 2500.00,
                'quantity' => 8,
                'image_url' => 'https://www.articulo14.es/main-files/uploads/2024/04/Pilates-rosa.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Multi-Function Rig',
                'description' => 'A Multi-Function Rig is a versatile piece of gym equipment designed for a wide range of exercises, including squats, pull-ups, bench presses, and more. It offers multiple attachment points, allowing users to perform various strength training routines in one compact unit.',
                'price' => 3500.00,
                'quantity' => 6,
                'image_url' => 'https://i.pinimg.com/736x/42/a9/75/42a9751978e361c726125db4c33063f8.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

