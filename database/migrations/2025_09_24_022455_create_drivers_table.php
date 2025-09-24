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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name')->comment('اسم السائق');
            $table->string('identity_number')->nullable()->comment('رقم الهوية / الرقم القومي');
            $table->string('license_number')->nullable()->comment('رقم رخصة القيادة');
            $table->date('license_expires_at')->nullable()->comment('تاريخ انتهاء الرخصة');
            $table->string('phone')->nullable()->comment('رقم الهاتف');
            $table->decimal('salary', 10, 2)->default(0)->comment('المرتب الأساسي');
            $table->decimal('fixed_allowance', 10, 2)->default(0)->comment('بدل ثابت إن وجد');
            $table->decimal('bonus_balance', 10, 2)->default(0)->comment('رصيد الحوافز/المستحقات المؤقتة');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};