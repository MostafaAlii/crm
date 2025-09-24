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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('origin_city_id')->nullable()->constrained('cities')->nullOnDelete()->comment('المدينة الأصل');
            $table->foreignId('destination_city_id')->nullable()->constrained('cities')->nullOnDelete()->comment('المدينة الوجهة');
            $table->decimal('distance_km', 8, 2)->nullable()->comment('المسافة بالكيلومتر');
            $table->integer('expected_duration_minutes')->nullable()->comment('الزمن المتوقع بالدقائق');
            $table->decimal('price', 12, 2)->default(0)->comment('السعر المحدد للمسار');
            $table->boolean('active')->default(true)->comment('هل المسار نشط؟');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
