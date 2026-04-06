<?php
// File: database/migrations/2026_03_13_062729_add_username_to_admins_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add username column to admins table
     */
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('username')->unique()->after('id');
        });
    }

    /**
     * Rollback change
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};