<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('post_tag', function (Blueprint $table) {
                $table->dropForeign(['post_id']);
    $table->dropForeign(['tag_id']);

    $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_tag', function (Blueprint $table) {
            //
        });
    }
};
