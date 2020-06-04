<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->datetime('one_time_date')->nullable();
            $table->datetime('one_time_time')->nullable();

            $table->datetime('occur_once_time')->nullable();
            $table->datetime('occur_every_start_time')->nullable();
            $table->datetime('occur_every_end_time')->nullable();
            $table->datetime('recur_duration_start_date')->nullable();
            $table->datetime('recur_duration_end_date')->nullable();
            

            $table->string('recurr_type')->nullable();
            $table->string('occur_every_type')->nullable();
            $table->integer('recurr_frequency')->nullable();
            $table->integer('occur_every_number')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_once')->nullable();
            $table->boolean('is_enabled')->default(true);
            $table->string('cron')->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
