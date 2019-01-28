<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserIntoFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_into_fields', function (Blueprint $table) {
            $table->increments('idUserIntoField');
            $table->string('shortname',45);
            $table->string('name',45);
            $table->string('datatype',45);
            $table->string('description',45);
            $table->string('descriptionformat',45);
            $table->string('required',45);
            $table->string('locked',45);
            $table->string('visible',45);
            $table->string('forceunique',45);
            $table->string('defaultdata',45);
            $table->string('defaultdataformat',45);
            $table->string('param1',45);
            $table->string('param2',45);
            $table->string('param3',45);
            $table->integer('categoryid')->unsigned();
            //Definimos las llaves foraneas.
            $table->foreign('categoryid')->references('idUserIntoCategories')->on('user_into_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_into_fields');
    }
}
