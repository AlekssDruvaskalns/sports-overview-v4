<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sports = ['mma', 'basketball', 'boxing', 'football'];

        foreach ($sports as $sport) {
            Sport::create(['name' => $sport]);
        }
    }
}
