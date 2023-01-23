<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->index('order_id');
            $table->index('menu_id');
            $table->string('title');
            $table->integer('quantity');
            $table->decimal('total');
            $table->boolean('is_food')->default(true);
            $table->timestamps();

            $table->foreignId('menu_id')->references('id')->on('menus');
            $table->foreignId('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
