<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           Admin::create([
        'name'     => 'Administrator',
        'email'    => 'admin@localhost.com',
        'role'    => 'L3',
        'password' => Hash::make('password'),
    ]);

    Admin::create([
        'name'     => 'Editor',
        'email'    => 'editor@localhost.com',
        'role'    => 'L2',
        'password' => Hash::make('password'),
    ]);

    Admin::create([
        'name'     => 'Operator',
        'email'    => 'operator@localhost.com',
        'role'    => 'L1',
        'password' => Hash::make('password'),
    ]);
    }
}
