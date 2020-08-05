<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem1CustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system1_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_employee');
            $table->string('nickname');
            $table->string('customer_name');
            $table->string('entry_type');
            $table->string('entry_name');
            $table->string('position');
            $table->string('mobile_number', 10);
            $table->string('landline_number');
            $table->string('fax', 10);
            $table->string('email')->unique();
            $table->string('zipcode');
            $table->string('country_id');
            $table->string('city_id');
            $table->string('province_id');
            $table->string('street_id');
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
        Schema::dropIfExists('system1_customers');
    }
}
