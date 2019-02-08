<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_history', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('token',300)->nullable();
            $table->integer('price');
            $table->string('payment_method',25)->nullable();
            $table->string('bank_code',25)->nullable();
            $table->integer('response_code');
            $table->integer('transaction_id');
            $table->integer('order_id');
            $table->string('type',255)->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['failed','success']);
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
        Schema::dropIfExists('pay_history');
    }
}
