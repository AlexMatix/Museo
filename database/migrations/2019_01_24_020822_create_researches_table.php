<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {

            $table->increments('idResearche');
            $table->string('title',45);
            $table->string('technique_materials',45);
            $table->dateTime('date');
            $table->binary('signing_marks');
            $table->string('signing_description',45);
            $table->string('short_description',45);
            $table->mediumText('formal_description',45);
            $table->mediumText('observations',45);

            $table->integer('author');
            $table->integer('origin');
            $table->integer('period');

            $table->tinyInteger('deleted')->default(Restauration::ACTIVE);

            //Definimos las llaves foraneas.
            $table->foreign('author')->references('idobject')->on('objects');
            $table->foreign('origin')->references('idobject')->on('objects');
            $table->foreign('period')->references('idobject')->on('objects');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researches');
    }
}
