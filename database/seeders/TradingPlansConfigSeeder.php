<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; 

class TradingPlansConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->updateOrInsert(
            ['key' => 'trading_plans_config'],
            [
                'label' => 'Trading Plans & Sub-Tiers Configuration',
                'value' => json_encode([
                    [
                        'plan_name' => 'Basic',
                        'min' => 1000,
                        'max' => 50000,
                        'icon' => 'assets/frontend/images/default-icon.png',
                        'sub_tiers' => [
                            ['name' => 'Basic - Tier 1', 'min' => 1000, 'max' => 17333],
                            ['name' => 'Basic - Tier 2', 'min' => 17334, 'max' => 33666],
                            ['name' => 'Basic - Tier 3', 'min' => 33667, 'max' => 50000],
                        ]
                    ],
                    [
                        'plan_name' => 'Silver',
                        'min' => 50001,
                        'max' => 100000,
                        'icon' => 'assets/frontend/images/plans/silver.png',
                        'sub_tiers' => [
                            ['name' => 'Silver - Tier 1', 'min' => 50001, 'max' => 66666],
                            ['name' => 'Silver - Tier 2', 'min' => 66667, 'max' => 83333],
                            ['name' => 'Silver - Tier 3', 'min' => 83334, 'max' => 100000],
                        ]
                    ],
                    [
                        'plan_name' => 'Gold',
                        'min' => 100001,
                        'max' => 200000,
                        'icon' => 'assets/frontend/images/plans/gold.png',
                        'sub_tiers' => [
                            ['name' => 'Gold - Tier 1', 'min' => 100001, 'max' => 133333],
                            ['name' => 'Gold - Tier 2', 'min' => 133334, 'max' => 166666],
                            ['name' => 'Gold - Tier 3', 'min' => 166667, 'max' => 200000],
                        ]
                    ],
                    [
                        'plan_name' => 'Diamond',
                        'min' => 200001,
                        'max' => 500000,
                        'icon' => 'assets/frontend/images/plans/diamond.png',
                        'sub_tiers' => [
                            ['name' => 'Diamond - Tier 1', 'min' => 200001, 'max' => 300000],
                            ['name' => 'Diamond - Tier 2', 'min' => 300002, 'max' => 400000],
                            ['name' => 'Diamond - Tier 3', 'min' => 400001, 'max' => 500000],
                        ]
                    ],
                    [
                        'plan_name' => 'Platinum',
                        'min' => 500001,
                        'max' => 999999999,
                        'icon' => 'assets/frontend/images/plans/platinum.png',
                        'sub_tiers' => [
                            ['name' => 'Platinum - Tier 1', 'min' => 500001, 'max' => 700000],
                            ['name' => 'Platinum - Tier 2', 'min' => 700001, 'max' => 900000],
                            ['name' => 'Platinum - Tier 3', 'min' => 900001, 'max' => 999999999],
                        ]
                    ],
                ]),
                'type' => 'json',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
