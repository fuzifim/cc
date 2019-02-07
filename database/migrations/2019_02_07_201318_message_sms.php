<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessageSms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_sms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',255)->nullable();
            $table->string('message_group',255)->nullable();
            $table->string('from',255)->nullable();
            $table->integer('to');
            $table->string('message_title',500)->nullable();
            $table->mediumText('message_body')->nullable();
            $table->string('message_status',255)->nullable();
            $table->integer('from_del');
            $table->integer('to_del');
            $table->integer('to_del');
            $table->enum('message_send', ['pending','delivery','error','replay','delete']);
            $table->integer('message_send_replay');
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
        Schema::dropIfExists('message_sms');
    }
}
