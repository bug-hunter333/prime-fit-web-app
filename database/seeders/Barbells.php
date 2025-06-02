<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Barbells extends Seeder
{
    public function run(): void
    {
        DB::table('Barbells')->insert([
            [
                'name' => 'Olympic Barbell with 2 Weightplates',
                'description' => 'The Olympic Barbell with 2 Weight Plates offers a complete strength training solution. Made from high-quality steel for durability, the barbell features a secure, comfortable grip and can support heavy loads. The included weight plates provide versatility for various exercises, helping you build strength and muscle efficiently.',
                'price' => 1200.00,
                'weight' => 40, // 20kg bar + 2x10kg plates
                'quantity' => 10,
                'image_url' => 'https://img.freepik.com/psd-gratuitas/barbell-para-treino-isolado_23-2151870427.jpg?semt=ais_hybrid&w=740&t=1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Curl Barbell',
                'description' => 'The Curl Barbell is a specially designed barbell with an angled grip to target the biceps and forearms more effectively. Its ergonomic shape reduces strain on the wrists, providing a more comfortable and controlled workout. Perfect for building arm strength and enhancing muscle definition.',
                'price' => 800.00,
                'weight' => 12, // example weight
                'quantity' => 12,
                'image_url' => 'https://img.freepik.com/foto-gratis/vista-frontal-hombre-levantamiento-pesas-gimnasio_23-2148603828.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trap Bar',
                'description' => 'The Trap Bar is a versatile weightlifting tool designed for safe and efficient deadlifts and squats. Its unique hexagonal shape allows for a more natural posture, reducing strain on the back and shoulders. Ideal for strength training, it promotes proper form, enhances lifting performance, and minimizes the risk of injury.',
                'price' => 1400.00,
                'weight' => 25,
                'quantity' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/61BFPI3n81L._AC_UF894,1000_QL80_.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EZ Curl Bar',
                'description' => 'The EZ Curl Bar is designed for comfortable and effective arm workouts. Its angled shape reduces strain on the wrists, making it ideal for curls, triceps extensions, and other upper body exercises. The bar\'s sturdy construction ensures durability, while its compact design offers easy handling and versatility for home or gym use.',
                'price' => 500.00,
                'weight' => 10,
                'quantity' => 20,
                'image_url' => 'https://m.media-amazon.com/images/I/51RnewwWV9L.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bumper Plates (10kg x 4)',
                'description' => 'Bumper Plates are heavy-duty weight plates made from high-quality rubber, designed for safe and quiet lifting. They are ideal for Olympic-style lifts, absorbing impact and protecting both the barbell and the floor. Their durable construction ensures long-lasting performance and stability during intense workouts.',
                'price' => 600.00,
                'weight' => 40, // 10kg x 4
                'quantity' => 6,
                'image_url' => 'https://img.freepik.com/free-photo/copy-space-weights-gym-training_23-2148353024.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
