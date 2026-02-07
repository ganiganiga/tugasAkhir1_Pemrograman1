<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Nabila Puspita Asih',
            'email' => 'nabil@user.com',
        ]);

        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Al Ghani Muhammad Fadhillah',
            'email' => 'gani@user.com',
            'password' => bcrypt('user1234'),
            'role' => 'user',
        ]);

        $this->call(ProductSeeder::class);
    }
}
