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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->double('price');
            $table->integer('job_limit');
            $table->integer('feature_job_limit');
            $table->integer('highlight_job_limit');
            $table->boolean('profile_verify');
            $table->boolean('recommended');
            $table->boolean('frontend_show');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
