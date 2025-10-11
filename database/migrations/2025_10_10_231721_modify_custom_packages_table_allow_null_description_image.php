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
        // Check if the columns exist before trying to modify them
        $columns = DB::select('SHOW COLUMNS FROM custom_packages WHERE Field IN ("description", "image")');
        
        // If columns exist, modify them
        if (count($columns) == 2) {
            Schema::table('custom_packages', function (Blueprint $table) {
                $table->text('description')->nullable()->change();
                $table->string('image')->nullable()->change();
            });
        } else {
            // Columns don't exist or have different configuration, skip modification
            echo "Skipping modification of description and image columns - columns not found or already modified.\n";
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Check if the columns exist before trying to revert changes
        $columns = DB::select('SHOW COLUMNS FROM custom_packages WHERE Field IN ("description", "image")');
        
        // If columns exist, revert them
        if (count($columns) == 2) {
            Schema::table('custom_packages', function (Blueprint $table) {
                $table->text('description')->nullable(false)->change();
                $table->string('image')->nullable(false)->change();
            });
        }
    }
};