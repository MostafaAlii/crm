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
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('name')->comment('اسم قطعة الغيار');
            $table->string('sku')->nullable()->comment('رمز/كود القطعة');
            $table->integer('quantity')->default(0)->comment('الكمية المتوفرة في المخزن');
            $table->decimal('price', 12, 2)->default(0)->comment('سعر القطعة');
            $table->foreignId('supplier_id')->nullable()->constrained('clients')->nullOnDelete()->comment('المورد (يمكن استخدام جدول clients للموردين)');
            $table->string('location')->nullable()->comment('مكان التخزين في المخزن');
            $table->integer('min_stock')->default(0)->comment('الحد الأدنى للمخزون لتنبيه إعادة الطلب');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
