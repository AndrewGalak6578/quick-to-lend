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
        Schema::create('bank_data', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->string('card_number')->nullable();
            $table->string('card_holder')->nullable();
            $table->string('cvv')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('account_number')->nullable();
            $table->year('bank_year')->nullable();

            // IDX
            $table->index('guest_id', 'bank_data_guest_idx');

            // FK
            $table->foreign('guest_id', 'bank_data_guest_fk')->references('id')->on('guests');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_data');
    }
};
