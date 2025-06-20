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
        Schema::create('news', function (Blueprint $table) {
            $table->id();                               // id BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('title');                    // заголовок новости
            $table->text('content');                    // текст новости
            $table->string('image_path')->nullable();   // путь к изображению (NULLABLE)
            $table->boolean('is_active')->default(false); // флаг активности (по умолчанию false)
            $table->timestamp('published_at')->nullable(); // дата/время публикации (NULLABLE)
            $table->timestamps();                       // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
