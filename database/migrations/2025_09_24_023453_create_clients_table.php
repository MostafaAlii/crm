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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('name')->comment('اسم العميل (فرد أو شركة)');
            $table->string('client_type')->nullable()->comment('نوع العميل: لوجستيك / تخليص جمركى');
            $table->string('type')->nullable()->comment('نوع العميل: individual / company');
            $table->string('contact_name')->nullable()->comment('اسم جهة الاتصال داخل الشركة');
            $table->string('phone')->nullable()->comment('رقم هاتف العميل');
            $table->string('email')->nullable()->comment('البريد الإلكتروني');
            $table->text('address')->nullable()->comment('عنوان العميل');
            $table->json('meta')->nullable()->comment('معلومات إضافية (مثل رقم السجل التجاري)');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
