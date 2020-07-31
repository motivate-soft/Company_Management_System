<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInvoiceTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_templates', function (Blueprint $table) {
            $table->text('content_ar')->nullable();
            $table->text('short_code')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_templates', function (Blueprint $table) {
            $table->dropColumn(['content_ar', 'short_code']);
        });
    }
}
