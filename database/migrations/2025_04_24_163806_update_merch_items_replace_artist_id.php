<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('merch_items', function (Blueprint $table) {
            // Step 1: Drop foreign key and column for artist_id
            $table->dropForeign(['artist_id']);
            $table->dropColumn('artist_id');

            // Step 2: Add user_id column and foreign key
            $table->unsignedBigInteger('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('merch_items', function (Blueprint $table) {
            // Rollback: remove user_id and add artist_id again
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->unsignedBigInteger('artist_id')->after('id');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
        });
    }

};
