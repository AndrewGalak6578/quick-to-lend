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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('telegram_bot_token')->nullable();
            $table->string('chat_id_1')->nullable();
            $table->string('chat_id_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('telegram_bot_token');
            $table->dropColumn('chat_id_1');
            $table->dropColumn('chat_id_2');
        });
    }
};
