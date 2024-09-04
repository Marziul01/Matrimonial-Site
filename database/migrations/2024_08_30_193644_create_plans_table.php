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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_type');
            $table->string('name');
            $table->string('time')->nullable();
            $table->string('subtitle');
            $table->text('services');
            $table->string('subdesc');
            $table->string('badge')->nullable();
            $table->integer('profile_limit')->nullable(); // Number of profiles a user can view
            $table->decimal('price', 8, 2)->nullable(); // Plan price (null for free plan)
            $table->integer('duration_in_days')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
