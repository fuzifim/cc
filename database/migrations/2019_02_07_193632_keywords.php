<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Keywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keyword',255)->nullable();
            $table->string('keyword_encode',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->integer('view');
            $table->integer('insert');
            $table->enum('status', ['active','pending','blacklist','delete']);
            $table->enum('search', ['pending','active']);
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
        Schema::dropIfExists('keywords');
    }
}
