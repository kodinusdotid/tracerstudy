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
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_response_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('university_name', 255); // max length 255
            $table->string('study_program', 100); // max length 100
            $table->enum('degree', ['D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3', 'Lainnya'])->default('S1'); // set default value
            $table->enum('status', ['aktif', 'cuti', 'lulus'])->default('aktif'); // set default value
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_details');
    }
};

