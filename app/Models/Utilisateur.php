<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs'; // Spécifiez explicitement le nom de la table

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'adresse_email',
        'matricule',
        'a_acces', // Assurez-vous que ce champ existe dans votre table si vous souhaitez l'utiliser
     ];

    protected $hidden = ['password'];
    protected $casts = [ 'a_acces' => 'boolean', // Assurez-vous que ce champ existe dans votre table si vous souhaitez l'utiliser
    ];
}
