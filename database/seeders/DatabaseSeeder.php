<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Here tell laravel to call all of our custom seeders
        $this->call([
            CarSeeder::class
        ]);
        $this->call([
            ProductSeeder::class
        ]);
    }
}
