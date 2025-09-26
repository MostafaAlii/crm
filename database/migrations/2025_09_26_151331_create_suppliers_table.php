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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->enum('supplier_type', ['individual', 'company', 'government', 'other'])->default('individual');
            $table->string('supplier_type_other')->nullable()->comment('نوع المورد إذا كان "أخرى"');
            $table->string('name');
            $table->string('commercial_registration_number')->nullable();
            $table->string('tax_number')->nullable()->comment('الرقم الضريبي');
            $table->string('activity')->nullable()->comment('نشاط المورد');
            $table->string('mobile')->nullable()->comment('رقم الجوال الأساسي');
            $table->string('phone')->nullable()->comment('رقم الهاتف الثانوي');
            $table->string('email')->nullable()->comment('البريد الإلكتروني');
            $table->string('address')->nullable()->comment('العنوان الكامل');
            $table->string('contact_person_name')->nullable()->comment('اسم جهة الاتصال');
            $table->string('contact_person_identity')->nullable()->comment('هوية جهة الاتصال');
            $table->string('contact_person_mobile')->nullable()->comment('جوال جهة الاتصال');
            $table->string('contact_person_alt_mobile')->nullable()->comment('جوال جهة الاتصال بديل');
            $table->string('contact_person_email')->nullable()->comment('بريد جهة الاتصال الإلكتروني');
            $table->string('bank_name')->nullable()->comment('اسم البنك');
            $table->string('bank_account_number')->nullable()->comment('رقم الحساب البنكي');
            $table->string('bank_account_owner')->nullable()->comment('صاحب الحساب البنكي');
            $table->string('bank_email')->nullable()->comment('بريد البنك الإلكتروني');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
