<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable /* implements MustVerifyEmail */
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "pays", 'ville', 'contact', 'type' , 'statut_activite', 'barcode_number','prenom', 'token', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function listeDesAbonnements() {

        return $this -> belongsToMany(ListeDesAbonnement::class,  'User_liste_des_abonnement');
    }



    public function listeDesForfaits () {

        return $this -> belongsToMany(ListeDesForfait::class, 'liste_des_forfait_forfait');
    }


    public function requetesplaintes() {

        return $this -> belongsToMany(RequetesPlainte::class, 'user_requete_plainte');
    }

}
