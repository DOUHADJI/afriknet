<?php

namespace Database\Factories;

use App\Models\clients;
use App\Models\User;
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

    
        $names = User::all()->pluck('name')->toArray();
        $emails = User::all()->pluck('email')->toArray();
        $types = ['Entreprise', 'Individu'];

        return [
            'name'=>$this->faker->randomElement($names),
            'prenom'=>$this->faker->lastName(),
            'email' =>$this->faker->unique()->safeEmail(),
            'password'=>$this->faker->password(),
            'pays' => $this ->faker ->country(),
            'ville'=> $this ->faker -> city(),
            'contact' => $this ->faker -> phoneNumber(),
            'type' =>$types[array_rand($types)],
            'statut_activite' => $this ->faker ->boolean(),
            'barcode_number'=>$this-> faker ->ean8(),
        ];
    }
}
