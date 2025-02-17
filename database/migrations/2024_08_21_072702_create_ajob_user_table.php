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
        Schema::create('ajob_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('ajob_id');
            $table->unsignedBiginteger('user_id');


            $table->foreign('ajob_id')->references('id')
                 ->on('ajobs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajob_user');
    }
};
