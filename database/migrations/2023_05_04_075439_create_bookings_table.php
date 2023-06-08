<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seat_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamp('booked_from');
            $table->timestamp('booked_to');
            $table->text('request')->nullable(); // If requires approval, request will be stored here
            $table->timestamp('approved_at')->nullable(); // If approval is not required, this will be set to current timestamp
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('cascade'); // Set to user_id if self-approved
            $table->softDeletes();
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
