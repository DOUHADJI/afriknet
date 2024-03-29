<?php

namespace Database\Factories;

use App\Models\clients;
use App\Models\forfaits;
use App\Models\liste_des_forfaits;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class liste_des_forfaitsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = liste_des_forfaits::class;

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
            "forfait_id" =>$this ->faker -> numberBetween(1,4),
            "user_id" => $this ->faker -> numberBetween(1,50),
        ];
    }
}
