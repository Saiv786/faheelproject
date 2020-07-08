<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contact_list_id')->unsigned()->nullable();
            $table->foreign('contact_list_id')
             ->references('id')->on('contact_lists')
             ->onDelete('set null');
            $table->index(['contact_list_id']);

            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();
            $table->string('reply_to')->nullable();
            $table->boolean('track_open')->nullable()->default(false);
            $table->boolean('track_click')->nullable()->default(false);

            $table->integer('template_id')->unsigned()->nullable();
            $table->foreign('template_id')
             ->references('id')->on('templates')
             ->onDelete('set null');
            $table->index(['template_id']);

            $table->integer('schedule_id')->unsigned()->nullable();
             $table->foreign('schedule_id')
             ->references('id')->on('schedules')
             ->onDelete('set null');
            $table->index(['schedule_id']);
            $table->integer('customer_id')->unsigned()->nullable();

            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('next_run_time')->nullable();

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
        Schema::dropIfExists('campaigns');
    }
}
