<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom", "debit", "validite", "price"
    ];

    public function listeDesAbonnements () {

        return $this -> belongsToMany(ListeDesAbonnement::class, 'liste_des_abonnement_abonnement');
    }
}
