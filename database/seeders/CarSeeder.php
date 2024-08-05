<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('cars')->insert([
                'make' => $faker->company(),
                'model' => $faker->sentence(),
                'description' => $faker->paragraph(2),
                'price' => $faker->randomFloat(2),
                'seats' => rand(2, 7),
                'owned' => $faker->boolean()
            ]);
        }
    }
}
