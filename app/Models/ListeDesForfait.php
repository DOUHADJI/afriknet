<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeDesForfait extends Model
{
    use HasFactory;

    protected $fillable = [
        "souscri_le", "fini_le", "forfait_id", "user_id"
    ];

    public function forfaits() {

        return $this -> belongsToMany(Forfait::class, 'liste_des_forfait_forfait');
    }

    public function users() {

        return $this -> belongsToMany(User::class, 'User_liste_des_forfait');
    }

}
