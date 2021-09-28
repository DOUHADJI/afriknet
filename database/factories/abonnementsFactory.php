<?php

namespace Database\Factories;

use App\Models\abonnements;
use Illuminate\Database\Eloquent\Factories\Factory;

class abonnementsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = abonnements::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ab = [ 10 , 50];

        return [

            
            'nom'=>$this->faker->firstName(),
            'debit'=>$ab[array_rand($ab)],
            'validite'=>$this->faker->numberBetween(1,100),

        ];
    }
}
