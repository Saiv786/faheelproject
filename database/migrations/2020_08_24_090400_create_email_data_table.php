<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('campaign_id')->unsigned()->nullable();
            $table->foreign('campaign_id')
             ->references('id')->on('campaigns')
             ->onDelete('set null');
            $table->index(['campaign_id']);
            $table->integer('contact_id')->unsigned()->nullable();
            $table->foreign('contact_id')
             ->references('id')->on('contacts')
             ->onDelete('set null');
            $table->index(['contact_id']);
            $table->bigInteger('viewed');
            $table->bigInteger('clicked');
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
        Schema::dropIfExists('email_data');
    }
}
