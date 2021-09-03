<?php

namespace Database\Factories;

use App\Models\clients;
use App\Models\requetes_plaintes;
use Illuminate\Database\Eloquent\Factories\Factory;

class requetes_plaintesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @varg
     */
    protected $model = requetes_plaintes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $types = ["plainte", "requete"];

        $motifs = ["connexion wifi indisponible", "Router ne s'allume pas", "câble  coupé", "Connexion lente", "abonnement coupé", "forfait non reçu"];
         
        $statuts = ["reçu", "ordonné", "en cours de traitement", "traité", "archivé"];
        return [
                "type" =>$types[array_rand($types)],
                "motif"  =>$motifs[array_rand($motifs)],
                "message" => $this -> faker -> realText(),
                "statut"  =>$statuts[array_rand($statuts)],
                "client_id" => clients::factory(),
        ];
    }
}
