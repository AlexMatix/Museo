<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\ObjectMuseum;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_museums', function (Blueprint $table) {

            $table->increments('idObject');
            $table->string('origin_number', 45);
            $table->string('inventory_number', 45);
            $table->string('catalog_number', 45);
            $table->decimal('appraisal',13,4);
            $table->mediumText('origin_description');
            $table->dateTime('date_of_entry');
            $table->integer('collection_idCollection')->unsigned();
            $table->integer('subCollection_idSubCollection')->unsigned()->nullable();
            $table->integer('type')->unsigned();
            $table->integer('location')->unsigned();
            $table->tinyInteger('deleted')->default(ObjectMuseum::ACTIVE);

            //Definimos las llaves foraneas.
            $table->foreign('collection_idCollection')->references('idCollection')->on('collections');
            $table->foreign('subCollection_idSubCollection')->references('idSubCollection')->on('sub_collections');
            $table->foreign('type')->references('idInventoryCatalogs')->on('inventory_catalogs');
            $table->foreign('location')->references('idInventoryCatalogs')->on('inventory_catalogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
