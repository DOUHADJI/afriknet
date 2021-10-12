<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liste_des_forfaits extends Model
{
    use HasFactory;

    protected $fillable = [
        "souscri_le", "fini_le", "forfait_id", "user_id"
    ];
}
