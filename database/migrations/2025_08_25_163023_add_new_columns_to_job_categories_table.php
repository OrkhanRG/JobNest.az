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
        Schema::table('job_categories', function (Blueprint $table) {
            $table->enum("is_featured", ["0", "1"])->default("0")->after("is_active");
            $table->integer("sort_order")->default(0)->after("is_featured");
            $table->string("seo_title")->nullable()->after("sort_order");
            $table->text("seo_description")->nullable()->after("seo_title");
            $table->string("seo_keywords")->nullable()->after("seo_description");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_categories', function (Blueprint $table) {

        });
    }
};
