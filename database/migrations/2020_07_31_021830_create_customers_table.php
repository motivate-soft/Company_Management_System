<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_employee');
            $table->string('nickname');
            $table->string('customer_name');
            $table->string('entity_type');
            $table->string('entity_name');
            $table->string('position');
            $table->string('mobile_number', 10);
            $table->string('landline_number');
            $table->string('fax', 10);
            $table->string('email')->unique();
            $table->string('zipcode');
            $table->string('country')->nullable();
            $table->string('city');
            $table->string('district');
            $table->string('street');
            $table->string('address');
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
        Schema::dropIfExists('customers');
    }
}
