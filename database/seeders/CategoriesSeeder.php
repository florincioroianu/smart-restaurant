<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Aperitive', 'type' => 'Mancare', 'is_main_dish' => true],
            ['name' => 'Salate', 'type' => 'Mancare', 'is_main_dish' => true],
            ['name' => 'Specialitati', 'type' => 'Mancare', 'is_main_dish' => true],
            ['name' => 'Supe/Ciorbe', 'type' => 'Mancare', 'is_main_dish' => true],
            ['name' => 'Vegetarian', 'type' => 'Mancare', 'is_main_dish' => true],
            ['name' => 'Fast-Food', 'type' => 'Mancare', 'is_main_dish' => true],
            ['name' => 'Minuturi', 'type' => 'Mancare', 'is_main_dish' => true],
            ['name' => 'Desert', 'type' => 'Mancare', 'is_main_dish' => true],

            ['name' => 'Whisky', 'type' => 'Bautura', 'is_main_dish' => true],
            ['name' => 'Bere', 'type' => 'Bautura', 'is_main_dish' => true],
            ['name' => 'Vodka', 'type' => 'Bautura', 'is_main_dish' => true],
            ['name' => 'Gin', 'type' => 'Bautura', 'is_main_dish' => true],
            ['name' => 'Cocktail', 'type' => 'Bautura', 'is_main_dish' => true],
            ['name' => 'Suc natural', 'type' => 'Bautura', 'is_main_dish' => true],
            ['name' => 'Apa', 'type' => 'Bautura', 'is_main_dish' => true],
        ]);
    }
}
