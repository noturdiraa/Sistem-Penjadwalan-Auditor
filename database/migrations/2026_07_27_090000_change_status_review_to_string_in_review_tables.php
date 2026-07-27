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
        Schema::table('review_operasionals', function (Blueprint $table) {
            $table->string('status_review')->change();
        });

        Schema::table('review_katim_pjis', function (Blueprint $table) {
            $table->string('status_review')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('review_operasionals', function (Blueprint $table) {
            $table->enum('status_review', ['Disetujui', 'Ditolak'])->change();
        });

        Schema::table('review_katim_pjis', function (Blueprint $table) {
            $table->enum('status_review', ['Disetujui', 'Ditolak'])->change();
        });
    }
};
