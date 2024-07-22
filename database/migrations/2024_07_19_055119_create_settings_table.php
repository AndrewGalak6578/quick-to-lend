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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('verify_identity')->nullable();
            $table->boolean('selfie_upload')->nullable();
            $table->boolean('selfie_second')->nullable();
            $table->boolean('extra_doc')->nullable();
            $table->string('telegram_bot_token')->nullable();
            $table->string('chat_id_1')->nullable();
            $table->string('chat_id_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
