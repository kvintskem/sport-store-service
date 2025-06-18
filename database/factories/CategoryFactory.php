<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    // Связываем фабрику с моделью Category
    protected $model = Category::class;

    public function definition(): array
    {
        static $index = 0;
        $names = [
            'Обувь', 'Одежда', 'Спортивный инвентарь', 'Фитнес-оборудование',
            'Тренажёры', 'Велосипеды и аксессуары', 'Туристическое снаряжение',
            'Плавательные принадлежности', 'Защита и экипировка', 'Спортивные аксессуары',
        ];
        return [
            'name' => $names[$index++ % count($names)],
        ];
    }
}
