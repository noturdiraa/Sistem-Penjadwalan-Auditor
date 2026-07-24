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
        Schema::create('audits', function (Blueprint $table) {
            $table->id('id_audit');

            $table->foreignId('id_perusahaan')
                ->constrained('perusahaans', 'id_perusahaan')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_ruang_lingkup')
                ->constrained('ruang_lingkups', 'id_ruang_lingkup')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('tanggal_permohonan')->nullable();

            $table->string('jenis_audit');

            $table->enum('status', [
                'Review',
                'Aktif',
                'Revisi',
                'Selesai'
            ])->default('Review');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};