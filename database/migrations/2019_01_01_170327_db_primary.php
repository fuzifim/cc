<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbPrimary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',255)->nullable();
            $table->string('fullname',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('password',255)->nullable();
            $table->string('gender',25)->nullable();
            $table->string('avata',255)->nullable();
            $table->dateTime('birthday');
            $table->text('about')->nullable();
            $table->string('remember_token',255)->nullable();
            $table->string('confirmation_code',255)->nullable();
            $table->string('api_token',255)->nullable();
            $table->enum('status', ['pending','active','delete','blacklist']);
            $table->timestamps();
        });
        Schema::create('channel', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('channel_name',255)->nullable();
            $table->mediumText('channel_description')->nullable();
            $table->string('channel_keywords',255)->nullable();
            $table->integer('channel_parent_id');
            $table->integer('user_id');
            $table->integer('service_attribute_id');
            $table->integer('channel_view');
            $table->integer('channel_currency');
            $table->enum('channel_status', ['active', 'pending','billing','delete','test']);
            $table->timestamp('channel_date_billing_active')->nullable();
            $table->timestamp('channel_date_end')->nullable();
            $table->integer('notify');
            $table->timestamp('time_send_notify')->nullable();
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->string('display_name',255)->nullable();
            $table->string('description',255)->nullable();
            $table->timestamps();
        });
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('address',500)->nullable();
            $table->string('address_full',500)->nullable();
            $table->enum('status', ['active', 'pending','delete']);
            $table->timestamps();
        });
        Schema::create('cart_order', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('order_table',255)->nullable();
            $table->integer('table_parent_id');
            $table->enum('status', ['pending', 'active','delete','billing']);
            $table->timestamps();
        });
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
        Schema::create('cloud', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',255)->nullable();
            $table->string('type',255)->nullable();
            $table->integer('user_id');
            $table->integer('service_attribute_id');
            $table->enum('status', ['active', 'delete','pending','disabled']);
            $table->timestamp('date_begin')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->timestamp('time_notify')->nullable();
            $table->integer('notify');
            $table->timestamps();
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('parent_id');
            $table->mediumText('content');
            $table->enum('status', ['pending', 'active','faild','delete']);
            $table->enum('send', ['pending', 'active','faild','delete']);
            $table->integer('replay');
            $table->timestamps();
        });
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('company_name',255)->nullable();
            $table->string('name_encode',300)->nullable();
            $table->string('company_name_en',255)->nullable();
            $table->string('SolrID',500)->nullable();
            $table->string('company_address',500)->nullable();
            $table->integer('nganh_chinh');
            $table->timestamp('company_date_active')->nullable();
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
        Schema::create('customers_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('services_name',255)->nullable();
            $table->enum('service_from', ['channel', 'domain','hosting','server','other']);
            $table->integer('services_id');
            $table->integer('customers');
            $table->integer('user_id');
            $table->timestamp('customers_services_date_add')->nullable();
            $table->timestamp('customers_services_date_expired')->nullable();
            $table->enum('customers_services_status', ['active', 'pending','delete']);
            $table->timestamps();
        });
        Schema::create('domain', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('domain',255)->nullable();
            $table->string('domain_title',255)->nullable();
            $table->string('domain_description',255)->nullable();
            $table->string('domain_keywords',255)->nullable();
            $table->string('domain_image',255)->nullable();
            $table->string('domain_encode',255)->nullable();
            $table->integer('view');
            $table->enum('domain_primary', ['default', 'none']);
            $table->string('domain_location',255)->nullable();
            $table->string('registrar',255)->nullable();
            $table->integer('user_id');
            $table->integer('domain_id_registrar');
            $table->integer('service_attribute_id');
            $table->enum('status', ['pending', 'active','delete','waiting','faild','blacklist']);
            $table->timestamp('date_begin')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->timestamp('time_notify')->nullable();
            $table->enum('ssl_active', ['pending', 'active','delete']);
            $table->enum('ads', ['pending', 'active','disable']);
            $table->timestamps();
        });
        Schema::create('email', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('email_address',255)->nullable();
            $table->enum('email_status', ['pending', 'active','delete']);
            $table->timestamps();
        });
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id')->unsigned();
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
        Schema::create('finance', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('money',255)->nullable();
            $table->string('currency_code',255)->nullable();
            $table->enum('pay_type', ['main', 'product','post']);
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('history', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('history_type',255)->nullable();
            $table->integer('parent_id');
            $table->string('description',255)->nullable();
            $table->enum('from', ['user', 'ip']);
            $table->string('author',255)->nullable();
            $table->timestamps();
        });
        Schema::create('hosting', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',255)->nullable();
            $table->string('type',255)->nullable();
            $table->longText('content')->nullable();
            $table->integer('user_id');
            $table->integer('service_attribute_id');
            $table->enum('status', ['active','delete','pending','disabled']);
            $table->timestamp('date_begin')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->timestamp('date_end_provided')->nullable();
            $table->timestamp('time_notify')->nullable();
            $table->integer('notify');
            $table->timestamps();
        });
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('keyword',255)->nullable();
            $table->string('keyword_encode',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->integer('view');
            $table->integer('insert');
            $table->enum('status', ['active','pending','blacklist','delete']);
            $table->enum('search', ['pending','active']);
            $table->timestamps();
        });
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('like_type', ['like','unlike']);
            $table->string('like_table',255)->nullable();
            $table->integer('table_parent_id');
            $table->enum('from', ['from','ip']);
            $table->string('user_id',255)->nullable();
            $table->timestamps();
        });
        Schema::create('mail_server', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',255)->nullable();
            $table->string('type',255)->nullable();
            $table->integer('user_id');
            $table->integer('service_attribute_id');
            $table->enum('status', ['active','delete','pending','disabled']);
            $table->timestamp('date_begin')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->timestamp('time_notify')->nullable();
            $table->integer('notify');
            $table->timestamps();
        });
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('member_id');
            $table->string('media_name',255)->nullable();
            $table->string('media_id_random',255)->nullable();
            $table->string('media_title',255)->nullable();
            $table->string('media_content',500)->nullable();
            $table->string('media_path',255)->nullable();
            $table->string('media_size',255)->nullable();
            $table->string('media_type',255)->nullable();
            $table->mediumText('media_url')->nullable();
            $table->mediumText('media_url_thumb')->nullable();
            $table->mediumText('media_url_small')->nullable();
            $table->mediumText('media_url_xs')->nullable();
            $table->enum('media_storage', ['local','google','amazon','youtube','files','video']);
            $table->timestamps();
        });
        Schema::create('message_sms', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('type',255)->nullable();
            $table->string('message_group',255)->nullable();
            $table->string('from',255)->nullable();
            $table->integer('to');
            $table->string('message_title',500)->nullable();
            $table->mediumText('message_body')->nullable();
            $table->string('message_status',255)->nullable();
            $table->integer('from_del');
            $table->integer('to_del');
            $table->enum('message_send', ['pending','delivery','error','replay','delete']);
            $table->integer('message_send_replay');
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title',255)->nullable();
            $table->string('title_convert',255)->nullable();
            $table->string('title_encode',255)->nullable();
            $table->string('image',300)->nullable();
            $table->integer('media_id');
            $table->mediumText('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('source_url',300)->nullable();
            $table->integer('field');
            $table->integer('view');
            $table->enum('status', ['pending','active','disable','delete']);
            $table->timestamps();
        });
        Schema::create('oauth_identities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('provider_user_id',300)->nullable();
            $table->string('provider',300)->nullable();
            $table->mediumText('access_token')->nullable();
            $table->timestamps();
        });
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('order_id');
            $table->string('name',300)->nullable();
            $table->string('price',300)->nullable();
            $table->longText('cart')->nullable();
            $table->enum('status', ['pending','active','delete']);
            $table->timestamps();
        });
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
        Schema::create('pay_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('money');
            $table->string('bank_code',255)->nullable();
            $table->string('payment_method',255)->nullable();
            $table->integer('user_id');
            $table->enum('status', ['pending','active','delete']);
            $table->timestamps();
        });
        Schema::create('phone', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('phone_number',255)->nullable();
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id');
            $table->string('posts_title',300)->nullable();
            $table->string('posts_title_convert',300)->nullable();
            $table->longText('posts_description')->nullable();
            $table->integer('posts_type');
            $table->integer('posts_view');
            $table->enum('posts_status', ['draft','pending','active','delete','billing']);
            $table->timestamps();
        });
        Schema::create('process_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('type',255)->nullable();
            $table->text('content')->nullable();
            $table->integer('replay');
            $table->enum('status', ['pending','active','faild']);
            $table->timestamps();
        });
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('iso',45)->nullable();
            $table->string('iso3',45)->nullable();
            $table->string('fips',45)->nullable();
            $table->string('country',45)->nullable();
            $table->string('continent',45)->nullable();
            $table->string('currency_code',45)->nullable();
            $table->string('currency_name',45)->nullable();
            $table->string('phone_prefix',45)->nullable();
            $table->string('postal_code',45)->nullable();
            $table->string('lang',45)->nullable();
            $table->string('languages',45)->nullable();
            $table->string('geonameid',45)->nullable();
            $table->enum('status', ['active','delete']);
            $table->timestamps();
        });
        Schema::create('subregions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('region_id');
            $table->string('subregions_name',255)->nullable();
            $table->string('long_name',255)->nullable();
            $table->string('short_name',255)->nullable();
            $table->string('formatted_address',255)->nullable();
            $table->string('lat',255)->nullable();
            $table->string('lng',255)->nullable();
            $table->string('SolrID',255)->nullable();
            $table->string('timezone',255)->nullable();
            $table->string('subregions_name_slug',255)->nullable();
            $table->enum('status', ['pending','active','delete']);
            $table->timestamps();
        });
        Schema::create('region_district', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('subregions_id');
            $table->string('district_name',255)->nullable();
            $table->string('long_name',255)->nullable();
            $table->string('short_name',255)->nullable();
            $table->string('formatted_address',255)->nullable();
            $table->string('lat',255)->nullable();
            $table->string('lng',255)->nullable();
            $table->string('SolrID',255)->nullable();
            $table->enum('status', ['active','delete']);
            $table->timestamps();
        });
        Schema::create('region_ward', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('region_district_id');
            $table->string('ward_name',255)->nullable();
            $table->string('SolrID',255)->nullable();
            $table->enum('status', ['active','delete']);
            $table->timestamps();
        });
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('services_name',255)->nullable();
            $table->mediumText('services_description')->nullable();
            $table->string('services_type',255)->nullable();
            $table->string('services_value',255)->nullable();
            $table->enum('status', ['active','pending']);
            $table->timestamps();
        });
        Schema::create('slug', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slug_channel');
            $table->string('slug_value',255)->nullable();
            $table->string('slug_table',255)->nullable();
            $table->integer('slug_table_id');
            $table->enum('status', ['pending','active','delete']);
            $table->timestamps();
        });
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('temp_name',255)->nullable();
            $table->text('temp_content')->nullable();
            $table->string('temp_location',255)->nullable();
            $table->string('temp_location_admin',255)->nullable();
            $table->enum('status', ['pending','active','delete']);
            $table->timestamps();
        });
        Schema::create('voucher', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('description',255)->nullable();
            $table->string('voucher_type',255)->nullable();
            $table->integer('discount');
            $table->enum('status', ['pending','active','delete']);
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_end')->nullable();
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
        //
    }
}
