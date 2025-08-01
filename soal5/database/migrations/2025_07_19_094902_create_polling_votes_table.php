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
        Schema::create('polling_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poling_id')->constrained('polings');
            $table->foreignId('option_id')->constrained('options');
            $table->string('vote')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polling_votes');
    }
};
