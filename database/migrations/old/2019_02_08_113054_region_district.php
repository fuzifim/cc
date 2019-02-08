<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegionDistrict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_district', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('subregions_id');
            $table->string('district_name',255)->nullable();
            $table->string('long_name',255)->nullable();
            $table->string('short_name',255)->nullable();
            $table->string('formatted_address',255)->nullable();
            $table->string('lat',255)->nullable();
            $table->string('lng',255)->nullable();
            $table->string('SolrID',255)->nullable();
            $table->enum('status', ['active','delete']);
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
        Schema::dropIfExists('region_district');
    }
}
