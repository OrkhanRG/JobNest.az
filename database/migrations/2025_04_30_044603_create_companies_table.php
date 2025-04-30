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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->string("name");
            $table->string("phone")->nullable();
            $table->string("website")->nullable();
            $table->unsignedBigInteger("city_id")->nullable();
            $table->string("address")->nullable();
            $table->string("location")->nullable();
            $table->text("description")->nullable();
            $table->string("logo")->nullable();
            $table->string("background_image")->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
