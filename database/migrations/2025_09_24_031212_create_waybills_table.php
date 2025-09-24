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
        Schema::create('waybills', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('waybill_number')->unique()->comment('رقم البوليصة');
            $table->date('issued_at')->nullable()->comment('تاريخ الإصدار');
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete()->comment('بيانات العميل صاحب البوليصة');
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->nullOnDelete()->comment('بيانات السائق في البوليصة');
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete()->comment('بيانات المركبة في البوليصة');
            $table->decimal('cost', 14, 2)->default(0)->comment('تكلفة النقل المدونة في البوليصة');
            $table->json('details')->nullable()->comment('تفاصيل إضافية للبوليصة');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waybills');
    }
};
