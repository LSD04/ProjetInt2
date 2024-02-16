<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DemandesInscriptionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('demandes_inscription')->insert([
            'nom' => 'Doe',
            'prenom' => 'John',
            'adresse_email' => 'john.doe@example.com',
            'date_demande' => Carbon::now()->format('Y-m-d H:i:s'),
            'local_id' => 1, // Assurez-vous que cet ID existe dans votre table `locals`
            'statutDemande' => 'en attente',
            'utilisateur_id' => 1, // Assurez-vous que cet ID existe dans votre table `utilisateurs`
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
