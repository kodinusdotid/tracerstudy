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
        Schema::create('alumni_biodatas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('graduation_year_group_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('nis_nisn', 16)->unique()->nullable();
            $table->string('full_name', 50);
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->longText('address')->nullable();
            $table->string('major', 50)->nullable();
            $table->string('socmed_facebook', 255)->nullable();
            $table->string('socmed_twitter', 255)->nullable();
            $table->string('socmed_instagram', 255)->nullable();
            $table->string('socmed_linkedin', 255)->nullable();
            $table->string('socmed_youtube', 255)->nullable();
            $table->string('socmed_tiktok', 255)->nullable();
            $table->boolean('is_verified')->default(false);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_biodatas');
    }
};

