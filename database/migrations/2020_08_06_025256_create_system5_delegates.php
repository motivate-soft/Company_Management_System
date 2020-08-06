<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem5Delegates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system5_delegates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('position');
            $table->string('mobile');
            $table->string('telephone');
            $table->string('email');
            $table->string('notes');
            $table->string('cardimage');
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
        Schema::dropIfExists('system5_delegates');
    }
}
