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
        Schema::table('projects', function (Blueprint $table) {
            $table->text('role')->nullable()->after('description');
            $table->text('challenge')->nullable()->after('role');
            $table->text('solution')->nullable()->after('challenge');
            $table->text('results')->nullable()->after('solution');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['role', 'challenge', 'solution', 'results']);
        });
    }
};
