<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requetes_plaintes extends Model
{
    use HasFactory;

    protected $fillable = [
        
        "statut"
    ];

    public function client()
    {
        return $this->belongsTo(clients::class);
    }
}
