<?php

namespace Database\Seeders;

use App\Models\abonnements;
use Illuminate\Database\Seeder;

class abonnementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        abonnements::factory(2)->create();
    }
}
