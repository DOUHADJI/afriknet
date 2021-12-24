<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeDesAbonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        "souscri_le", "fini_le", "abonnement_id", "user_id"
    ];

    public function abonnements() {

        return $this -> belongsToMany(Abonnement::class, 'liste_des_abonnement_abonnement');
    }

    public function users() {

        return $this -> belongsToMany(User::class, 'User_liste_des_abonnement');
    }

}
