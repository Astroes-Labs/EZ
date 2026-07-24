<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('trader_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('type', ['BUY','SELL']);
            $table->string('symbol');
            $table->decimal('profit',38,2)->nullable();
            $table->decimal('opening_price',15,5)->nullable();
            $table->decimal('closing_price',15,5)->nullable();
            $table->string('market');
            $table->decimal('investment',8,2);
            $table->integer('multiplier');
            $table->decimal('take_profit',8,2)->nullable();
            $table->decimal('stop_loss',8,2)->nullable();
            $table->string('updated_date')->nullable();
            $table->string('updated_time')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
