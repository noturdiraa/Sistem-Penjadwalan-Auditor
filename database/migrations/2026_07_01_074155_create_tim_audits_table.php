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
        Schema::create('tim_audits', function (Blueprint $table) {
            $table->id('id_tim');

            $table->foreignId('id_jadwal')
                ->constrained('jadwal_audits', 'id_jadwal_audit')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_auditor')
                ->constrained('auditors', 'id_auditor')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->enum('peran', ['Lead Auditor', 'Auditor']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_audits');
    }
};