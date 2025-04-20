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
        Schema::create('unemployment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_response_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('reason')->nullable()->default(null);
            $table->text('current_efforts')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unemployment_details');
    }
};

