<?php

namespace Database\Seeders;

use App\Models\forfaits;
use Illuminate\Database\Seeder;

class forfaitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        forfaits::factory(4)->create();
    }
}
