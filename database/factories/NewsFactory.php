<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'content' => $this->faker->paragraphs(3, true),
            'image_path' => 'images/news/' . $this->faker->image(
                    storage_path('app/public/images/news'),
                    640,
                    480,
                    null,
                    false
                ),
            // 60 % шанса, что новость активна
            'is_active' => $this->faker->boolean(60),
            // Дата публикации в пределах последних двух месяцев
            'published_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
