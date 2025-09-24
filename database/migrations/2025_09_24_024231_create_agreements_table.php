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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('agreement_number')->unique()->comment('رقم الاتفاقية');
            $table->string('party_name')->comment('اسم المصنع/المورد/الطرف الآخر');
            $table->string('party_type')->nullable()->comment('نوع الطرف (factory / supplier / other)');
            $table->date('start_date')->nullable()->comment('تاريخ بداية الاتفاقية');
            $table->date('end_date')->nullable()->comment('تاريخ نهاية الاتفاقية');
            $table->text('financial_terms')->nullable()->comment('الشروط المالية (تفاصيل الأسعار/الدفعات)');
            $table->text('notes')->nullable()->comment('ملاحظات عامة عن الاتفاقية');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreements');
    }
};