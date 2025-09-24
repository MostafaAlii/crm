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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('نوع التنبيه (license_expiry / maintenance_due / contract_end / trip_delay ...)');
            $table->morphs('alertable');
            $table->text('message')->comment('نص التنبيه');
            $table->dateTime('expires_at')->nullable()->comment('تاريخ انتهاء صلاحية التنبيه إن وجد');
            $table->dateTime('read_at')->nullable()->comment('تاريخ قراءة التنبيه');
            $table->json('meta')->nullable()->comment('بيانات إضافية للتنبيه');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alerts');
    }
};