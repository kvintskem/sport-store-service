<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class TelegramWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Берём Telegram API из контейнера (Laravel-фасад)
        $telegram = new Api(config('telegram.bots.mybot.token'));

        // Получаем Update от Telegram
        $update = $telegram->getWebhookUpdates();

        // Пример: если пользователь написал команду /start
        if ($update instanceof Update && $update->message) {
            $chatId = $update->message->chat->id;
            $text   = $update->message->text;

            if ($text === '/start') {
                $telegram->sendMessage([
                    'chat_id' => $chatId,
                    'text'    => 'Привет! Я Laravel-бот без BotMan.',
                ]);
            } else {
                $telegram->sendMessage([
                    'chat_id' => $chatId,
                    'text'    => 'Вы написали: ' . $text,
                ]);
            }
        }

        // Вернуть HTTP 200, чтобы Telegram понимал, что запрос обработан
        return response('OK', 200);
    }
}
