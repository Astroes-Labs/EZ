<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Make sure this is imported

return new class extends Migration {
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->string('value');
            $table->string('type')->default('text');
            $table->timestamps();
        });

        // Automatically populate MySQL with your default values
        DB::table('site_settings')->insert([
            [
                'key'   => 'liquidity_pool_allocation',
                'label' => 'LIQUIDITY POOL ALLOCATION',
                'value' => '$15,249,820.00',
                'type'  => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'   => 'current_cycle',
                'label' => 'CURRENT CYCLE',
                'value' => 'WEEKLY 04',
                'type'  => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'   => 'avg_yield',
                'label' => 'AVG YIELD',
                'value' => '+21.5%',
                'type'  => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
