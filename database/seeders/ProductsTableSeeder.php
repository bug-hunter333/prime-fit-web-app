<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
     {
          DB::table('products')->insert([
            [
                'name' => 'Olympic Barbell with 2 Weightplates',
                'price' => 1200.00,
                'weight' => 40,
                'quantity' => 10,
                'image_url' => 'https://img.freepik.com/psd-gratuitas/barbell-para-treino-isolado_23-2151870427.jpg?semt=ais_hybrid&w=740&t=1',
            ],
            [
                'name' => 'Curl Barbell',
                'price' => 800.00,
                'weight' => 12,
                'quantity' => 12,
                'image_url' => 'https://img.freepik.com/foto-gratis/vista-frontal-hombre-levantamiento-pesas-gimnasio_23-2148603828.jpg',
            ],
            [
                'name' => 'Trap Bar',
                'price' => 1400.00,
                'weight' => 25,
                'quantity' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/61BFPI3n81L._AC_UF894,1000_QL80_.jpg',
            ],
            [
                'name' => 'EZ Curl Bar',
                'price' => 500.00,
                'weight' => 10,
                'quantity' => 20,
                'image_url' => 'https://m.media-amazon.com/images/I/51RnewwWV9L.jpg',
            ],
            [
                'name' => 'Bumper Plates (10kg x 4)',
                'price' => 600.00,
                'weight' => 40,
                'quantity' => 10,
                'image_url' => 'https://img.freepik.com/free-photo/copy-space-weights-gym-training_23-2148353024.jpg',
            ],
            [
                'name' => 'Adjustable Dumbbell Set',
                'price' => 89.99,
                'weight' => 24,
                'quantity' => 15,
                'image_url' => 'https://www.ironcompany.com/media/mf_webp/jpg/media/catalog/product/cache/0497f845716ff9ff5fb3d560ec6f3888/D/B/DBSUB2-Solid-Urethane-Dumbbells-xlg.webp',
            ],
            [
                'name' => 'Hex Rubber Dumbbell 10kg',
                'price' => 29.99,
                'weight' => 10,
                'quantity' => 20,
                'image_url' => 'https://img.freepik.com/free-psd/top-view-dumbbells-isolated_23-2151849416.jpg',
            ],
            [
                'name' => 'Cast Iron Dumbbell Pair 5kg',
                'price' => 34.99,
                'weight' => 5,
                'quantity' => 25,
                'image_url' => 'https://img.freepik.com/free-psd/top-view-dumbbells-isolated_23-2151849444.jpg',
            ],
            [
                'name' => 'Leather Palm Gloves',
                'price' => 15.00,
                'weight' => 0,
                'quantity' => 30,
                'image_url' => 'https://img.freepik.com/free-photo/young-woman-working-out-street_23-2148213167.jpg?semt=ais_hybrid&w=740',
            ],
            [
                'name' => 'Wrist Wrap Gloves',
                'price' => 30.00,
                'weight' => 0,
                'quantity' => 25,
                'image_url' => 'https://img.freepik.com/free-photo/athletic-muscly-man-torso-with-boxing-gloves_23-2148418199.jpg',
            ],
            [
                'name' => 'Full-Finger Gloves',
                'price' => 20.00,
                'weight' => 0,
                'quantity' => 20,
                'image_url' => 'https://static.wixstatic.com/media/731926_11236f9e40f74fa1ba0cab4d36a8cd58~mv2.jpg/v1/fill/w_1500,h_1005,al_c/731926_11236f9e40f74fa1ba0cab4d36a8cd58~mv2.jpg',
            ],
            [
                'name' => 'Breathable Mesh Gloves',
                'price' => 15.00,
                'weight' => 0,
                'quantity' => 30,
                'image_url' => 'https://ae01.alicdn.com/kf/S0fd35c8289e24908ac98bc2dff4d9e7cI.jpg?width=800&height=800&hash=1600',
            ],
            [
                'name' => 'Neoprene Padding Gloves',
                'price' => 18.00,
                'weight' => 0,
                'quantity' => 20,
                'image_url' => 'https://www.wetsuitwearhouse.com/cdn/shop/files/666-SG15V-MAIN.jpg?v=1741109771&width=533',
            ],
            [
                'name' => 'Wall-Mounted Squat Rack with Plates',
                'price' => 1800.00,
                'weight' => 0,
                'quantity' => 10,
                'image_url' => 'https://equipfitness.net/cdn/shop/products/5976_1_grande.webp?v=1652378001',
            ],
            [
                'name' => 'Freestanding Power Rack',
                'price' => 400.00,
                'weight' => 0,
                'quantity' => 15,
                'image_url' => 'https://www.mifitness.co.za/wp-content/uploads/2017/11/Powercore-Rack-1.jpg',
            ],
            [
                'name' => 'Half Rack with Pull-Up Bar',
                'price' => 300.00,
                'weight' => 0,
                'quantity' => 12,
                'image_url' => 'https://m.media-amazon.com/images/I/61Abyexr-EL._AC_UF350,350_QL80_.jpg',
            ],
            [
                'name' => 'Compact Squat Rack with 2 Weight Plates',
                'price' => 2500.00,
                'weight' => 0,
                'quantity' => 8,
                'image_url' => 'https://www.articulo14.es/main-files/uploads/2024/04/Pilates-rosa.jpeg',
            ],
            [
                'name' => 'Multi-Function Rig',
                'price' => 3500.00,
                'weight' => 0,
                'quantity' => 6,
                'image_url' => 'https://i.pinimg.com/736x/42/a9/75/42a9751978e361c726125db4c33063f8.jpg',
            ],
            [
                'name' => 'Eco-Friendly Cork Mat',
                'price' => 35.00,
                'weight' => 0,
                'quantity' => 20,
                'image_url' => 'https://m.media-amazon.com/images/I/51ToyuspHAL._AC_UF1000,1000_QL80_.jpg',
            ],
            [
                'name' => 'Extra-Thick Yoga Mat',
                'price' => 40.00,
                'weight' => 0,
                'quantity' => 15,
                'image_url' => 'https://i.ebayimg.com/images/g/ko8AAOSwHMJYNsQW/s-l400.jpg',
            ],
            [
                'name' => 'Travel Yoga Mat',
                'price' => 25.00,
                'weight' => 0,
                'quantity' => 25,
                'image_url' => 'https://media.sku.ninja/hosting/prod/670456646_videos/202409261427411246510215.jpg?odnHeight=768&odnWidth=768&odnBg=FFFFFF',
            ],
            [
                'name' => 'Non-Slip TPE Mat',
                'price' => 30.00,
                'weight' => 0,
                'quantity' => 30,
                'image_url' => 'https://images-na.ssl-images-amazon.com/images/I/816pg9rVxOL._AC_UL600_SR600,600_.jpg',
            ],
            [
                'name' => 'Printed Yoga Mat',
                'price' => 28.00,
                'weight' => 0,
                'quantity' => 18,
                'image_url' => 'https://www.strengthdepot.com/assets/images/large_c57dae7c-33f3-4e48-bb11-b2dc1e5e2b14_2048x2048.jpeg',
            ],
        ]);
    }
    
}