<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('posts_title',300)->nullable();
            $table->string('posts_title_convert',300)->nullable();
            $table->longText('posts_description')->nullable();
            $table->integer('posts_type');
            $table->integer('posts_view');
            $table->enum('posts_status', ['draft','pending','active','delete','billing']);
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
        Schema::dropIfExists('posts');
    }
}
