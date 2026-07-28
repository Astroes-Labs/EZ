<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradingPlan extends Model
{
    protected $table = 'trading_plans';
    
    protected $fillable = [
        'plan_name',
        'sub_tier_name',
        'min',
        'max',
        'rating',
        'reviews',
        'icon',
    ];
}