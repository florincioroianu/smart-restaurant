<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->index('stock_id');
            $table->index('menu_id');
            $table->integer('starting_stock')->default(0)->nullable();
            $table->integer('current_stock')->default(0)->nullable();
            $table->string('type');
            $table->text('description')->nullable();
            $table->date('inventory_date');
            $table->timestamps();

            $table->foreignId('menu_id')->references('id')->on('menus');
            $table->foreignId('stock_id')->references('id')->on('stocks');
            $table->foreign('type')->references('type')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
