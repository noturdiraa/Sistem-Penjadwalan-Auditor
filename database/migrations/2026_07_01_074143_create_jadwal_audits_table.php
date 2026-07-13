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
        Schema::create('jadwal_audits', function (Blueprint $table) {

            $table->id('id_jadwal');

            $table->foreignId('id_audit')
                ->constrained('audits', 'id_audit')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_lokasi')
                ->constrained('lokasis', 'id_lokasi')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('tanggal_mulai');

            $table->date('tanggal_selesai');

            $table->enum('status_jadwal', [
                'Menunggu',
                'Disetujui',
                'Ditolak',
                'Selesai'
            ])->default('Menunggu');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_audits');
    }
};