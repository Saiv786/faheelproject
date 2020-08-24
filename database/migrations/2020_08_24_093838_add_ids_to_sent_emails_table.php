<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdsToSentEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sent_emails', function (Blueprint $table) {
            //
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
            $table->integer('contact_list_id')->unsigned()->nullable();
            $table->foreign('contact_list_id')
             ->references('id')->on('contact_lists')
             ->onDelete('set null');
            $table->index(['contact_list_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sent_emails', function (Blueprint $table) {
            //
            $table->dropForeign(['campaign_id']);
            $table->dropColumn('campaign_id');
            
            $table->dropForeign(['contact_id']);
            $table->dropColumn('contact_id');
            $table->dropForeign(['contact_list_id']);
            $table->dropColumn('contact_list_id');
            
        });
    }
}
