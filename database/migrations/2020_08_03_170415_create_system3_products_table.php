<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem3ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system3_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('name_of_who_added')->nullable();
            $table->date('date_of_addition')->nullable();
            $table->string('category_type');
            $table->string('brand_type');
            $table->string('country_of_origin');
            $table->string('product_image')->nullable();
            $table->string('product_pdf')->nullable();
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
        Schema::dropIfExists('system3_products');
    }
}
