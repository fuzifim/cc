<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title',255)->nullable();
            $table->string('title_convert',255)->nullable();
            $table->string('title_encode',255)->nullable();
            $table->string('title_encode',300)->nullable();
            $table->string('image',300)->nullable();
            $table->integer('media_id');
            $table->mediumText('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('source_url',300)->nullable();
            $table->integer('field');
            $table->integer('view');
            $table->enum('status', ['pending','active','disable','delete']);
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
        Schema::dropIfExists('news');
    }
}
