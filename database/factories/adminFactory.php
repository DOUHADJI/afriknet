<?php

namespace Database\Factories;

use App\Models\admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class adminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role = ["L1", "L2", "L3"];

        return [

            'name'     => 'Administrator',
            'email'    => 'admin@localhost.com',
            'role'    => $role[array_rand($role)],
            'password' => Hash::make('password'),
        ];
    }
}
