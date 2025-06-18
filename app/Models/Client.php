<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    // Laravel автоматически ожидает таблицу `clients`
    protected $fillable = [
        'telegram_id',
        'first_name',
        'last_name',
        'username',
        'is_subscribed',
    ];

    // Отключаем обновление поля updated_at,
    // т.к. в миграции для clients мы создавали только created_at
    const UPDATED_AT = null;

    /**
     * Один клиент может отправить несколько заявок.
     */
    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }
}
