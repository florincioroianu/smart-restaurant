<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            ['role'=>'admin'],
            ['role'=>'manager'],
            ['role'=>'ospatar'],
            ['role'=>'bucatarie'],
            ['role'=>'barman'],
        ]);
    }
}
