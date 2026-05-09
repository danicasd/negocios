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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('service_id')
                ->constrained('services')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('address_id')
                ->constrained('addresses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->dateTime('scheduled_at');

            $table->string('status', 45)->default('pendiente');

            $table->decimal('base_price', 10, 2);
            $table->decimal('extra_total', 10, 2)->default(0);
            $table->decimal('total', 10, 2);

            $table->text('notes')->nullable();

            $table->foreignId('technician_id')
                ->nullable()
                ->constrained('technicians')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->text('cancellation_reason')->nullable();
            $table->dateTime('cancelled_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
