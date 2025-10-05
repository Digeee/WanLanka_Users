<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('province')->nullable()->after('phone');
        $table->string('district')->nullable()->after('province');
        $table->string('address')->nullable()->after('district');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['province', 'district', 'address']);
    });
}

};
