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

           UserSeeder::class,
            abonnementsSeeder::class,
            forfaitsSeeder::class,
           requetes_plaintesSeeder::class,
           liste_des_forfaitsSeeder::class,
           liste_des_abonnementsSeeder::class,
           adminSeeder::class,
          

        ]);
    }
}
