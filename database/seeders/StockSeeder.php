<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('stocks')->insert([
            ['name' => 'Depozit central'],
            ['name' => 'Debara'],
            ['name' => 'Subsol']
        ]);
    }
}
