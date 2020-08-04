<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem2CommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system2_communications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_type');
            $table->string('entity_name');
            $table->string('letter_authorized');
            $table->string('employee_responsible');
            $table->unsignedBigInteger('number');
            $table->date('date_letter');
            $table->unsignedBigInteger('status_letter');
            $table->string('transaction_explanation');
            $table->string('prepayments');
            $table->string('response')->nullable();
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
        Schema::dropIfExists('system2_communications');
    }
}
