<?php

namespace Database\Factories;

use App\Models\abonnements;
use App\Models\clients;
use App\Models\liste_des_abonnements;
use Illuminate\Database\Eloquent\Factories\Factory;

class liste_des_abonnementsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = liste_des_abonnements::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "souscri_le" => $this->faker ->dateTime(),
            "fini_le" => $this->faker ->dateTime(),
            "abonnement_id" =>abonnements::factory(),
            "client_id" => clients::factory(),
        ];
    }
}
