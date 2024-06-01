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
        Schema::create('coauthors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thesis_id');
            $table->string('first_name');
            $table->string('first_name_en');
            $table->string('last_name');
            $table->string('last_name_en');
            $table->string('middle_name')->nullable();
            $table->string('middle_name_en')->nullable();
            $table->string('organization_title')->nullable();
            $table->string('organization_title_en')->nullable();
            // $table->string('job_title')->nullable();
            // $table->string('job_title_en')->nullable();
            // $table->string('rank_title')->nullable();
            // $table->string('rank_title_')->nullable();
            $table->foreign('thesis_id')->references('id')->on('theses')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coauthors');
    }
};
