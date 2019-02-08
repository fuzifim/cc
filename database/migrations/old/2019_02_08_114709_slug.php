<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Slug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slug', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slug_channel');
            $table->string('slug_value',255)->nullable();
            $table->string('slug_table',255)->nullable();
            $table->integer('slug_table_id');
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
        Schema::dropIfExists('slug');
    }
}
