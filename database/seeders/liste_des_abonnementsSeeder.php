<?php

namespace Database\Seeders;

use App\Models\liste_des_abonnements;
use Database\Factories\liste_des_abonnementsFactory;
use Illuminate\Database\Seeder;

class liste_des_abonnementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        liste_des_abonnements::factory(37)->create();
    }
}
