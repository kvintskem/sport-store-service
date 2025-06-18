<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Сначала убедимся, что хотя бы 10 категорий уже есть (иначе каждый товар создаст свою категорию)
        // Если вы запускаете CategorySeeder перед этим — можно закомментировать строку ниже
        // \App\Models\Category::factory(10)->create();

        // Создаём 50 товаров. Если категорий уже 10, фабрика просто выберет их для category_id.
        Product::factory(50)->create();
    }
}
