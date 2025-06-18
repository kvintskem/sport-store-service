<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Создаём ровно 10 категорий — фабрика сама позаботится о названиях
        Category::factory(10)->create();
    }
}
