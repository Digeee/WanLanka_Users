<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users','otp')) {
                $table->string('otp', 6)->nullable()->after('remember_token');
            }
            if (!Schema::hasColumn('users','otp_expires_at')) {
                $table->timestamp('otp_expires_at')->nullable()->after('otp');
            }
            if (!Schema::hasColumn('users','otp_attempts')) {
                $table->unsignedTinyInteger('otp_attempts')->default(0)->after('otp_expires_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users','otp_attempts'))   $table->dropColumn('otp_attempts');
            if (Schema::hasColumn('users','otp_expires_at')) $table->dropColumn('otp_expires_at');
            if (Schema::hasColumn('users','otp'))            $table->dropColumn('otp');
        });
    }
};
