<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChannelAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_attribute', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('channel_parent_id')->unsigned();
            $table->foreign('channel_parent_id')->references('id')->on('channel')->onDelete('cascade');
            $table->string('channel_attribute_type',255)->nullable();
            $table->longText('channel_attribute_value')->nullable();
            $table->enum('channel_attribute_status', ['pending', 'active','delete']);
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
        Schema::dropIfExists('channel_attribute');
    }
}
