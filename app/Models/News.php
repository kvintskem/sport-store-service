<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // Laravel автоматически ожидает таблицу `news`
    protected $fillable = [
        'title',
        'content',
        'image_path',
        'is_active',
        'published_at',
    ];

    // timestamps (created_at, updated_at) включены по умолчанию

    // В данной модели нет внешних связей
}
