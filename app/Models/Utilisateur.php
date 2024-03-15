<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse_email',
        'matricule',
        'a_acces',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'a_acces' => 'boolean',
    ];

    // Relation avec les demandes d'inscription
    public function demandesInscription()
    {
        return $this->hasMany(DemandesInscription::class, 'utilisateur_id');
    }

    // Relation avec les entrées/sorties
    public function entreesSorties()
    {
        return $this->hasMany(Entree_sortie::class, 'utilisateur_id');
    }

    // Supprime les relations et l'utilisateur
    public function deleteWithRelations()
    {
        DB::transaction(function () {
            $this->demandesInscription()->delete();
            $this->entreesSorties()->delete();
            $this->delete();
        });
    }

    public static function createUtilisateur($data)
    {
        $utilisateur = Utilisateur::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'adresse_email' => $data['adresse_email'],
            'password' => Hash::make($data['password']),
            'matricule' => $data['matricule'],
        ]);        
    }
}
