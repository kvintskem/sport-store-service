<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    // Laravel автоматически ожидает таблицу `requests`
    protected $fillable = [
        'client_id',
        'message',
    ];

    // В миграции для requests есть только created_at, без updated_at
    const UPDATED_AT = null;

    /**
     * Каждая заявка принадлежит одному клиенту.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
