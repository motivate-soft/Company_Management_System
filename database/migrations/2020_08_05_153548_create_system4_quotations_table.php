<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem4QuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system4_quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id');
            $table->bigInteger('customer_id');
            $table->biginteger('membership_number')->nullable();
//            $table->string('filename')->nullable();
            $table->string('project_name');
            $table->double('discount_rate');
            $table->string('status')->default('UnderStudying');
//            $table->string('products_id')->nullable();
//            $table->string('quantity');
            $table->bigInteger('report_id')->nullable();
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
        Schema::dropIfExists('system4_quotations');
    }
}
