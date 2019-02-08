<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Regions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso',45)->nullable();
            $table->string('iso3',45)->nullable();
            $table->string('fips',45)->nullable();
            $table->string('country',45)->nullable();
            $table->string('continent',45)->nullable();
            $table->string('currency_code',45)->nullable();
            $table->string('currency_name',45)->nullable();
            $table->string('phone_prefix',45)->nullable();
            $table->string('postal_code',45)->nullable();
            $table->string('lang',45)->nullable();
            $table->string('languages',45)->nullable();
            $table->string('geonameid',45)->nullable();
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
        Schema::dropIfExists('regions');
    }
}
