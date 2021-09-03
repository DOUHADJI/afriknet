<?php

namespace Database\Seeders;

use App\Models\requetes_plaintes;
use Illuminate\Database\Seeder;

class requetes_plaintesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        requetes_plaintes::factory(35)->create();
    }
}
