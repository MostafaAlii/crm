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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('contract_type')->nullable();
            $table->string('contract_number')->unique()->comment('رقم العقد');
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete()->comment('العميل المرتبط بالعقد');
            $table->date('start_date')->nullable()->comment('تاريخ بداية العقد');
            $table->date('end_date')->nullable()->comment('تاريخ نهاية العقد');
            $table->decimal('value', 14, 2)->default(0)->comment('قيمة العقد');
            $table->text('terms')->nullable()->comment('شروط العقد');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
