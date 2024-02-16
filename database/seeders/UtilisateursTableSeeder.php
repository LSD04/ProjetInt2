<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;

class UtilisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Utilisateur::create([
            'nom' => 'Doe',
            'prenom' => 'John',
            'adresse_email' => 'john.doe@example.com',
            'matricule' => '12345678',
            'a_acces' => true,
        ]);
    }
}
