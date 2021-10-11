<?php

namespace Database\Seeders;

use App\Models\liste_des_forfaits;
use Illuminate\Database\Seeder;

class liste_des_forfaitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        liste_des_forfaits::factory(50)->create();
    }
}
