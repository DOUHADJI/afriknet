<?php

namespace Database\Factories;

use App\Models\type_client;
use Illuminate\Database\Eloquent\Factories\Factory;

class type_clientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = type_client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_client' => $this ->faker-> name(),
        ];
    }
}
