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
        Schema::create('ajobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('region');
            $table->integer('vacancy');
            $table->integer('experience');
            $table->decimal('salary', 8, 2);
            $table->string('gender');
            $table->date('application_deadline');
            $table->text('job_description');
            $table->text('responsibilities');
            $table->text('education_experience');
            $table->text('other_benefits');
            $table->string('jobimg');
            $table->string('employment_status');
            $table->string('job_location');
            $table->string('company_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajobs');
    }
};
