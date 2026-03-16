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
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->string('title_dv')->nullable()->after('title');
            $table->string('category_dv')->nullable()->after('category');
            $table->string('read_time_dv')->nullable()->after('read_time');
            $table->text('intro_dv')->nullable()->after('intro');
            $table->text('conclusion_dv')->nullable()->after('conclusion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn([
                'title_dv',
                'category_dv',
                'read_time_dv',
                'intro_dv',
                'conclusion_dv',
            ]);
        });
    }
};

