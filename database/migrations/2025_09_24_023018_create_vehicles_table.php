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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('plate_number')->unique()->comment('رقم اللوحة');
            $table->string('type')->comment('نوع المركبة (مثال: خاصة / خارجية / نقل)');
            $table->string('model')->nullable()->comment('موديل المركبة');
            $table->integer('capacity_kg')->nullable()->comment('سعة التحميل بالكيلو جرام');
            $table->date('inspection_date')->nullable()->comment('تاريخ الفحص الدوري/التفتيش');
            $table->string('status')->default('active')->comment('حالة المركبة (active, inactive, maintenance)');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
