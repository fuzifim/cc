<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Voucher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description',255)->nullable();
            $table->string('voucher_type',255)->nullable();
            $table->integer('discount');
            $table->enum('status', ['pending','active','delete']);
            $table->timestamp('date_start');
            $table->timestamp('date_end');
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
        Schema::dropIfExists('voucher');
    }
}
