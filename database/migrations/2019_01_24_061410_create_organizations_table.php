<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Organization;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('idOrganization');
            $table->string('name',45);
            $table->string('telephone',45);
            $table->string('fax',45);
            $table->string('email',45);
            $table->string('url',45);
            $table->string('address',45);
            $table->string('cp',45);
            $table->string('rfc',45);
            $table->string('country',45);
            $table->string('city',45);
            $table->string('state',45);
            $table->string('giro',45);
            $table->string('status',45);
            $table->timestamps();

            $table->tinyInteger('deleted')->default(Organization::ACTIVE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
