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
        Schema::table('vacancies', function (Blueprint $table) {
            $table->foreignId('company_form_id')->nullable()->after('company_id')->constrained('company_forms')->nullOnDelete();
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->foreignId('company_form_id')->nullable()->after('company_id')->constrained('company_forms')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropForeign(['company_form_id']);
            $table->dropColumn('company_form_id');
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['company_form_id']);
            $table->dropColumn('company_form_id');
        });
    }
};
