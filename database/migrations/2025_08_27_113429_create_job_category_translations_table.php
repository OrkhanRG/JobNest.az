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
        Schema::create('job_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lang_id')->constrained("languages")->cascadeOnDelete();
            $table->string("name");
            $table->text("description")->nullable();
            $table->string("seo_title")->nullable();
            $table->text("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_category_translations');
    }
};
