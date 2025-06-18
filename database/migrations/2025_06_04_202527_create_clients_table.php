<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();                                      // id BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('telegram_id')->index(); // telegram_id пользователя и индекс для быстрой выборки
            $table->string('first_name');                      // имя клиента
            $table->string('last_name')->nullable();           // фамилия (NULLABLE, если нет)
            $table->string('username')->nullable();            // никнейм в Telegram (NULLABLE)
            $table->boolean('is_subscribed')->default(false);  // флаг подписки (по умолчанию false)
            $table->timestamp('created_at')->useCurrent();      // дата/время регистрации, сразу заполняется
            // **ПРИМЕЧАНИЕ**: поле `updated_at` здесь НЕ добавляется, согласно задаче.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropIndex(['telegram_id']);
        });
        Schema::dropIfExists('clients');
    }
};
