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
        Schema::create('products', function (Blueprint $table) {
            $table->id();                                           // id BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('name');                                 // название товара
            $table->text('description');                            // подробное описание
            $table->unsignedBigInteger('category_id');              // внешний ключ на категорию
            $table->decimal('price', 10, 2);                         // цена (до 99999999.99)
            $table->string('image_path')->nullable();               // путь к изображению (NULLABLE)
            $table->boolean('availability')->default(true);         // статус наличия (true = доступен)
            $table->timestamps();                                   // created_at и updated_at

            // индекс для ускорения выборок по category_id
            $table->index('category_id');

            // внешний ключ, связывающий каждый товар с категорией
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');  // при удалении категории товары удалятся автоматически
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropIndex(['category_id']);
        });
        Schema::dropIfExists('products');
    }
};
