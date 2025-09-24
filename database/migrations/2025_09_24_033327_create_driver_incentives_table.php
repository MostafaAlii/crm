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
        Schema::create('driver_incentives', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->nullOnDelete()->comment('السائق');
            $table->decimal('amount', 12, 2)->comment('قيمة الحافز أو الخصم');
            $table->string('type')->comment('نوع السجل reward / deduction');
            $table->text('reason')->nullable()->comment('سبب الحافز أو الخصم');
            $table->json('custody')->nullable()->comment('العهدة المستلمة مثلاً: {"type":"card","serial":"..."}');
            $table->foreignId('related_order_id')->nullable()->constrained('transport_orders')->nullOnDelete()->comment('مرتبطة بأمر نقل إن وجد');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_incentives');
    }
};
