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
        Schema::table('schedules', function (Blueprint $table) {
            // First, drop the existing day column
            $table->dropColumn('day');
        });

        Schema::table('schedules', function (Blueprint $table) {
            // Re-create the day column as enum
            $table->enum('day', [
                'sunday',
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'saturday'
            ])->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // First, drop the enum column
            $table->dropColumn('day');
        });

        Schema::table('schedules', function (Blueprint $table) {
            // Restore the original string column
            $table->string('day')->after('id');
        });
    }
};
