<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MailServer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_server', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',255)->nullable();
            $table->string('type',255)->nullable();
            $table->integer('user_id');
            $table->integer('service_attribute_id');
            $table->enum('status', ['active','delete','pending','disabled']);
            $table->timestamp('date_begin')->default(null);
            $table->timestamp('date_end')->default(null);
            $table->timestamp('time_notify')->default(null);
            $table->integer('notify');
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
        Schema::dropIfExists('mail_server');
    }
}
