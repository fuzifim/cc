<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('money');
            $table->string('bank_code',255)->unsigned();
            $table->string('payment_method',255)->unsigned();
            $table->integer('user_id');
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
        Schema::dropIfExists('pay_order');
    }
}
