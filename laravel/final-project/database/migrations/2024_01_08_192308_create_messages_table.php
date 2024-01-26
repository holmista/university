<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\MessageReceiverTypeEnum;
use App\Enums\MessageSenderTypeEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_id');
            $table->enum('receiver_type', MessageReceiverTypeEnum::getValues());
            $table->unsignedBigInteger('sender_id');
            $table->enum('sender_type', MessageSenderTypeEnum::getValues());

            $table->unsignedBigInteger('conversation_id');
            $table->foreign('conversation_id')->references('id')->on('conversations');

            $table->text('content');

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
