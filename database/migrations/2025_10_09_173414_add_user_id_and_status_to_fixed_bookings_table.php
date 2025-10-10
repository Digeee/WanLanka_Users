<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fixed_bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('fixed_bookings', 'user_id')) {
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('fixed_bookings', 'status')) {
                $table->string('status')->default('pending');
            }
        });
    }

    public function down(): void
    {
        Schema::table('fixed_bookings', function (Blueprint $table) {
            if (Schema::hasColumn('fixed_bookings', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('fixed_bookings', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
