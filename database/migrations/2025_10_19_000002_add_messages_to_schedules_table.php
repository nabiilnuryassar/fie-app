<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->text('message_when_done')->nullable()->after('is_done');
            $table->text('message_when_cancel')->nullable()->after('message_when_done');
        });
    }

    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn(['message_when_done', 'message_when_cancel']);
        });
    }
};
