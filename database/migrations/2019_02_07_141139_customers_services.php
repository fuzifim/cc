<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomersServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('services_name',255)->nullable();
            $table->enum('service_from', ['channel', 'domain','hosting','server','other']);
            $table->integer('services_id');
            $table->integer('customers');
            $table->integer('user_id');
            $table->timestamp('customers_services_date_add')->default(null);
            $table->timestamp('customers_services_date_expired')->default(null);
            $table->enum('customers_services_status', ['active', 'pending','delete']);
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
