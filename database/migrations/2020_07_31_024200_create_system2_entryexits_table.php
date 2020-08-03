<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem2EntryExitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system2_entryexits', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date');
            $table->float('entry_hour');
            $table->float('exit_hour');
            $table->float('working_time');
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
        Schema::dropIfExists('system2_entryexits');
    }
}
