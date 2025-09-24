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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('invoice_number')->unique()->comment('رقم الفاتورة');
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete()->comment('العميل صاحب الفاتورة');
            $table->decimal('amount', 14, 2)->default(0)->comment('قيمة الفاتورة');
            $table->date('due_date')->nullable()->comment('تاريخ الاستحقاق');
            $table->string('status')->default('unpaid')->comment('حالة الدفع: unpaid / paid / overdue');
            $table->json('related')->nullable()->comment('علاقة الفاتورة مع شحنة/بوليصة/أمر نقل في هيئة json');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
