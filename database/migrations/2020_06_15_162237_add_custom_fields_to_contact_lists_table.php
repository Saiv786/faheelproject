<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomFieldsToContactListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_lists', function (Blueprint $table) {
            $table->json('custom_fields')->nullable();
        });
        Schema::create('contacts', function (Blueprint $table) {
            $table->json('fields')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_lists', function (Blueprint $table) {
            $table->dropColumn('custom_fields');
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('fields');
        });
    }
}
