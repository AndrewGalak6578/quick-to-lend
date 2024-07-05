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
        Schema::create('documents', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->string('driving_number')->nullable();
            $table->string('driving_front')->nullable();
            $table->string('driving_back')->nullable();
            $table->string('id_front')->nullable();
            $table->string('id_back')->nullable();
            $table->string('passport')->nullable();
            $table->string('selfie')->nullable();

            // IDX
            $table->index('guest_id', 'documents_guest_idx');

            // FK
            $table->foreign('guest_id', 'documents_guest_fk')->references('id')->on('guests');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
