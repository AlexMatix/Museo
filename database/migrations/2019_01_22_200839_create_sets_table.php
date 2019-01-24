<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Set;


class CreateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->increments('idSet');
            $table->string('title', 45);
            $table->integer('idCommunity');
            $table->text('description');
            $table->tinyInteger('deleted')->default(Set::ACTIVE);

            //Definimos las llaves foraneas.
            $table->foreign('idCommunity')->references('idCommunities')->on('communities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sets');
    }
}
