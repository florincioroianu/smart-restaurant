<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(TypesSeeder::class);
        $this->call(UserRolesSeeder::class);
        $this->call(OrderStatusesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(InventorySeeder::class);

    }
}
