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
        Schema::create('detail_auditors', function (Blueprint $table) {
            $table->id('id_detail_auditor');

            $table->foreignId('id_auditor')
                ->constrained('auditors', 'id_auditor')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_ruang_lingkup')
                ->constrained('ruang_lingkups', 'id_ruang_lingkup')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Mencegah auditor memiliki ruang lingkup yang sama lebih dari satu kali
            $table->unique(['id_auditor', 'id_ruang_lingkup']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_auditors');
    }
};