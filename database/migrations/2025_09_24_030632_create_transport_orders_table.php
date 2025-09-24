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
        Schema::create('transport_orders', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('order_number')->unique()->comment('رقم أمر النقل');
            $table->foreignId('shipment_id')->nullable()->constrained('shipments')->nullOnDelete()->comment('الشحنة المحولة لأمر النقل');
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->nullOnDelete()->comment('السائق المعين');
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete()->comment('المركبة المعينة');
            $table->foreignId('route_id')->nullable()->constrained('routes')->nullOnDelete()->comment('المسار المختار');
            $table->dateTime('assigned_at')->nullable()->comment('تاريخ ووقت تعيين الأمر');
            $table->string('status')->default('assigned')->comment('حالة أمر النقل (assigned / started / completed / cancelled)');
            $table->decimal('fuel_estimate', 10, 2)->nullable()->comment('تقدير استهلاك الوقود أو التكلفة');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_orders');
    }
};