<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimensions', function (Blueprint $table) {

            $table->increments('idDimension');
            $table->string('height_with_base',45);
            $table->string('width_with_base',45);
            $table->string('width_with_base',45);
            $table->string('width_with_base',45);
            $table->float('height');
            $table->string('width',45);
            $table->string('depth',45);
            $table->string('diameter',45);
            $table->integer('idMeasure')->unsigned();
            $table->integer('idObject')->unsigned();

            $table->tinyInteger('deleted')->default(Bibliography::ACTIVE);

            //Definimos llaves foraneas
            $table->foreign('idMeasure')->references('idInventoryCatalogs')->on('inventory_catalogs');
            $table->foreign('idObject')->references('idobject')->on('objects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dimensions');
    }
}
