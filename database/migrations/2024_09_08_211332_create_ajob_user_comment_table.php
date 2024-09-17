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
        Schema::create('ajob_user_comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ajob_id');
            $table->unsignedBigInteger('user_id');
            $table->text('comment');
            $table->timestamps();


            $table->foreign('ajob_id')->references('id')->on('ajobs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajob_user_comment');
    }
};
