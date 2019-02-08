<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->string('fullname',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('password',255)->nullable();
            $table->string('gender',25)->nullable();
            $table->string('avata',255)->nullable();
            $table->dateTime('birthday');
            $table->text('about')->nullable();
            $table->string('remember_token',255)->nullable();
            $table->string('confirmation_code',255)->nullable();
            $table->string('api_token',255)->nullable();
            $table->enum('status', ['pending','active','delete','blacklist']);
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
        Schema::dropIfExists('users');
    }
}
