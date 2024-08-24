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
        Schema::create('partner_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('image')->nullable();
            $table->text('desc');
            $table->string('relation');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('religion');
            $table->date('date_of_birth');
            $table->string('birth_place');
            $table->string('nationality');
            $table->string('present_address');
            $table->string('email');
            $table->string('contact_number');
            $table->string('marital_status');
            $table->string('blood_group');
            $table->string('hobby')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('education_level');
            $table->string('institute_name');
            $table->string('working_with');
            $table->string('employer_name');
            $table->string('designation');
            $table->string('duration');
            $table->double('monthly_income', 10, 2);
            $table->string('father_status');
            $table->string('mother_status');
            $table->integer('number_of_sibling');
            $table->string('family_type');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_profiles');
    }
};
