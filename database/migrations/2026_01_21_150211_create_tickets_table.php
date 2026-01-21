<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Название
            $table->text('description'); // Описание
            $table->string('category'); // Категория (IT, оборудование и т.д.)
            $table->string('priority'); // Приоритет (низкий, высокий)
            $table->string('status')->default('new'); // Статус (новая, в работе)
            $table->timestamp('deadline')->nullable(); // Срок исполнения
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Связь с автором
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
