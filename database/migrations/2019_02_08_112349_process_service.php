<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcessService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id'));
            $table->string('type',255)->nullable();
            $table->text('content')->nullable();
            $table->integer('replay');
            $table->enum('status', ['pending','active','faild']);
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
        Schema::dropIfExists('process_service');
    }
}
