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
        Schema::create('fuel_logs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete()->comment('المركبة');
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->nullOnDelete()->comment('السائق عند التعبئة');
            $table->decimal('amount', 12, 2)->comment('تكلفة التعبئة');
            $table->decimal('liters', 10, 2)->nullable()->comment('كمية الوقود باللتر');
            $table->string('station')->nullable()->comment('محطة التزود');
            $table->integer('odometer')->nullable()->comment('عداد الكيلو/المسافة عند التعبئة');
            $table->dateTime('filled_at')->nullable()->comment('تاريخ ووقت التعبئة');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_logs');
    }
};
