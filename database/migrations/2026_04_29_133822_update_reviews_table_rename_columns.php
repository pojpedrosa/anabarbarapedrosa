<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->renameColumn('title', 'critic');
            $table->renameColumn('source_name', 'source');
            $table->renameColumn('excerpt', 'quote');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->string('source')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->renameColumn('critic', 'title');
            $table->renameColumn('source', 'source_name');
            $table->renameColumn('quote', 'excerpt');
        });
    }
};
