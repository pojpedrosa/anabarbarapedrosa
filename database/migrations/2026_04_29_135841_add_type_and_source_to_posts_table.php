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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('type')->default('post')->after('slug'); // 'post' or 'article'
            $table->string('source_name')->nullable()->after('type');
            $table->string('external_url')->nullable()->after('source_name');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['type', 'source_name', 'external_url']);
        });
    }
};
