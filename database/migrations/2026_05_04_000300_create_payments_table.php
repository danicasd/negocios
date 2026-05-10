<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('type', 45); //card, transfer, cash
            $table->string('payment_method', 45);
            $table->decimal('amount', 10, 2);
            $table->string('status', 45)->default('pending'); // pending, paid, failed, refunded
            $table->string('transaction_reference', 45)->nullable();
            $table->dateTime('paid_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
