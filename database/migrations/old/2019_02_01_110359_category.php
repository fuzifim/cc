<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('category_name',255)->nullable();
            $table->mediumText('category_description')->nullable();
            $table->integer('parent_id');
            $table->string('type',255)->nullable();
            $table->integer('category_order_by');
            $table->enum('category_status', ['pending', 'active','delete']);
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
        Schema::dropIfExists('category');
    }
}
