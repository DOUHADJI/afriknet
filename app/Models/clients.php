<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'prenom', 'email', "password", "pays", 'ville', 'contact', 'type' , 'statut_activite'
    ];


}
