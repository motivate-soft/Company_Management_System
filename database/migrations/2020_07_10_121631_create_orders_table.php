<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('phone');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('address');
            $table->string('payment_method');
            $table->unsignedInteger('bank_id')->nullable();
            $table->unsignedInteger('coupon_id')->nullable();
            $table->float('delivery_fee');
            $table->float('sub_total');
            $table->float('vat');
            $table->float('total');
            $table->string('delivery_time')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
