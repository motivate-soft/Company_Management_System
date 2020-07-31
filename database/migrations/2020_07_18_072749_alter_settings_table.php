<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('malath_username');
            $table->string('malath_pssword');
            $table->string('malath_sender');
            $table->string('my_fatoorah_email');
            $table->string('my_fatoorah_password');
            $table->string('my_fatoorah_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['malath_username', 'malath_pssword', 'malath_sender']);
            $table->dropColumn(['my_fatoorah_email', 'my_fatoorah_password', 'my_fatoorah_status']);
        });
    }
}
