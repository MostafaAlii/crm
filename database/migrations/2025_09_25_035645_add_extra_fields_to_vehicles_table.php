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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('owner_identity')->nullable()->comment('هوية المالك');
            $table->string('user_identity')->nullable()->comment('هوية المستخدم');
            $table->string('chassis_number')->nullable()->comment('رقم الهيكل');
            $table->string('serial_number')->nullable()->comment('الرقم التسلسلي');
            $table->string('vehicle_make')->nullable()->comment('طراز المركبة / الماركة');
            $table->year('manufacture_year')->nullable()->comment('سنة الصنع');
            $table->string('color')->nullable()->comment('لون المركبة');
            $table->string('insurance_company')->nullable()->comment('اسم شركة التأمين');
            $table->string('policy_number')->nullable()->comment('رقم الوثيقة');
            $table->date('policy_start_date')->nullable()->comment('تاريخ سريان الوثيقة');
            $table->date('policy_end_date')->nullable()->comment('تاريخ انتهاء الوثيقة');
            $table->enum('insurance_type', ['comprehensive', 'third_party', 'other'])->nullable()->comment('نوع التأمين: شامل / ضد الغير / آخر');
            $table->string('insurance_type_other')->nullable()->comment('نوع التأمين في حالة اختيار آخر');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn([
                'owner_identity',
                'user_identity',
                'chassis_number',
                'serial_number',
                'vehicle_make',
                'manufacture_year',
                'color',
                'insurance_company',
                'policy_number',
                'policy_start_date',
                'policy_end_date',
                'insurance_type',
                'insurance_type_other',
            ]);
        });
    }
};
