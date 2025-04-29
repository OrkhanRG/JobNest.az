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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('job_category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnDelete();

            $table->string('slug')->unique();
            $table->string('phone')->nullable();
            $table->string("website")->nullable();
            $table->string('position')->nullable();
            $table->decimal('current_salary', 10, 2)->nullable();
            $table->decimal('expected_salary', 10, 2)->nullable();
            $table->date("birth_date")->nullable();
            $table->text('description')->nullable();
            $table->string("address")->nullable();
            $table->string("image")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
