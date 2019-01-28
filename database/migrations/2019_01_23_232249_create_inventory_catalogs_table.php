<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\InventoryCatalog;

class CreateInventoryCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_catalogs', function (Blueprint $table) {

            $table->increments('idInventoryCatalogs');
            $table->string('title', 45);
            $table->text('description');
            $table->integer('idInventoryCatalogsParent')->unsigned()->nullable();
            $table->tinyInteger('deleted')->default(InventoryCatalog::ACTIVE);
            //Definimos las llaves foraneas.
//            $table->foreign('idInventoryCatalogs_Catalogs')->references('idInventoryCatalogs')->on('inventory_catalogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_catalogs');
    }
}
