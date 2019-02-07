<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Media extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->string('media_name',255)->nullable();
            $table->string('media_id_random',255)->nullable();
            $table->string('media_title',255)->nullable();
            $table->string('media_content',500)->nullable();
            $table->string('media_path',255)->nullable();
            $table->string('media_size',255)->nullable();
            $table->string('media_type',255)->nullable();
            $table->mediumText('media_url')->nullable();
            $table->mediumText('media_url_thumb')->nullable();
            $table->mediumText('media_url_small')->nullable();
            $table->mediumText('media_url_xs')->nullable();
            $table->enum('media_storage', ['local','google','amazon','youtube','files','video']);
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
        Schema::dropIfExists('media');
    }
}
