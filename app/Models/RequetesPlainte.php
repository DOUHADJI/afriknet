<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequetesPlainte extends Model
{
    use HasFactory;

    protected $fillable = [
        
        "statut", "motif", "type", "user_id", "message"
    ];

    public function users()
    {
        return $this->belongsTo(clients::class, 'user_requete_plainte');
    }

}
