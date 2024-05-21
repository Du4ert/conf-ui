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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('organization_title')->nullable();
            $table->string('job_title')->nullable();
            $table->string('rank_title')->nullable();
            $table->longText('thesis_body')->nullable();
            $table->string('thesis_coauthors')->nullable();
            $table->string('file_path')->nullable();
            $table->boolean('pay_status')->default(false);
            $table->boolean('accepted_status')->default(false);
            // Drop old ones
            $table->dropColumn('name');
        });
    }
};



