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
        Schema::table('custom_packages', function (Blueprint $table) {
            $table->string('start_location')->after('description');
            $table->integer('num_people')->after('duration');
            $table->json('vehicles')->after('destinations');
            $table->json('accommodations')->after('vehicles');
            $table->dropColumn(['includes', 'excludes']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_packages', function (Blueprint $table) {
            $table->dropColumn(['start_location', 'num_people', 'vehicles', 'accommodations']);
            $table->json('includes')->nullable();
            $table->json('excludes')->nullable();
        });
    }
};