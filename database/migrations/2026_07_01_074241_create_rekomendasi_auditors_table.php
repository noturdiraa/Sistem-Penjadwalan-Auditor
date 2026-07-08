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
        Schema::create('rekomendasi_auditors', function (Blueprint $table) {
            $table->id('id_rekomendasi');

            $table->foreignId('id_jadwal')
                ->constrained('jadwal_audits', 'id_jadwal')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_auditor')
                ->constrained('auditors', 'id_auditor')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->decimal('nilai_rekomendasi', 5, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_auditors');
    }
};