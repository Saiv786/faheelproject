<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgAndRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::table('users', function (Blueprint $table) {
            //
            $table->text('image_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')
             ->references('id')->on('roles')
             ->onDelete('set null');
            $table->index(['role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropColumn('image_url');
            
        });

    }
}
