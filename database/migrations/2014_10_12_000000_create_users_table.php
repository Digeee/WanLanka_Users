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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Basic
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();

            // Location & Language
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->date('dob')->nullable();
            $table->enum('preferred_language', ['English','Tamil','Sinhala'])->nullable();

            // Identity
            $table->enum('id_type', ['NIC','Passport','Driving License'])->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_image')->nullable();

            // Profile & Safety
            $table->string('profile_photo')->nullable();
            $table->string('emergency_name')->nullable();
            $table->string('emergency_phone')->nullable();

            // Consent
            $table->boolean('accept_terms')->default(false);
            $table->boolean('marketing_opt_in')->default(false);

            // Verification
            $table->boolean('is_verified')->default(false); // Admin approval
            $table->string('otp', 6)->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
