<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_client extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_client'
    ];


    public function client(){
        return $this -> BelongsTo(clients::class);
    }
}
