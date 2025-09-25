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
        Schema::table('drivers', function (Blueprint $table) {
               $table->foreignId('nationality_id')->nullable()->constrained('nationalities')->nullOnDelete();
                $table->foreignId('contract_type_id')->nullable()->constrained('contract_types')->nullOnDelete();
                $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
                $table->string('residence_number')->nullable()->comment('رقم الإقامة');
                $table->date('hire_date')->nullable()->comment('تاريخ التوظيف');
                $table->string('second_phone')->nullable()->comment('رقم الهاتف الثاني');
                $table->string('email')->nullable()->unique()->comment('البريد الإلكتروني');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropForeign(['nationality_id', 'contract_type_id', 'department_id']);
            $table->dropColumn(['nationality_id', 'contract_type_id', 'department_id', 'residence_number', 'hire_date', 'second_phone', 'email']);
        });
    }
};
