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
            $table->id();

            $table->foreignId('auditor_id')
                ->constrained('auditors')
                ->cascadeOnDelete();

            $table->foreignId('lembaga_id')
                ->constrained('lembagas')
                ->cascadeOnDelete();

            $table->foreignId('ruang_lingkup_id')
                ->constrained('ruang_lingkups')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'auditor_id',
                'lembaga_id',
                'ruang_lingkup_id'
            ]);
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
