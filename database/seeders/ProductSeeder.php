<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 25; $i++) {
            DB::table('products')->insert([
                'name' => $faker->sentence(),
                'description' => $faker->paragraph(2),
                'price' => $faker->randomFloat(2),
                'image' => $faker->imageUrl(500, 500),
                'stock' => rand(1, 130)
            ]);
        }
    }
}
