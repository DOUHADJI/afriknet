<?php

namespace Database\Seeders;

use App\Models\type_client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            
            abonnementsSeeder::class,
            forfaitsSeeder::class,
           type_clientSeeder::class,
           clientsSeeder::class,
           requetes_plaintesSeeder::class,

        ]);
    }
}
