<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('payment_method')->nullable();
            $table->enum('status',['Pending','Confirmed','Failed'])->default('Pending');
            $table->string('currency');
            $table->double('amount');
            $table->integer('from');
            $table->string('wallet_address')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('ssn')->nullable();
            $table->string('updated_at_month')->nullable();
            $table->string('updated_at_day')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
