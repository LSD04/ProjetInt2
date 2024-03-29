<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    protected $table = 'admins';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse_email',
        'matricule',
     ];

     protected $hidden = ['password'];


}
