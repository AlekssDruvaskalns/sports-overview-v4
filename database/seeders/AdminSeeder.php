<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating a default admin user
        User::create([
            'name' => 'Kingpin',
            'email' => 'kingpin@gmail.com',
            'password' => bcrypt('kingpin123'),
            'role' => 'admin',
        ]);
    }
}
