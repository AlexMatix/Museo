<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Photography;

class CreatePhotographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographies', function (Blueprint $table) {

            $table->increments('idPhotography');
            $table->dateTime('date');
            $table->string('photographer',45);
            $table->text('description');
            $table->string('path',45);
            $table->integer('idObject')->unsigned();
            $table->tinyInteger('deleted')->default(Photography::ACTIVE);
            $table->timestamps();


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
        Schema::dropIfExists('photographies');
    }
}
