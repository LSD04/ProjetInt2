<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'nom'=>'Admin',
                'prenom'=>'Admin',
                'matricule'=>'123111',
                'adresse_email'=>'admin@email.com',
                'password'=>Hash::make('123'),
            ]

        ]);
    
    }
}
