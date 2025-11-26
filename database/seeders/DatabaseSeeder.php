<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat beberapa user dummy
         User::factory()->create([
            'name' => 'ipul',
            'email' => 'ipul1@tokobaju.com',
            'password' => Hash::make('ipul12345'),
            'role' => 'admin',
         ]);

        // Buat 1 user admin khusus
        User::factory()->create([
            'name' => 'ipul',
            'email' => 'ipul@tokobaju.com',
            'password' => Hash::make('ipul12345'),
            'role' => 'admin',
        ]);

        // Jalankan seeder produk
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
