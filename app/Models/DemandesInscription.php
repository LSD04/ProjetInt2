<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utilisateur;
use App\Models\Local;


class DemandesInscription extends Model
{
    use HasFactory;

   
    protected $table = 'demandes_inscription';

    // Spécifier les champs qui peuvent être assignés en masse
    protected $fillable = [
        'nom',
        'prenom',
        'adresse_email',
        'date_demande',
        'local_id',
        'statutDemande', // Exemples de valeurs: 'en attente', 'approuvée', 'refusée'
        'utilisateur_id' // Assumer que chaque demande est liée à un utilisateur
    ];

    // Casts pour les champs spéciaux (comme des booléens, des dates, etc.)
    protected $casts = [
        'date_demande' => 'datetime',
    ];

    // Relations
    // Exemple: si chaque demande est liée à un utilisateur spécifique
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
    
    public function local()
{
    return $this->belongsTo(Local::class, 'local_id');
}
   
}




