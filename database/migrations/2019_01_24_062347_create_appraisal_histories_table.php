<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\AppraisalHistory;

class CreateAppraisalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal_histories', function (Blueprint $table) {
            $table->increments('idAppraisalHistories');
            $table->integer('idobject')->unsigned();
            $table->decimal('previous_appraisal',13,4);
            $table->decimal("new_appraisal",13,4);
            $table->dateTime('date');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('authorized_by')->unsigned()->nullable();

            $table->tinyInteger('deleted')->default(AppraisalHistory::ACTIVE);

            //definimos llavez foraneas.

            $table->foreign('idobject')->references('idobject')->on('objects');
            $table->foreign('updated_by')->references('idUser')->on('users');
            $table->foreign('authorized_by')->references('idUser')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appraisal_histories');
    }
}
