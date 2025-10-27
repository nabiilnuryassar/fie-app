<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add a JSON column to hold multiple uploaded file paths and a temporary string column
        Schema::table('open_when_boxes', function (Blueprint $table) {
            $table->json('content_file')->nullable()->after('content');
            $table->string('content_new')->nullable()->after('content_file');
        });

        // Migrate existing `content` (text) into the new shorter string column (truncate to 255 chars)
        $driver = DB::getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME);

        if ($driver === 'sqlite') {
            DB::statement("UPDATE open_when_boxes SET content_new = substr(content, 1, 255)");
        } elseif ($driver === 'mysql') {
            DB::statement("UPDATE open_when_boxes SET content_new = LEFT(content, 255)");
        } elseif ($driver === 'pgsql') {
            DB::statement("UPDATE open_when_boxes SET content_new = substring(content from 1 for 255)");
        } else {
            // Generic fallback using SQL substr
            DB::statement("UPDATE open_when_boxes SET content_new = substr(content, 1, 255)");
        }

        // Attempt to drop the old `content` column and rename `content_new` -> `content`.
        // Note: some DB drivers (or missing doctrine/dbal) may prevent dropping/renaming columns.
        try {
            Schema::table('open_when_boxes', function (Blueprint $table) {
                $table->dropColumn('content');
            });

            Schema::table('open_when_boxes', function (Blueprint $table) {
                $table->renameColumn('content_new', 'content');
            });
        } catch (\Throwable $e) {
            // If drop/rename fails (common on sqlite without DBAL), keep both columns and log warning.
            Log::warning('modify_open_when_boxes migration: could not drop/rename content column: '.$e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Attempt to restore previous state: if `content_new` exists, copy it back into a text `content` column.
        try {
            $hasContentNew = Schema::hasColumn('open_when_boxes', 'content_new');

            if ($hasContentNew) {
                Schema::table('open_when_boxes', function (Blueprint $table) {
                    // add old content as text if missing
                    if (!Schema::hasColumn('open_when_boxes', 'content')) {
                        $table->text('content')->nullable()->after('description');
                    }
                });

                // copy back
                DB::statement("UPDATE open_when_boxes SET content = content_new");

                // drop the temporary column
                Schema::table('open_when_boxes', function (Blueprint $table) {
                    $table->dropColumn('content_new');
                });
            }
        } catch (\Throwable $e) {
            Log::warning('modify_open_when_boxes down: '.$e->getMessage());
        }

        // Drop content_file if exists
        if (Schema::hasColumn('open_when_boxes', 'content_file')) {
            Schema::table('open_when_boxes', function (Blueprint $table) {
                $table->dropColumn('content_file');
            });
        }
    }
};
