<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class abonnements extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom", "volume", "validite"
    ];

   
}
