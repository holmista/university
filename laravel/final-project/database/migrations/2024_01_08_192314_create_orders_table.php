<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\OrderStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderer_id');
            $table->foreign('orderer_id')->references('id')->on('users');
            $table->unsignedBigInteger('courier_id')->nullable();
            $table->foreign('courier_id')->references('id')->on('couriers');
            $table->enum('status', OrderStatusEnum::getValues());

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
