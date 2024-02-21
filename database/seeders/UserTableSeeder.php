<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $users = [
            [
                'nom' => 'Doe',
                'prenom' => 'John',
                'adresse_email' => 'john.doe@example.com',
                'matricule' => '12345678',
                'a_acces' => true,
                'password' => Hash::make('123'), 
            ],
            [
                'nom' => 'Morinville',
                'prenom' => 'Jonathan',
                'adresse_email' => 'jonathan.morinville@email.com',
                'matricule' => '111213',
                'a_acces' => true,
                'password' => Hash::make('123'),
            ],
            [
                'nom' => 'Lizotte',
                'prenom' => 'Alain',
                'adresse_email' => 'alain.lizotte@email.com',
                'matricule' => '131415',
                'a_acces' => true,
                'password' => Hash::make('123'),
            ],
        ];
    }
}
