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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('shipment_number')->unique()->comment('رقم الشحنة');
            $table->date('expected_arrival_date')->nullable()->comment('تاريخ الوصول المتوقع');
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete()->comment('العميل صاحب الشحنة');
            $table->string('status')->default('pending')->comment('حالة الشحنة (pending / in_transit / delivered / delayed)');
            $table->decimal('total_cost', 14, 2)->default(0)->comment('اجمالي تكاليف الشحنة');
            $table->json('attachments')->nullable()->comment('مرفقات الشحنة (فاتورة منشأ، بوالص، صور)');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};