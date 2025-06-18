<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    // Связываем фабрику с моделью Product
    protected $model = Product::class;

    public function definition(): array
    {
        // Генерируем случайное имя товара, более реалистично – «Слово + число»
        $word = ucfirst($this->faker->unique()->words(2, true));

        return [
            'name' => $word,
            'description' => $this->faker->text(200),
            // Связываем с существующей категорией или создаём новую, если ещё нет ни одной
            'category_id' => Category::factory(),
            // Цена от 500 до 50 000
            'price' => $this->faker->numberBetween(500, 50000),
            // Генерация фейкового пути к картинке (можно позже перенести реальные изображения в public/images/products)
            'image_path' => 'images/products/' . $this->faker->image(
                    storage_path('app/public/images/products'),
                    640,
                    480,
                    null,
                    false
                ),
            // С вероятностью 1/5 делаем недоступным
            'availability' => $this->faker->boolean(80),
        ];
    }
}
