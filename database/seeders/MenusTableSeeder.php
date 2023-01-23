<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            ['name' => 'Aperitiv rece', 'category_id' => 1, 'price' => 20],
            ['name' => 'Aperitiv x', 'category_id' => 1, 'price' => 25],

            ['name' => 'Salata castraveti', 'category_id' => 2, 'price' => 5],
            ['name' => 'Salata rosii', 'category_id' => 2, 'price' => 5],
            ['name' => 'Salata Caesar', 'category_id' => 2, 'price' => 10],

            ['name' => 'Ciorba de burta', 'category_id' => 4, 'price' => 15],
            ['name' => 'Ciorba de legume', 'category_id' => 4, 'price' => 15],
            ['name' => 'Ciorba Radauteana', 'category_id' => 4, 'price' => 15],
            ['name' => 'Supa-crema de legume', 'category_id' => 4, 'price' => 12],
            ['name' => 'Supa de pui', 'category_id' => 4, 'price' => 17],

            ['name' => 'Burger XXL', 'category_id' => 6, 'price' => 20],
            ['name' => 'Aripioare picante', 'category_id' => 6, 'price' => 15],
            ['name' => 'Crispy strips', 'category_id' => 6, 'price' => 12],

            ['name' => 'Ou ochi', 'category_id' => 7, 'price' => 8],
            ['name' => 'Omleta cu branza', 'category_id' => 7, 'price' => 10],

            ['name' => 'Inghetata', 'category_id' => 8, 'price' => 5],
            ['name' => 'Papanasi', 'category_id' => 8, 'price' => 7],
            ['name' => 'Savarina', 'category_id' => 8, 'price' => 5],


            ['name' => 'Jack Daniels', 'category_id' => 9, 'price' => 45],
            ['name' => 'Timisoreana', 'category_id' => 10, 'price' => 8],
            ['name' => 'Ursus', 'category_id' => 10, 'price' => 8],
            ['name' => 'Heineken', 'category_id' => 10, 'price' => 12],
            ['name' => 'Suc de mere', 'category_id' => 14, 'price' => 6],
            ['name' => 'Suc de capsuni', 'category_id' => 14, 'price' => 7],
            ['name' => 'Bucovina', 'category_id' => 15, 'price' => 4],
            ['name' => 'Izvorul minunilor', 'category_id' => 15, 'price' => 4],
        ]);
    }
}
