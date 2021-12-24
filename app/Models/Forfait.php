<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom", "volume", "validite", "price"
    ];

    public function listeDesForfaits () {

        return $this -> belongsToMany(ListeDesForfait::class, 'liste_des_forfait_forfait');
    }

}
