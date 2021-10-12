<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liste_des_abonnements extends Model
{
    use HasFactory;

    protected $fillable = [
        "souscri_le", "fini_le", "abonnement_id", "user_id"
    ];
}
