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
            // Основная информация о пользователе
            $table->string('name')->nullable(); // Имя пользователя
            $table->date('date_of_birth')->nullable(); // Дата рождения
            $table->string('email')->nullable(); // Электронная почта
            $table->string('social_number')->nullable(); // Социальный номер

            // Контактная информация
            $table->string('cell_phone')->nullable(); // Мобильный телефон
            $table->string('work_phone')->nullable(); // Рабочий телефон

            // Адресная информация
            $table->string('country')->nullable(); // Страна
            $table->string('state')->nullable(); // Штат/Регион
            $table->string('city')->nullable(); // Город
            $table->string('address')->nullable(); // Адрес
            $table->string('zip_code')->nullable(); // Почтовый индекс
            $table->string('post_index')->nullable(); // Дополнительный индекс

            // Прочая информация
            $table->boolean('is_live')->nullable(); // Живой ли пользователь
            $table->boolean('military_service')->nullable(); // Военная служба
            $table->string('residential_status')->nullable(); // Статус проживания
            $table->integer('address_years')->nullable(); // Количество лет по адресу

            // Уникальный токен
            $table->string('unique_token')->unique(); // Уникальный токен

            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('job_info_id')->nullable();
            $table->unsignedBigInteger('documents_id')->nullable();

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
