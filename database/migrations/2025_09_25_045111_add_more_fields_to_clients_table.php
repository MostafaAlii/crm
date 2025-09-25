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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('client_category')->nullable()->comment('نوع العميل: فرد / شركة / جهة حكومية / شريك / آخر');
            $table->string('client_category_other')->nullable()->comment('توضيح في حالة اختيار آخر');

            // بيانات العميل
            $table->string('commercial_register_number')->nullable()->comment('رقم السجل التجاري');
            $table->string('tax_number')->nullable()->comment('الرقم الضريبي');
            $table->string('business_activity')->nullable()->comment('النشاط / مجال العمل');

            // بيانات التواصل
            $table->string('mobile_number')->nullable()->comment('رقم الجوال');
            $table->string('landline_number')->nullable()->comment('رقم الهاتف الثابت');
            $table->string('national_address')->nullable()->comment('العنوان الوطني');
            $table->string('contact_full_name')->nullable()->comment('الاسم الثلاثي لضابط الاتصال');
            $table->string('contact_national_id')->nullable()->comment('رقم الهوية/الإقامة');
            $table->string('contact_mobile_number')->nullable()->comment('رقم جوال ضابط الاتصال');
            $table->string('contact_alt_mobile_number')->nullable()->comment('رقم جوال إضافي');
            $table->string('contact_email')->nullable()->comment('البريد الإلكتروني لضابط الاتصال');

            // بيانات الحساب البنكي
            $table->string('bank_name')->nullable()->comment('اسم البنك');
            $table->string('bank_account_number')->nullable()->comment('رقم الحساب البنكي');
            $table->string('iban_number')->nullable()->comment('رقم الآيبان');
            $table->string('account_holder_name')->nullable()->comment('اسم صاحب الحساب');
            $table->string('account_email')->nullable()->comment('البريد الإلكتروني المرتبط بالحساب');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn([
                'client_category',
                'client_category_other',
                'commercial_register_number',
                'tax_number',
                'business_activity',
                'mobile_number',
                'landline_number',
                'national_address',
                'contact_full_name',
                'contact_national_id',
                'contact_mobile_number',
                'contact_alt_mobile_number',
                'contact_email',
                'bank_name',
                'bank_account_number',
                'iban_number',
                'account_holder_name',
                'account_email'
            ]);
        });
    }
};
