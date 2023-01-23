<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('order_statuses')->insert([
            ['status'=>'new'],
            ['status'=>'received'],
            ['status'=>'processed'],
            ['status'=>'delivered'],
            ['status'=>'paid'],
        ]);
    }
}
