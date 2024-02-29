<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EntreeSortieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'utilisateur_id' => 1, // Remplacer par un ID utilisateur valide
                'local_id' => 1, // Remplacer par un ID local valide
                'date_et_heure_entree' => Carbon::now()->subDays(1)->setHour(8)->setMinute(30),
                'date_et_heure_sortie' => Carbon::now()->subDays(1)->setHour(17)->setMinute(0),
                'jour_de_la_semaine' => 'Lundi',
                'statut' => 'Entrée',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'utilisateur_id' => 2, // Remplacer par un ID utilisateur valide
                'local_id' => 1, // Remplacer par un ID local valide
                'date_et_heure_entree' => Carbon::now()->subDays(2)->setHour(9)->setMinute(0),
                'date_et_heure_sortie' => Carbon::now()->subDays(2)->setHour(18)->setMinute(0),
                'jour_de_la_semaine' => 'Mardi',
                'statut' => 'Sortie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajouter d'autres enregistrements selon vos besoins
        ];

        DB::table('entree_sortie')->insert($data);
    }
}

