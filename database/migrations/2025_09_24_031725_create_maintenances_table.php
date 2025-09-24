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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete()->comment('رقم المركبة');
            $table->string('maintenance_type')->comment('نوع الصيانة (دورية / طارئة)');
            $table->date('date')->nullable()->comment('تاريخ الصيانة');
            $table->decimal('cost', 12, 2)->default(0)->comment('تكلفة الصيانة');
            $table->string('supplier')->nullable()->comment('المورد أو مركز الخدمة');
            $table->text('notes')->nullable()->comment('ملاحظات عن الصيانة');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};