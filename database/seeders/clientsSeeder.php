<?php

namespace Database\Seeders;

use App\Models\clients;
use Illuminate\Database\Seeder;

class clientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          clients::factory(134)->create();

        
    }
}
