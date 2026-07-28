<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trading_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name'); 
            $table->string('sub_tier_name'); 
            $table->decimal('min', 18, 2);
            $table->decimal('max', 18, 2);
            $table->string('rating')->default('5.00');
            $table->string('reviews')->default('0');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        // Seed initial plans and sub-tiers with continuous ranges
        DB::table('trading_plans')->insert([
            // Basic Plan Tiers ($1,000 - $50,000)
            ['plan_name' => 'Basic', 'sub_tier_name' => 'Basic - Tier 1', 'min' => 1000, 'max' => 17333.33, 'rating' => '5.00', 'reviews' => '29,418', 'icon' => 'assets/frontend/images/default-icon.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Basic', 'sub_tier_name' => 'Basic - Tier 2', 'min' => 17333.33, 'max' => 33666.66, 'rating' => '5.00', 'reviews' => '29,418', 'icon' => 'assets/frontend/images/default-icon.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Basic', 'sub_tier_name' => 'Basic - Tier 3', 'min' => 33666.66, 'max' => 50000, 'rating' => '5.00', 'reviews' => '29,418', 'icon' => 'assets/frontend/images/default-icon.png', 'created_at' => now(), 'updated_at' => now()],

            // Silver Plan Tiers ($50,000 - $100,000)
            ['plan_name' => 'Silver', 'sub_tier_name' => 'Silver - Tier 1', 'min' => 50000, 'max' => 66666.66, 'rating' => '4.88', 'reviews' => '11,236', 'icon' => 'assets/frontend/images/plans/silver.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Silver', 'sub_tier_name' => 'Silver - Tier 2', 'min' => 66666.66, 'max' => 83333.33, 'rating' => '4.88', 'reviews' => '11,236', 'icon' => 'assets/frontend/images/plans/silver.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Silver', 'sub_tier_name' => 'Silver - Tier 3', 'min' => 83333.33, 'max' => 100000, 'rating' => '4.88', 'reviews' => '11,236', 'icon' => 'assets/frontend/images/plans/silver.png', 'created_at' => now(), 'updated_at' => now()],

            // Gold Plan Tiers ($100,000 - $200,000)
            ['plan_name' => 'Gold', 'sub_tier_name' => 'Gold - Tier 1', 'min' => 100000, 'max' => 133333.33, 'rating' => '4.88', 'reviews' => '996', 'icon' => 'assets/frontend/images/plans/gold.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Gold', 'sub_tier_name' => 'Gold - Tier 2', 'min' => 133333.33, 'max' => 166666.66, 'rating' => '4.88', 'reviews' => '996', 'icon' => 'assets/frontend/images/plans/gold.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Gold', 'sub_tier_name' => 'Gold - Tier 3', 'min' => 166666.66, 'max' => 200000, 'rating' => '4.88', 'reviews' => '996', 'icon' => 'assets/frontend/images/plans/gold.png', 'created_at' => now(), 'updated_at' => now()],

            // Diamond Plan Tiers ($200,000 - $500,000)
            ['plan_name' => 'Diamond', 'sub_tier_name' => 'Diamond - Tier 1', 'min' => 200000, 'max' => 300000, 'rating' => '4.88', 'reviews' => '237', 'icon' => 'assets/frontend/images/plans/diamond.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Diamond', 'sub_tier_name' => 'Diamond - Tier 2', 'min' => 300000, 'max' => 400000, 'rating' => '4.88', 'reviews' => '237', 'icon' => 'assets/frontend/images/plans/diamond.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Diamond', 'sub_tier_name' => 'Diamond - Tier 3', 'min' => 400000, 'max' => 500000, 'rating' => '4.88', 'reviews' => '237', 'icon' => 'assets/frontend/images/plans/diamond.png', 'created_at' => now(), 'updated_at' => now()],

            // Platinum Plan Tiers ($500,000+)
            ['plan_name' => 'Platinum', 'sub_tier_name' => 'Platinum - Tier 1', 'min' => 500000, 'max' => 666666.66, 'rating' => '4.88', 'reviews' => '146', 'icon' => 'assets/frontend/images/plans/platinum.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Platinum', 'sub_tier_name' => 'Platinum - Tier 2', 'min' => 666666.66, 'max' => 833333.33, 'rating' => '4.88', 'reviews' => '146', 'icon' => 'assets/frontend/images/plans/platinum.png', 'created_at' => now(), 'updated_at' => now()],
            ['plan_name' => 'Platinum', 'sub_tier_name' => 'Platinum - Tier 3', 'min' => 833333.33, 'max' => 999999999, 'rating' => '4.88', 'reviews' => '146', 'icon' => 'assets/frontend/images/plans/platinum.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('trading_plans');
    }
};