<?php

namespace Database\Seeders;

use App\Http\Controllers\product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use products;
use squats;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Dumbell::factory(10)->create();

        $this->call([
            Barbells::class,
            Dumbells::class,
            Gloves::class,
            Yoga::class,
            Racks::class,
            // ProductsTableSeeder::class,
            // Dumbell::class,
            // Barbell::class,
            // Rack::class,
            // Glove::class,
            // Yog::class,
            
    
        
          
       
        ]);
    }

}
