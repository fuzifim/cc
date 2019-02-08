<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subregions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subregions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id');
            $table->string('subregions_name',255)->nullable();
            $table->string('long_name',255)->nullable();
            $table->string('short_name',255)->nullable();
            $table->string('formatted_address',255)->nullable();
            $table->string('lat',255)->nullable();
            $table->string('lng',255)->nullable();
            $table->string('SolrID',255)->nullable();
            $table->string('timezone',255)->nullable();
            $table->string('subregions_name_slug',255)->nullable();
            $table->enum('status', ['pending','active','delete']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subregions');
    }
}
