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
        Schema::create('company_form_layouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_form_id')->constrained('company_forms')->cascadeOnDelete();
            $table->foreignId('form_step_template_id')->constrained('form_step_templates')->cascadeOnDelete();
            $table->foreignId('form_field_template_id')->constrained('form_field_templates')->cascadeOnDelete();
            $table->integer('step_order');
            $table->integer('field_order');
            $table->boolean('is_required_override')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_form_layouts');
    }
};
