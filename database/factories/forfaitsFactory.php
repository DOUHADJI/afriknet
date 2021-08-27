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
        return [
            
            'nom'=>$this->faker->firstName(),
            'volume'=>$this->faker->numberBetween(1,20),
            'validite'=>$this->faker->numberBetween(1,50),
        ];
    }
}
