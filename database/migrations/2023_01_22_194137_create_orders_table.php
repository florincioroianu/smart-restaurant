<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->index('user_id');
            $table->string('note')->nullable();
            $table->decimal('total', 10);
            $table->boolean('card_pay')->default(false);
            $table->decimal('sub_total', 10);
            $table->string('status')->default('new')->index();
            $table->timestamps();

            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreign('status')->references('status')->on('order_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
