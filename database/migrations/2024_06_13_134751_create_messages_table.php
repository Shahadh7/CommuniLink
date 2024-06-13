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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->longText('message')->nullable();
            $table->foreignId('sender_id')->contrained('users');
            $table->foriegnId('receiver_id')->nullable()->contrained('users');
            $table->foreignId('conversation_id')->nullable()->constrained('conversations');
            $table->timestamps();
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->foriegnId('last_message_id')->nullable()->contrained('messages');
        });

        Schema::create('conversations', function (Blueprint $table) {
            $table->foriegnId('last_message_id')->nullable()->contrained('messages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
