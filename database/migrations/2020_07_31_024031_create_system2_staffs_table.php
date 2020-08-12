<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem2StaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system2_staffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('secondname');
            $table->string('lastname');
            $table->unsignedBigInteger('mobile_number');
            $table->string('monthly_salary');
            $table->float('working_hours');
            $table->string('email');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('permission');
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
        Schema::dropIfExists('system2_staffs');
    }
}
