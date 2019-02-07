<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Domain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain',255)->nullable();
            $table->string('domain_title',255)->nullable();
            $table->string('domain_description',255)->nullable();
            $table->string('domain_keywords',255)->nullable();
            $table->string('domain_image',255)->nullable();
            $table->string('domain_encode',255)->nullable();
            $table->string('domain_encode',255)->nullable();
            $table->integer('view');
            $table->enum('domain_primary', ['default', 'none']);
            $table->string('domain_location',255)->nullable();
            $table->string('registrar',255)->nullable();
            $table->integer('user_id');
            $table->integer('domain_id_registrar');
            $table->integer('service_attribute_id');
            $table->enum('status', ['pending', 'active','delete','waiting','faild','blacklist']);
            $table->timestamp('date_begin')->default(null);
            $table->timestamp('date_end')->default(null);
            $table->timestamp('time_notify')->default(null);
            $table->enum('ssl_active', ['pending', 'active','delete']);
            $table->enum('ads', ['pending', 'active','disable']);
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
        Schema::dropIfExists('customers_services');
    }
}
