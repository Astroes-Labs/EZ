<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();     // e.g., 'liquidity_pool', 'current_cycle', 'avg_yield'
            $table->string('label');             // e.g., 'LIQUIDITY POOL ALLOCATION'
            $table->string('value');             // e.g., '$15,249,820.00'
            $table->string('type')->default('text'); // text, number, percentage, etc.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
