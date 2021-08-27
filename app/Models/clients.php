<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name', 'prenom', 'email', "password", "pays", 'ville', 'contact', 'type' 
    ];
public function type() {

    return $this -> belongsTo(type_client::class);
}

}
