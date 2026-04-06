<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->integer('code')->default(0);
            $table->enum('status', ['Pending','Confirmed','Failed'])->default('Pending');
            $table->double('price')->default(0);
            $table->string('price_in_crypto',200)->nullable();
            $table->double('price_in_crypto_s')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('created_by_admin')->default(0);
            $table->string('crypto_currency');
            $table->string('link')->nullable();
            $table->string('timestamp');
            $table->string('wallet_address')->nullable();
            $table->string('updated_at_month')->nullable();
            $table->string('updated_at_day')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};