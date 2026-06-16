<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
        });

        DB::table('blogs')->orderBy('id')->get(['id', 'title'])->each(function ($blog) {
            $baseSlug = Str::slug($blog->title);
            $slug = $baseSlug;
            $counter = 1;

            while (DB::table('blogs')->where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $baseSlug.'-'.$counter;
                $counter++;
            }

            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $slug]);
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
