<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Historical;

class CreateHistoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicals', function (Blueprint $table) {
            $table->increments('idHistorical');
            $table->dateTime('date');
            $table->string('description',45);
            $table->string('lastip',45);
            $table->integer('idUser');
            $table->integer('name');
            $table->tinyInteger('deleted')->default(Historical::ACTIVE);

            //Definimos llaves foraneas
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('name')->references('idCapabilities')->on('capabilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historicals');
    }
}
