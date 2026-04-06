<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $table = 'withdrawals';

    protected $fillable = ['user_id', 'payment_method', 'status', 'currency', 'amount', 'from', 'wallet_address', 'paypal_email', 'bank_name', 'account_name', 'account_number', 'routing_number', 'ssn', 'updated_at_month', 'updated_at_day', 'created_at', 'updated_at'];

    public function user() {
    return $this->belongsTo(User::class);
}
}
