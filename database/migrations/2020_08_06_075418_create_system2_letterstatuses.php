<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem2Letterstatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system2_letterstatuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('ar_name');
            $table->string('person');
            $table->unsignedBigInteger('state')->default(0);
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
        Schema::dropIfExists('system2_letterstatuses');
    }
}
