<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserIntoDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_into_datas', function (Blueprint $table) {
            $table->increments('idUserIntoData');
            $table->integer('idUser')->unsigned();
            $table->integer('idUserInfoField')->unsigned();
            $table->string('data',45);
            $table->string('dataFormat',45);

            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idUserInfoField')->references('idUserIntoField')->on('user_into_fields');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_into_datas');
    }
}
