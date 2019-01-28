<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Bibliography;

class CreateBibliographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliographies', function (Blueprint $table) {
            $table->increments('idBibliographies');
            $table->integer('idResearch')->unsigned();
            $table->integer('number');
            $table->string('author',45);
            $table->string('article',45);
            $table->string('title',45);
            $table->string('chapter',45);
            $table->string('chapter_number',45);
            $table->string('editorial',45);
            $table->string('city',45);
            $table->dateTime('date');
            $table->string('pages',45);
            $table->timestamps();

            $table->tinyInteger('deleted')->default(Bibliography::ACTIVE);

            //Definimos llaves foraneas
            $table->foreign('idResearch')->references('idResearch')->on('researches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibliographies');
    }
}
