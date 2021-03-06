<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Movement;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('idMovement');
            $table->integer('idObject')->unsigned();
            $table->integer('idExhibition')->unsigned();
            $table->string('policy');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->tinyInteger('deleted')->default(Movement::ACTIVE);

            $table->foreign('idObject')->references('idObject')->on('object_museums');
            $table->foreign('idExhibition')->references('idExhibition')->on('exhibitions');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
