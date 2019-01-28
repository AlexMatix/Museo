<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Exhibition;

class CreateExhibitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->increments('idExhibition');
            $table->integer('idOrganization')->unsigned();
            $table->string('name',45);
            $table->dateTime('star_date');
            $table->dateTime('end_date');
            $table->string('place',45);
            $table->string('contact_name',45);
            $table->string('telephone',45);
            $table->string('fax',45);
            $table->string('email',45);
            $table->string('address',45);
            $table->tinyInteger('deleted')->default(Exhibition::ACTIVE);
            $table->timestamps();

            //Definimos llaves foraneas
            $table->foreign('idOrganization')->references('idOrganization')->on('organizations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibitions');
    }
}
