<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Channel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channel_name',255)->nullable();
            $table->mediumText('channel_description')->nullable();
            $table->string('channel_keywords',255)->nullable();
            $table->integer('channel_parent_id');
            $table->integer('user_id');
            $table->integer('service_attribute_id');
            $table->integer('channel_view');
            $table->integer('channel_currency');
            $table->enum('channel_status', ['active', 'pending','billing','delete','test']);
            $table->timestamp('channel_date_billing_active')->default(null);
            $table->timestamp('channel_date_end')->default(null);
            $table->integer('notify');
            $table->timestamp('time_send_notify')->default(null);
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
        Schema::dropIfExists('channel');
    }
}
