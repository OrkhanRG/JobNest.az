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
        Schema::table('companies', function (Blueprint $table) {
            $table->string("tagline")->nullable()->after("slug");
            $table->string("contact_email")->nullable()->after("website");
            $table->unsignedBigInteger("country_id")->nullable()->after("city_id");
            $table->enum("company_size", ["0", "1", "2", "3", "4", "5"])->nullable()->after("location")->comment("0 => 1-10, 1 => 11-50, 2 => 51-200, 3 => 201-500, 4 => 501-1000, 5 => 1000+");
            $table->string("industry")->nullable()->after("company_size");
            $table->year("founded_year")->nullable()->after("industry");
            $table->string("company_type")->nullable()->after("industry");
            $table->enum("is_featured", ["0", "1"])->default("1")->after("company_type");
            $table->integer("vacancy_posts_limit")->default(5)->after("is_featured");
            $table->integer("vacancy_posts_used")->default(0)->after("vacancy_posts_limit");
            $table->enum("can_see_candidate_contacts", ["0", "1"])->default("0")->after("vacancy_posts_used");
            $table->string("seo_title")->nullable()->after("can_see_candidate_contacts");
            $table->text("seo_description")->nullable()->after("seo_title");
            $table->string("seo_keywords")->nullable()->after("seo_description");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
};
