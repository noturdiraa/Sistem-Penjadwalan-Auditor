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
                ->cascadeOnDelete();

            $table->foreignId('id_perusahaan')
                ->nullable()
                ->constrained('perusahaans', 'id_perusahaan')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('id_lembaga')
                ->nullable()
                ->constrained('lembagas', 'id_lembaga')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->string('jenis_audit')->nullable();
            $table->text('tim_audit_lainnya')->nullable();

            $table->foreignId('id_audit')
                ->nullable()
                ->constrained('audits', 'id_audit')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('id_jadwal')
                ->nullable()
                ->constrained('jadwal_audits', 'id_jadwal')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->enum('peran_auditor', [
                'Lead Auditor',
                'Auditor'
            ]);

            $table->enum('status_penugasan', [
                'Berlangsung',
                'Selesai',
                'Dibatalkan'
            ])->default('Berlangsung');

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