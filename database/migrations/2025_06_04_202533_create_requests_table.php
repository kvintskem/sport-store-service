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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();                                       // id BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('client_id');            // внешний ключ на таблицу clients
            $table->text('message');                            // текст обращения
            $table->timestamp('created_at')->useCurrent();      // дата/время создания заявки

            // индекс на client_id для ускорения выборок по клиентам
            $table->index('client_id');

            // внешний ключ, связывающий заявку с клиентом
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade'); // при удалении клиента его заявки удалятся
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropIndex(['client_id']);
        });
        Schema::dropIfExists('requests');
    }
};
