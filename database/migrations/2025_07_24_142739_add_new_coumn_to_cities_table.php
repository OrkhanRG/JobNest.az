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
        Schema::table('cities', function (Blueprint $table) {
            $table->unsignedBigInteger("country_id")->after("id");
            $table->unsignedBigInteger("lang_id")->after("country_id");
            $table->enum("is_active", ["0", "1"])->default("0")->after("region_code");

            $table->foreign('country_id')->references("id")->on("countries")->onDelete("cascade");
            $table->foreign('lang_id')->references("id")->on("languages")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            //
        });
    }
};
