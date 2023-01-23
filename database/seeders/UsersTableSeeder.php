<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
          ['name' => 'Administrator', 'role' => 'admin', 'email' => 'florin@restaurant.com', 'password' => Hash::make
          ('parola')],
          ['name' => 'Ospatar', 'role' => 'ospatar', 'email' => 'ospatar@restaurant.com', 'password' => Hash::make('parola')],
          ['name' => 'Bucatarie', 'role' => 'bucatarie', 'email' => 'bucatarie@restaurant.com', 'password' => Hash::make('parola')],
          ['name' => 'Barman', 'role' => 'barman', 'email' => 'barman@restaurant.com', 'password' => Hash::make('parola')],
        ]);
    }

}
