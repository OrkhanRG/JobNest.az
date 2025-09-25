<?php

use App\Enums\{SalaryType, VacancyStatus};
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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->text('responsibilities')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('job_category_id');
            $table->string('address')->nullable();
            $table->string('vacancy_type');
            $table->string('experience_level');
            $table->string('workplace_type');
            $table->string('education_level');
            $table->decimal('min_salary', 8, 2)->nullable();
            $table->decimal('max_salary', 8, 2)->nullable();
            $table->string('salary_type')->default(SalaryType::MONTHLY);
            $table->unsignedBigInteger('currency_id');
            $table->enum('show_salary', ['0', '1'])->default('1');
            $table->enum('salary_negotiable', ['0', '1'])->default('0');
            $table->date('application_deadline')->nullable();
            $table->integer('max_applications')->nullable();
            $table->integer('total_applications')->default(0);
            $table->integer('total_views')->default(0);
            $table->string('application_method');
            $table->string('external_url')->nullable();
            $table->string('contact_email')->nullable();
            $table->json('custom_questions')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->string('status')->default(VacancyStatus::DRAFT);
            $table->enum('is_featured', ['0', '1'])->default('0');
            $table->enum('is_urgent', ['0', '1'])->default('0');
            $table->enum('is_premium', ['0', '1'])->default('0');
            $table->integer('views_count')->default(0);
            $table->timestamp('last_viewed_at')->nullable();
            $table->json('view_analytics')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
