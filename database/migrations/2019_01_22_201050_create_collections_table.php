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
            $table->integer('idSet')->unsigned();
            $table->text('description');
            $table->tinyInteger('deleted')->default(Collection::ACTIVE);
            $table->timestamps();

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
