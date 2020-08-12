<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystem2PermissionPermissiongroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system2_permission_permissiongroup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('permissiongroup_id');
            $table->timestamps();

            $table->foreign('permission_id')->references('id')->on('system2_permissions')->onDelete('cascade');
            $table->foreign('permissiongroup_id')->references('id')->on('system2_permissiongroups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system2_permission_permissiongroup');
    }
}
