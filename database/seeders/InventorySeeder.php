<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('inventories')->insert([
            ['menu_id'=> 1, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 2, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 3, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 4, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 5, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 6, 'stock_id'=>2, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 7, 'stock_id'=>3, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 8, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 9, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 10, 'stock_id'=>3, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 11, 'stock_id'=>2, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 12, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 13, 'stock_id'=>2, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 14, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 15, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 16, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 17, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 18, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Mancare',
                'inventory_date'=>now()],
            ['menu_id'=> 19, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
            ['menu_id'=> 20, 'stock_id'=>2, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
            ['menu_id'=> 21, 'stock_id'=>3, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
            ['menu_id'=> 22, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
            ['menu_id'=> 22, 'stock_id'=>2, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
            ['menu_id'=> 23, 'stock_id'=>3, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
            ['menu_id'=> 24, 'stock_id'=>2, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
            ['menu_id'=> 25, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
            ['menu_id'=> 26, 'stock_id'=>1, 'starting_stock' => 10, 'current_stock'=> 10, 'type'=>'Bautura',
                'inventory_date'=>now()],
        ]);
    }
}
