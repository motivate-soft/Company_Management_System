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
            $table->bigInteger('employee_id');
            $table->string('customer_name');
            $table->string('customer_id');
            $table->string('membership');
            $table->string('entry_type');
            $table->string('entry_name');
            $table->string('position');
            $table->string('mobile_number', 10);
            $table->string('landline_number');
            $table->string('fax', 10);
            $table->string('email')->unique();
            $table->string('zipcode');
            $table->bigInteger('country_id');
            $table->bigInteger('city_id');
            $table->bigInteger('province_id');
            $table->bigInteger('street_id');
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
