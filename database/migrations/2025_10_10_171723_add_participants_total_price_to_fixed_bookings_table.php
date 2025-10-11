<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('fixed_bookings', function (Blueprint $table) {
            $table->integer('participants')->default(1)->after('receipt');
            $table->decimal('total_price', 10, 2)->default(0)->after('participants');
        });
    }

    public function down()
    {
        Schema::table('fixed_bookings', function (Blueprint $table) {
            $table->dropColumn(['participants', 'total_price']);
        });
    }
};
