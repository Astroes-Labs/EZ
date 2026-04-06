<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Personal info
            $table->string('first_name')->nullable()->after('name');
            $table->string('last_name')->nullable()->after('first_name');
            $table->date('dob')->nullable();
            $table->string('email2')->nullable()->unique();
            $table->string('country')->nullable();
            $table->string('currency')->default('USD');
            $table->string('account_type')->nullable();     // 1,2,3,4,5
            $table->string('plan')->nullable();             // BASIC, SILVER, ...
            $table->unsignedBigInteger('referrer_id')->nullable();

            // Address
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();

            // Verification documents
            $table->string('photo_front_view')->nullable();
            $table->string('photo_back_view')->nullable();
            $table->boolean('identity_verified')->default(false);
            $table->boolean('account_verified')->default(false);

            // Other
            $table->string('vgin')->nullable();         // Verified Government ID Number
            $table->string('swiftcode')->nullable();
            $table->string('pin')->nullable();          // verification code
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'first_name', 'last_name', 'dob', 'email2', 'country', 'currency',
                'account_type', 'plan', 'referrer_id', 'address', 'city', 'state',
                'postcode', 'photo_front_view', 'photo_back_view', 'identity_verified',
                'account_verified', 'vgin', 'swiftcode', 'pin'
            ]);
        });
    }
};