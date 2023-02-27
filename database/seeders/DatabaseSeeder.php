<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
        ]);

        // Product::factory(20)->create();

        // $this->call([
        //     CartSeeder::class,
        // ]);

        // $this->call([
        //     OrderStatusSeeder::class,
        //     OrderSeeder::class,
        // ]);
    }
}
