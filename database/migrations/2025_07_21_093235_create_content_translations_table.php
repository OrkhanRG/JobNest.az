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
        Schema::create('content_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lang_id')->constrained("languages")->cascadeOnDelete();
            $table->binary('group');
            $table->string('key', 150);
            $table->text('value')->nullable();
            $table->enum('is_active', ['0', '1'])->default('0');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE content_translations ADD UNIQUE content_translations_lang_id_group_key_unique (lang_id, `group`(20), `key`(100))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_translations');
    }
};
