<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->dropColumn(['ruang_lingkup', 'status_jasa', 'skala', 'bidang_usaha']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->string('ruang_lingkup')->nullable();
            $table->string('status_jasa')->nullable();
            $table->string('skala')->nullable();
            $table->string('bidang_usaha')->nullable();
        });
    }
};
