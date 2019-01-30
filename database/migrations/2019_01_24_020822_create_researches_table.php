<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Research;

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

            $table->increments('idResearch');
            $table->string('title',45);
            $table->string('technique_materials',45);
            $table->dateTime('date');
            $table->binary('signing_marks');
            $table->string('signing_description',45);
            $table->string('short_description',45);
            $table->mediumText('formal_description',45);
            $table->mediumText('observations',45);
            $table->integer('author')->unsigned();
            $table->integer('origin')->unsigned();
            $table->integer('period')->unsigned();
            $table->integer('idObject')->unsigned();
            $table->tinyInteger('deleted')->default(Research::ACTIVE);

            //Definimos las llaves foraneas.
            $table->foreign('idObject')->references('idObject')->on('object_museums');
            $table->foreign('author')->references('idInvestigationCatalog')->on('investigation_catalogs');
            $table->foreign('origin')->references('idInvestigationCatalog')->on('investigation_catalogs');
            $table->foreign('period')->references('idInvestigationCatalog')->on('investigation_catalogs');

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
