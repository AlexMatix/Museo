<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\SubCollection;

class CreateSubCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_collections', function (Blueprint $table) {

            $table->increments('idSubCollection');
            $table->string('title', 45);
            $table->integer('idCollection')->unsigned();
            $table->tinyInteger('deleted')->default(SubCollection::ACTIVE);
            //Definimos las llaves foraneas.
            $table->foreign('idCollection')->references('idCollection')->on('collections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_collections');
    }
}
