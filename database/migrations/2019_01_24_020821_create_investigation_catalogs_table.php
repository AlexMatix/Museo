<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\InvestigationCatalog;

class CreateInvestigationCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_catalogs', function (Blueprint $table) {

            $table->increments('idInvestigationCatalog');
            $table->string('title',45);
            $table->text('description',45);
            $table->tinyInteger('deleted')->default(InvestigationCatalog::ACTIVE);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigation_catalogs');
    }
}
