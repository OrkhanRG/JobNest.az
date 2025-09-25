<?php

use App\Enums\ApplicationStatus;
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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->cascadeOnDelete();
            $table->foreignId('candidate_id')->constrained('candidates')->cascadeOnDelete();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignId('resume_id')->nullable()->constrained('resumes')->cascadeOnDelete();
            $table->text('cover_letter')->nullable();
            $table->json('custom_answers')->nullable();
            $table->json('attachments')->nullable();
            $table->string('status')->default(ApplicationStatus::PENDING);
            $table->text('rejection_reason')->nullable();
            $table->text('company_notes')->nullable();
            $table->text('candidate_notes')->nullable();
            $table->timestamp('interview_scheduled_at')->nullable();
            $table->string('interview_location')->nullable();
            $table->string('interview_link')->nullable();
            $table->text('interview_notes')->nullable();
            $table->string('interview_type')->nullable();
            $table->string('interview_status')->nullable();
            $table->timestamp('last_contacted_at')->nullable();
            $table->enum('candidate_viewed', ['0', '1'])->default('0');
            $table->enum('company_viewed', ['0', '1'])->default('0');
            $table->timestamp('candidate_viewed_at')->nullable();
            $table->timestamp('company_viewed_at')->nullable();
            $table->integer('company_rating')->nullable();
            $table->text('company_feedback')->nullable();
            $table->integer('candidate_rating')->nullable();
            $table->text('candidate_feedback')->nullable();
            $table->string('source')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
