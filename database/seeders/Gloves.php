<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Gloves extends Seeder
{
    public function run(): void
    {
        DB::table('Gloves')->insert([
            [
                'name' => 'Leather Palm Gloves',
                'description' => 'Leather Palm Gloves offer durable protection with a leather palm for enhanced grip and comfort, ideal for manual labor, outdoor activities, and fitness training.',
                'price' => 15.00,
                'quantity' => 30,
                'image_url' => 'https://img.freepik.com/free-photo/young-woman-working-out-street_23-2148213167.jpg?semt=ais_hybrid&w=740',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wrist Wrap Gloves',
                'description' => 'Wrist Wrap Gloves provide support and protection for your wrists during weightlifting and other intense workouts. They feature adjustable wrist wraps for added stability and comfort, helping to prevent strain and injury.',
                'price' => 30.00,
                'quantity' => 25,
                'image_url' => 'https://img.freepik.com/free-photo/athletic-muscly-man-torso-with-boxing-gloves_23-2148418199.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Full-Finger Gloves',
                'description' => 'Full-Finger Gloves offer complete hand protection with full coverage for all fingers, providing comfort and grip during various activities like sports, weightlifting, or outdoor work.',
                'price' => 20.00,
                'quantity' => 20,
                'image_url' => 'https://static.wixstatic.com/media/731926_11236f9e40f74fa1ba0cab4d36a8cd58~mv2.jpg/v1/fill/w_1500,h_1005,al_c/731926_11236f9e40f74fa1ba0cab4d36a8cd58~mv2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Breathable Mesh Gloves',
                'description' => 'Breathable Mesh Gloves are lightweight, comfortable gloves designed with breathable mesh fabric to enhance airflow and keep hands cool during workouts. Perfect for grip and protection, they offer flexibility and comfort for various fitness activities.',
                'price' => 15.00,
                'quantity' => 30,
                'image_url' => 'https://ae01.alicdn.com/kf/S0fd35c8289e24908ac98bc2dff4d9e7cI.jpg?width=800&height=800&hash=1600',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Neoprene Padding Gloves',
                'description' => 'Neoprene Padding Gloves provide comfort and support during workouts, featuring soft neoprene material and padded palms for enhanced grip and protection. Ideal for weightlifting and fitness training.',
                'price' => 18.00,
                'quantity' => 20,
                'image_url' => 'https://www.wetsuitwearhouse.com/cdn/shop/files/666-SG15V-MAIN.jpg?v=1741109771&width=533',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
