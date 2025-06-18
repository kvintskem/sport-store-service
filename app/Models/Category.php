<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Никаких дополнительных полей, Laravel автоматически ожидает таблицу `categories`
    protected $fillable = [
        'name',
    ];

    // timestamps (created_at, updated_at) включены по умолчанию

    /**
     * Одна категория имеет много товаров.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
