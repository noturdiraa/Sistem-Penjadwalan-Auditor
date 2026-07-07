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
        Schema::create('riwayat_auditors', function (Blueprint $table) {
            $table->id('id_riwayat');

            $table->foreignId('id_auditor')
                ->constrained('auditors', 'id_auditor')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_audit')
                ->constrained('audits', 'id_audit')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_jadwal')
                ->constrained('jadwal_audits', 'id_jadwal')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->enum('peran_auditor', [
                'Lead Auditor',
                'Auditor'
            ]);

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_auditors');
    }
};