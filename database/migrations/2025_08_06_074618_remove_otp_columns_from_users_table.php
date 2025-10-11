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
    public function up()
{
    // Already dropped, so skip
    // Schema::table('users', function (Blueprint $table) {
    //     $table->dropColumn(['otp', 'is_verified']);
    // });

    Schema::table('users', function (Blueprint $table) {
        if (Schema::hasColumn('users', 'otp')) {
            $table->dropColumn('otp');
        }
        if (Schema::hasColumn('users', 'is_verified')) {
            $table->dropColumn('is_verified');
        }
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('otp')->nullable();
        $table->boolean('is_verified')->default(false);
    });
}
};
