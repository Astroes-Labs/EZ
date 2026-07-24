<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    // Define the table if it doesn't follow the Laravel naming convention
    protected $table = 'deposits';

    // Define the fillable fields (or use guarded for protection)
    protected $fillable = [
        'user_id',
        'status',
        'price',
        'price_in_crypto',
        'crypto_currency',
        'timestamp',
        'link',
        'wallet_address',
        'comment',
    ];


    // If you are using timestamps with custom names
    public $timestamps = true; // Set false if you're not using the default created_at and updated_at columns


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
