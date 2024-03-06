<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Local;


class LocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Local::create([
            'nom' => 'SB0117',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
