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
        Schema::table('rooms', function (Blueprint $table) {
            // Number of days ahead a seat can be booked
            $table->unsignedSmallInteger('bookable_for_days')->default(7)->after('bookable_to');
            $table->boolean('bookable_weekends')->default(false)->after('bookable_for_days');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('bookable_for_days');
            $table->dropColumn('bookable_weekends');
        });
    }
};
