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
        Schema::create('custom_declarations', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('shipment_id')->nullable()->constrained('shipments')->nullOnDelete()->comment('معرف الشحنة المرتبطة بالبيان الجمركي');
            $table->string('declaration_number')->nullable()->comment('رقم البيان الجمركي');
            $table->text('goods_details')->nullable()->comment('تفاصيل البضاعة');
            $table->string('hs_code')->nullable()->comment('رمز HS للبضاعة');
            $table->string('port')->nullable()->comment('الميناء');
            $table->json('attachments')->nullable()->comment('مرفقات البيان الجمركي');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_declarations');
    }
};
