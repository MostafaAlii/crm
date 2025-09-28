<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            // بيانات الطرفين
            $table->string('first_party_name'); // الطرف الأول (الشركة)
            $table->string('first_party_commercial_register')->nullable(); // رقم السجل التجاري للطرف الأول
            $table->string('second_party_name'); // الطرف الثاني
            $table->string('second_party_commercial_register')->nullable(); // رقم السجل التجاري للطرف الثاني
            $table->enum('second_party_type', ['individual', 'company', 'government', 'other'])->default('individual');
            // نوع الطرف الثاني: فرد | شركة | جهة حكومية | آخر
            $table->string('second_party_type_other')->nullable(); // لو النوع "آخر"

            // بيانات العقد
            $table->string('contract_number')->unique(); // رقم العقد
            $table->date('signed_at'); // تاريخ توقيع العقد
            $table->date('start_date'); // تاريخ بداية العقد
            $table->date('end_date')->nullable(); // تاريخ نهاية العقد
            $table->integer('duration_in_days')->nullable(); // مدة العقد بالأيام
            $table->enum('contract_type', ['services', 'supply', 'transport', 'consulting', 'other'])->default('services');
            // نوع العقد: خدمات | توريد | نقل | استشارة | آخر
            $table->string('contract_type_other')->nullable(); // لو النوع "آخر"

            $table->decimal('contract_value', 15, 2)->nullable(); // قيمة العقد
            $table->enum('currency', ['SAR', 'USD', 'other'])->default('SAR'); // العملة المستخدمة
            $table->string('currency_other')->nullable(); // لو العملة "آخر"

            // موافقة الأطراف
            $table->boolean('first_party_approval')->default(false); // موافقة الطرف الأول
            $table->boolean('second_party_approval')->default(false); // موافقة الطرف الثاني

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
