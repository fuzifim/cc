<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Company extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('company_name',255)->nullable();
            $table->string('name_encode',300)->nullable();
            $table->string('company_name_en',255)->nullable();
            $table->string('SolrID',500)->nullable();
            $table->string('company_address',500)->nullable();
            $table->integer('nganh_chinh');
            $table->timestamp('company_date_active')->default(null);
            $table->integer('company_region');
            $table->integer('company_subregion');
            $table->integer('company_district');
            $table->integer('company_ward');
            $table->string('company_tax_code',50)->nullable();
            $table->string('noi_dang_ky_quan_ly',255)->nullable();
            $table->dateTime('ngay_cap');
            $table->string('admin_name',50)->nullable();
            $table->string('admin_phone',50)->nullable();
            $table->string('admin_email',50)->nullable();
            $table->mediumText('company_description')->nullable();
            $table->integer('company_views');
            $table->enum('company_status', ['pending', 'active','delete']);
            $table->string('company_type',50)->nullable();
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
        Schema::dropIfExists('company');
    }
}
