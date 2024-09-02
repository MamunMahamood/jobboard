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
        Schema::table('ajobs', function (Blueprint $table) {
            $table->unsignedBiginteger('provided_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ajobs', function (Blueprint $table) {
            $table->dropColumn('provided_id');
        });
    }
};
