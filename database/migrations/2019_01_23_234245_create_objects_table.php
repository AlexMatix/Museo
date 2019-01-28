<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Object;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {

            $table->increments('idObject');
            $table->string('origin_number', 45);
            $table->string('inventory_number', 45);
            $table->string('catalog_number', 45);
            $table->decimal('appraisal',13,4);
            $table->mediumText('origin_description');
            $table->dateTime('date_of_entry');
            $table->timestamps();

            $table->integer('collection_idCollection')->unsigned();
            $table->integer('subCollection_idSubCollection')->unsigned()->nullable();
            $table->integer('type')->unsigned();
            $table->integer('location')->unsigned();

            $table->tinyInteger('deleted')->default(Object::ACTIVE);

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
