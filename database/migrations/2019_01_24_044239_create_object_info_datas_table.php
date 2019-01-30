<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\ObjectInfoField;

class CreateObjectInfoDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_info_datas', function (Blueprint $table) {
            $table->increments('idObjectInfoData');
            $table->string('data',45);
            $table->string('dataFormat',45);
            $table->integer('idObject')->unsigned();
            $table->integer('idInfoField')->unsigned();
            $table->tinyInteger('deleted')->default(ObjectInfoField::ACTIVE);

            $table->foreign('idObject')->references('idObject')->on('object_museums');
            $table->foreign('idInfoField')->references('idObjectInfoFields')->on('object_info_fields');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_info_datas');
    }
}
