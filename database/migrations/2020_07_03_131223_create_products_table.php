<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('name_ar');
            $table->text('description_en');
            $table->text('description_ar');
            $table->char('purchase_price', 20)->nullable();
            $table->char('price', 20)->nullable();
            $table->char('sale_price', 20)->nullable();
            // $table->string('packaging_method')->nullable();
            // $table->string('cutting_method')->nullable();
            $table->string('categories')->nullable();
            $table->string('sku')->nullable();
            $table->string('stock_status')->nullable();
            $table->char('stock_quantity', 20)->nullable();
            $table->char('weight', 20)->nullable();
            $table->enum('shipping', ['no','free','fixed'])->nullable();
            $table->string('image');
            $table->boolean('digital_product')->default(false);
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
        Schema::dropIfExists('products');
    }
}
