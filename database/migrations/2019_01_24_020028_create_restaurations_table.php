<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Restauration;

class CreateRestaurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurations', function (Blueprint $table) {

            $table->increments('idRestaurations');
            $table->string('state_conservation',45);
            $table->string('materials',45);
            $table->string('analysis',45);
            $table->string('annexes',45);
            $table->dateTime('date');
            $table->integer('idObject')->unsigned();
            $table->tinyInteger('deleted')->default(Restauration::ACTIVE);

            //Definimos las llaves foraneas.
            $table->foreign('idObject')->references('idObject')->on('objects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurations');
    }
}
