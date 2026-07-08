<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review_katim_pjis', function (Blueprint $table) {
            $table->id('id_review_katim');

            $table->foreignId('id_jadwal')
                ->constrained('jadwal_audits', 'id_jadwal')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_user')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->enum('status_review', [
                'Disetujui',
                'Ditolak',
                'Perlu Revisi'
            ]);

            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_katim_pjis');
    }
};