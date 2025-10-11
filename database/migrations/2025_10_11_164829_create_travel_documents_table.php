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
        Schema::create('travel_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('category', [
                'passport', 'visa', 'booking', 'medical', 
                'emergency', 'valuables', 'other'
            ]);
            $table->string('file_path');
            $table->string('file_name');
            $table->bigInteger('file_size'); // in bytes
            $table->string('file_type');
            $table->boolean('is_encrypted')->default(false);
            $table->date('expiry_date')->nullable();
            $table->boolean('is_public')->default(false);
            $table->timestamps();

            // Indexes for better performance
            $table->index(['user_id', 'category']);
            $table->index('expiry_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_documents');
    }
};