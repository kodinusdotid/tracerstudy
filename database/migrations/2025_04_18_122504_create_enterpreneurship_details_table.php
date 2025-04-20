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
        Schema::create('enterpreneurship_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_response_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('business_name', 255);
            $table->string('business_type', 100);
            $table->enum('business_duration', ['< 1 tahun', '1-2 tahun', '2-5 tahun', '> 5 tahun'])->default('< 1 tahun');
            $table->enum('monthly_revenue', ['< 5 juta', '5-10 juta', '10-50 juta', '50-100 juta', '> 100 juta'])->default('< 5 juta');
            $table->integer('employee_count')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterpreneurship_details');
    }
};

