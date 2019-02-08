<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegionWard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_ward', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('region_district_id');
            $table->string('ward_name',255)->nullable();
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
        Schema::dropIfExists('region_ward');
    }
}
