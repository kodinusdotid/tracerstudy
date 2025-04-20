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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionnaire_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('question_text')->nullable(false);
            $table->enum('question_type', ['text', 'number', 'select', 'radio', 'checkbox', 'textarea'])->nullable(false);
            $table->json('options')->nullable(true);
            $table->string('target_status', 50)->nullable(true);
            $table->boolean('is_required')->default(true);
            $table->integer('order')->default(0)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};

