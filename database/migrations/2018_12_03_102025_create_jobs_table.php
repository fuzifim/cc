<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'mongodb';
    public function up()
    {
        Schema::connection($this->connection)
            ->table('jobs', function (Blueprint $collection)
            {
                $collection->bigIncrements('id');
                $collection->string('queue')->index();
                $collection->longText('payload');
                $collection->unsignedTinyInteger('attempts');
                $collection->unsignedInteger('reserved_at')->nullable();
                $collection->unsignedInteger('available_at');
                $collection->unsignedInteger('created_at');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
            ->table('jobs', function (Blueprint $collection)
            {
                $collection->drop();
            });
    }
}
