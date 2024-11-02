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
        Schema::create('admin_accesses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->tinyInteger('users')->nullable();
            $table->tinyInteger('orders')->nullable();
            $table->tinyInteger('courses')->nullable();
            $table->tinyInteger('blogs')->nullable();
            $table->tinyInteger('payment_methods')->nullable();
            $table->tinyInteger('coupons')->nullable();
            $table->tinyInteger('affiliate_commission')->nullable();
            $table->tinyInteger('site_settings')->nullable();
            $table->tinyInteger('home_settings')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_accesses');
    }
};
