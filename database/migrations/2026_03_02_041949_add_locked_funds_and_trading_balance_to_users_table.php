<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Place everything right after the 'currency' column
            $table->decimal('trading_balance', 15, 8)
                  ->default(0.00000000)
                  ->after('currency')
                  ->comment('Available balance users can trade with');

            $table->decimal('locked_funds', 15, 8)
                  ->default(0.00000000)
                  ->after('trading_balance')
                  ->comment('Funds currently locked in plans, trades, or staking');

            $table->string('email_token', 100)
                  ->nullable()
                  ->after('locked_funds')
                  ->comment('Temporary token for confirming new email address');

            $table->string('password_token', 100)
                  ->nullable()
                  ->after('email_token')
                  ->comment('Temporary token for password reset or change confirmation');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'trading_balance',
                'locked_funds',
                'email_token',
                'password_token'
            ]);
        });
    }
};