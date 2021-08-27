<?php

namespace Database\Factories;

use App\Models\clients;
use Illuminate\Database\Eloquent\Factories\Factory;

class clientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = clients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->firstName(),
            'prenom'=>$this->faker->lastName(),
            'email' =>$this->faker->email(),
            'password'=>$this->faker->password(),
            'pays' => $this ->faker ->country(),
            'ville'=> $this ->faker -> city(),
            'contact' => $this ->faker -> phoneNumber(),
            'type' => "Entreprise",
            'statut_activite' => $this ->faker ->boolean()
        ];
    }
}
