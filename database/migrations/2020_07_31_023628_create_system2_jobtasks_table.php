<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem2JobtasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system2_jobtasks', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('employee');
            $table->string('job_name');
            $table->string('job_type');
            $table->date('job_task_date');
            $table->unsignedBigInteger('job_number_days');
            $table->string('status');
            $table->string('job_note');
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
        Schema::dropIfExists('system2_jobtasks');

    }
}
