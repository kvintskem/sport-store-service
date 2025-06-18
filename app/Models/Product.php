<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // Laravel автоматически ожидает таблицу `products`
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'image_path',
        'availability',
    ];

    // timestamps (created_at, updated_at) включены по умолчанию

    /**
     * Товар принадлежит одной категории.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
