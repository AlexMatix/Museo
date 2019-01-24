<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\ObjectInfoField;

class CreateObjectInfoFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_info_fields', function (Blueprint $table) {
            $table->increments('idObjectInfoFields');
            $table->string('shortname');
            $table->string('name');
            $table->string('datatype');
            $table->string('description');
            $table->string('descriptionformat');
            $table->string('required');
            $table->string('locked');
            $table->string('visible');
            $table->string('forceunique');
            $table->string('defaultdataformat');
            $table->string('param1');
            $table->string('param2');
            $table->string('param3');
            $table->string('objectcategoryid');

            $table->tinyInteger('deleted')->default(ObjectInfoField::ACTIVE);

            //Definimos llaves foraneas
            $table->foreign('idMeasure')->references('idInventoryCatalogs')->on('inventory_catalogs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_info_fields');
    }
}