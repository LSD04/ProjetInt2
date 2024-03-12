<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandesInscription extends Model
{
    use HasFactory;

    protected $table = 'demandes_inscription';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse_email',
        'date_demande',
        'local_id',
        'statutDemande',
        'utilisateur_id',
    ];

    protected $casts = [
        'date_demande' => 'datetime',
    ];

    // Relation avec l'utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
    
    // Relation avec le local
    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }
}
