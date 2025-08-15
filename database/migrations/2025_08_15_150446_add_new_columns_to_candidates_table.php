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
        Schema::table('candidates', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->after('job_category_id')->nullable();
            $table->enum('gender', ['0', '1', '2', '3'])->after('country_id')->comment("'0' => male, '1' => female, '2' => other, '3' prefer_not_to_say")->after('expected_salary');
            $table->string('current_position')->nullable()->after('image');
            $table->string('current_company')->nullable()->after('current_position');
            $table->enum('career_level', ['0', '1', '2', '3', '4', '5'])->nullable()->comment("'0' => student, '1' => entry, '2' => experienced, '3' => manager, '4' => senior_manager, '5' => executive")->after('current_company');
            $table->integer('years_of_experience')->nullable()->after('career_level');
            $table->json('preferred_job_types')->nullable()->after('years_of_experience');
            $table->json('preferred_work_types')->nullable()->after('preferred_job_types');
            $table->enum('is_available', ['0', '1'])->default("1")->after('preferred_work_types');
            $table->enum('is_actively_looking', ['0', '1'])->default("1")->after('is_available');
            $table->date("available_from")->nullable()->after('is_actively_looking');
            $table->enum("show_profile_to_companies", ['0', '1'])->default('1')->after('available_from');
            $table->enum("show_contact_info", ['0', '1'])->default('0')->after('show_profile_to_companies');
            $table->enum("allow_messages", ['0', '1'])->default('1')->after('show_contact_info');
            $table->enum("is_featured", ['0', '1'])->default('1')->after('allow_messages');
            $table->integer("profile_completion_percentage")->default(0)->after('is_featured');
            $table->integer("profile_views")->default(0)->after('profile_completion_percentage');
            $table->timestamp("last_active_at")->nullable()->after('profile_views');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            //
        });
    }
};
