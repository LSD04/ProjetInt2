<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree_sortie extends Model
{
    use HasFactory;

    protected $table = 'entree_sortie'; // Nom de la table

    // Définir la relation avec l'utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'user_id');
    }

    // Définir la relation avec le local
    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }
}

