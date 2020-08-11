<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem5Companies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system5_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('field');
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('address');
            $table->string('mobile');
            $table->string('email');
            $table->string('telephone');
            $table->string('bankname');
            $table->string('accountname');
            $table->string('accountnumber');
            $table->string('accountiban');
            $table->string('swiftcode');
            $table->string('person');
            $table->string('catalogfile')->nullable();
            $table->string('cardimage')->nullable();
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
        Schema::dropIfExists('system5_companies');
    }
}
