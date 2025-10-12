<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Safer add-copy-swap to avoid enum truncation warnings
        // 1) Add new column with desired enum and default
        DB::statement("ALTER TABLE custom_packages ADD COLUMN status_new ENUM('pending','active','inactive') NOT NULL DEFAULT 'pending'");

        // 2) Normalize and copy existing values
        //    - Keep 'active'/'inactive' as-is
        //    - Map NULL or '' or any other unexpected value to 'inactive'
        DB::statement("UPDATE custom_packages SET status_new = CASE
            WHEN status IN ('active','inactive') THEN status
            WHEN status IS NULL OR status = '' THEN 'inactive'
            ELSE 'inactive' END");

        // 3) Drop old column and rename new one to status
        DB::statement("ALTER TABLE custom_packages DROP COLUMN status");
        DB::statement("ALTER TABLE custom_packages CHANGE COLUMN status_new status ENUM('pending','active','inactive') NOT NULL DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse using the same add-copy-swap approach
        DB::statement("ALTER TABLE custom_packages ADD COLUMN status_old ENUM('active','inactive') NOT NULL DEFAULT 'active'");
        DB::statement("UPDATE custom_packages SET status_old = CASE
            WHEN status IN ('active','inactive') THEN status
            ELSE 'inactive' END");
        DB::statement("ALTER TABLE custom_packages DROP COLUMN status");
        DB::statement("ALTER TABLE custom_packages CHANGE COLUMN status_old status ENUM('active','inactive') NOT NULL DEFAULT 'active'");
    }
};
