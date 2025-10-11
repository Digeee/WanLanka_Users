<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE custom_packages MODIFY description TEXT NULL');
        DB::statement('ALTER TABLE custom_packages MODIFY image VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE custom_packages MODIFY description TEXT NOT NULL');
        DB::statement('ALTER TABLE custom_packages MODIFY image VARCHAR(255) NOT NULL');
    }
};