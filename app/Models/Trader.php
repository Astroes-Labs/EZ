<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{

    protected $table = 'traders';

    public function users()
    {
        return $this->belongsToMany(User::class, 'trader_user')
            ->withTimestamps();
    }

    protected $fillable = [
        'name',
        'email',
        'win_rate',
        'profit_share',
        'description',
        'photo',
    ];

    // Optional: accessor for photo URL
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('uploads/traders/' . $this->photo) : asset('uploads/traders/human.png');
    }
}
