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
        Schema::table('job_categories', function (Blueprint $table) {
            $table->unsignedBigInteger("parent_id")->nullable()->after('id');
            $table->string('icon', 255)->nullable()->after('description');
            $table->enum("is_active", ["0", "1"])->default(0)->after('icon');

            $table->foreign('parent_id')->references('id')->on('job_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_categories', function (Blueprint $table) {
            $table->dropConstrainedForeignId('parent_id');
            $table->dropColumn('parent_id');
            $table->dropColumn('icon');
        });
    }
};
