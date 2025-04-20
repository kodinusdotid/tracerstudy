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
        Schema::create('graduation_year_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title', 12)->index();
            $table->string('slug', 12)->unique()->index();
            $table->string('image', 64)->nullable()->default(null);
            $table->string('description', 255)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduation_year_groups');
    }
};

