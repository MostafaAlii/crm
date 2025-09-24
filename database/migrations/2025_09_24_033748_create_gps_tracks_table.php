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
        Schema::create('gps_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete()->comment('المركبة');
            $table->decimal('latitude', 10, 7)->nullable()->comment('خط العرض');
            $table->decimal('longitude', 10, 7)->nullable()->comment('خط الطول');
            $table->decimal('speed', 8, 2)->nullable()->comment('سرعة المركبة');
            $table->decimal('heading', 8, 2)->nullable()->comment('اتجاه الحركة');
            $table->dateTime('recorded_at')->nullable()->comment('زمن التسجيل من جهاز الـ GPS');
            $table->foreignId('transport_order_id')->nullable()->constrained('transport_orders')->nullOnDelete()->comment('الأمر المرتبط بالسجل');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gps_tracks');
    }
};
