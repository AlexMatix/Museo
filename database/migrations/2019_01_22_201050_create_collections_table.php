<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Collection;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('idCollection');
            $table->string('name', 45);
            $table->text('description');
            $table->integer('idSet')->unsigned();
            $table->tinyInteger('deleted')->default(Collection::ACTIVE);

            //Definimos las llaves foraneas.
            $table->foreign('idSet')->references('idSet')->on('sets');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
