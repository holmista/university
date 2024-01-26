<?php

use App\Enums\ComplaineeTypeEnum;
use App\Enums\ComplainerTypeEnum;
use App\Enums\ComplaintStatusEnum;
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
        Schema::disableForeignKeyConstraints();

        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complainer_id');

            $table->enum('complainer_type', ComplainerTypeEnum::getValues(true));
            $table->text('content');
            $table->bigInteger('complainee_id');

            $table->enum('complainee_type', ComplaineeTypeEnum::getValues(true));
            $table->enum('status', ComplaintStatusEnum::getValues());

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
