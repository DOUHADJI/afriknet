<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory;

    use Notifiable;

    protected $guard = 'client';


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $fillable = [
        'name', 'prenom', 'email', "password", "pays", 'ville', 'contact', 'type' , 'statut_activite', 'barcode_number'
    ];

    
    public function requetes_plaintes(){

            return $this -> hasMany(requetes_plaintes::class, 'client_id');
    }

}
