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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete()->comment('رقم المركبة');
            $table->date('date')->nullable()->comment('تاريخ الفحص');
            $table->string('result')->comment('نتيجة الفحص (passed / failed / needs_repair)');
            $table->text('alerts')->nullable()->comment('تنبيهات مثل: تجديد / إصلاح مطلوب');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
