<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\ObjectInfoCategory;

class CreateObjectInfoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_info_categories', function (Blueprint $table) {
            $table->increments('idObjectInfoCategories');
            $table->string('name',45);
            $table->bigInteger('sortorder');

            $table->tinyInteger('deleted')->default(ObjectInfoCategory::ACTIVE);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_info_categories');
    }
}
