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
        Schema::create('alumni_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_biodata_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('questionnaire_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('alumni_status', ['bekerja', 'kuliah', 'wirausaha', 'belum_bekerja'])->default('belum_bekerja');
            $table->timestamp('submitted_at')->nullable()->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_responses');
    }
};

