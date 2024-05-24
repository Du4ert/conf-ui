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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('organization_title')->nullable();
            $table->string('job_title')->nullable();
            $table->string('rank_title')->nullable();
            $table->string('file')->nullable();
            $table->boolean('pay_status')->default(false);
            $table->boolean('accepted_status')->default(false);
            $table->rememberToken();
            $table->timestamps();

            $table->string('phone')->nullable();
            $table->string('thesis_title_ru')->nullable();
            $table->string('thesis_title_en')->nullable();
            $table->string('section')->nullable();
            $table->string('report_form')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

