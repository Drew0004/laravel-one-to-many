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
            $table->foreignId('types_id')
            ->after('title')
            ->nullable()
            ->constrained()
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'types_id')) {
                // $table->dropForeign('posts_category_id_foreign');
                // OPPURE
                $table->dropForeign(['types_id']);

                $table->dropColumn('types_id');
            }
        });
    }
};