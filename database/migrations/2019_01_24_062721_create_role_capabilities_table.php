<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleCapabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_capabilities', function (Blueprint $table) {
            $table->increments('idRoleCapabilities');
            $table->integer('idRole')->unsigned();
            $table->integer('name')->unsigned();
            $table->dateTime('timemodified');

            $table->foreign('idRole')->references('idRole')->on('roles');
            $table->foreign('name')->references('idCapabilities')->on('capabilities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_capabilities');
    }
}
