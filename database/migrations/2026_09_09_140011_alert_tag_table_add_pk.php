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
        Schema::table('alert_tag', function (Blueprint $table) {
            $table->primary(['alert_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alert_tag', function (Blueprint $table) {
            $table->dropForeign(['alert_id']);
            $table->dropForeign(['tag_id']);
            $table->dropPrimary();
            $table->foreign('alert_id')->references('id')->on('alerts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
};
