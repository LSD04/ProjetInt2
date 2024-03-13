<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree_sortie extends Model
{
    use HasFactory;

    protected $table = 'entree_sortie';

    protected $fillable = [
        'utilisateur_id',
        'local_id',
        'date_et_heure_entree',
        'date_et_heure_sortie',
        'jour_de_la_semaine',
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    // Relation avec le local
    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }
}
