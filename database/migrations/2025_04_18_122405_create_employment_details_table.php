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
        Schema::create('employment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_response_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('company_name', 100);
            $table->string('industry_type', 50);
            $table->string('position', 50);
            $table->enum('waiting_period', ['< 3 bulan', '3-6 bulan', '6-12 bulan', '> 12 bulan'])->default('< 3 bulan');
            $table->string('job_source', 50); // From where they got job info
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_details');
    }
};

