<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_assignments', function (Blueprint $table) {
            $table->increments('idRoleAssignments');
            $table->integer('idRole')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->dateTime('timemodified');

            //Definimos llaves foraneas
            $table->foreign('idRole')->references('idRole')->on('roles');
            $table->foreign('idUser')->references('idUser')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_assignments');
    }
}
