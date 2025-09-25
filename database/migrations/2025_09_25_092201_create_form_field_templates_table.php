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
        Schema::create('form_field_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_step_template_id')->constrained('form_step_templates')->cascadeOnDelete();
            $table->string('label');
            $table->string('name')->unique();
            $table->enum('type', ['text', 'email', 'textarea', 'file', 'select', 'radio', 'checkbox', 'date', 'datetime-local', 'number']);
            $table->text('options')->nullable();
            $table->string('validation_rules')->nullable();
            $table->foreignId('parent_field_id')->nullable()->constrained('form_field_templates')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_field_templates');
    }
};
