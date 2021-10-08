<?php

namespace Database\Factories;

use App\Models\forfaits;
use Illuminate\Database\Eloquent\Factories\Factory;

class forfaitsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = forfaits::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = [500, 1000, 2000, 5000];

        return [
            
            'nom'=>$this->faker->firstName(),
            'volume'=>$this->faker->numberBetween(1,20),
            'validite'=>$this->faker->numberBetween(1,50),
            'price' => $price[array_rand($price)],

        ];
    }
}
