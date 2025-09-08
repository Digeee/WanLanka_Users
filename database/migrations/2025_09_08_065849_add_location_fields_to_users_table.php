<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users','province')) {
                $table->string('province', 50)->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users','district')) {
                $table->string('district', 60)->nullable()->after('province');
            }
            if (!Schema::hasColumn('users','address')) {
                $table->string('address', 255)->nullable()->after('district');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users','address'))  $table->dropColumn('address');
            if (Schema::hasColumn('users','district')) $table->dropColumn('district');
            if (Schema::hasColumn('users','province')) $table->dropColumn('province');
        });
    }
};
