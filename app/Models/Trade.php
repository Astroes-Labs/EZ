<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = [
        'user_id',
        'trader_id',
        'type',
        'symbol',
        'profit',
        'opening_price',
        'closing_price',
        'market',
        'investment',
        'multiplier',
        'take_profit',
        'stop_loss',
        'updated_date',
        'updated_time',
        'class_name',
        'created_at',
        'updated_at',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trader()
    {
        return $this->belongsTo(\App\Models\Trader::class);
    }
}
