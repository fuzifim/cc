<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->string('SolrID',500)->nullable();
            $table->integer('parent_id');
            $table->integer('NganhNgheID');
            $table->string('Lv1',500)->nullable();
            $table->string('Lv2',500)->nullable();
            $table->string('Lv3',500)->nullable();
            $table->string('Lv4',500)->nullable();
            $table->string('Lv5',500)->nullable();
            $table->longText('categories_elements')->nullable();
            $table->integer('sort_order');
            $table->enum('show_type', ['main', 'product','post']);
            $table->enum('language', ['vi', 'en']);
            $table->integer('categories_level');
            $table->string('seo_keyword',500)->nullable();
            $table->string('seo_description',500)->nullable();
            $table->string('seo_img',500)->nullable();
            $table->string('icon',500)->nullable();
            $table->string('icon_bootrap',500)->nullable();
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
        Schema::dropIfExists('fields');
    }
}
