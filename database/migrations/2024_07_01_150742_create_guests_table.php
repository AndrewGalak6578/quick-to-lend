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
        Schema::create('guests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('residential_status')->nullable();
            $table->integer('address_years')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('social_number')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_live')->nullable();
            $table->string('name')->nullable();
            $table->boolean('military_service')->nullable();
            $table->string('state')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('post_index')->nullable();
            $table->string('unique_token')->unique();
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('job_info_id');
            $table->unsignedBigInteger('documents_id');

            // IDX
            $table->index('bank_id', 'guests_table_bank_idx');
            $table->index('job_info_id', 'guests_table_job_info_idx');
            $table->index('documents_id', 'guests_table_documents_idx');

            // FK
            $table->foreign('bank_id', 'guests_table_bank_fk')->references('id')->on('bank_data');
            $table->foreign('job_info_id', 'guests_table_job_info_fk')->references('id')->on('job_info');
            $table->foreign('documents_id', 'guests_table_documents_fk')->references('id')->on('documents');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
