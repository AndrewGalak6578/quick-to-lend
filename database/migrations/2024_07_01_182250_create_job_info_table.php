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
        Schema::create('job_info', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->string('job_title')->nullable();
            $table->string('employer_name')->nullable();
            $table->integer('employment_length')->nullable();
            $table->decimal('salary', 8, 2)->nullable();

            // IDX
            $table->index('guest_id', 'job_info_guest_idx');

            // FK
            $table->foreign('guest_id', 'job_info_guest_fk')->references('id')->on('main_table');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_info');
    }
};
