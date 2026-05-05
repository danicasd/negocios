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
        Schema::create('booking_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->references('id')->on('bookings')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('service_option_id')->references('id')->on('service_options')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('option_name', 45);
            $table->decimal('extra_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_options');
    }
};
