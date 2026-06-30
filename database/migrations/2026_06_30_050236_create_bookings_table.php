<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->unsignedBigInteger('destination_ticket_id');
            $table->string('visitor_name');
            $table->string('visitor_email');
            $table->string('visitor_whatsapp');
            $table->date('visit_date');
            $table->integer('ticket_qty');
            $table->integer('price_per_ticket');
            $table->integer('total_price');
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();

            $table->foreign('destination_ticket_id')
                  ->references('id')
                  ->on('destination_tickets')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};