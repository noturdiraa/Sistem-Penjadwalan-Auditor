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
        Schema::create('auditors', function (Blueprint $table) {
            $table->id('id_auditor');

            $table->string('nama_auditor');
            $table->string('nip')->nullable()->unique();
            $table->enum('jenis_auditor', [
            'Pegawai',
            'Subkontrak'
            ]);
            $table->string('posisi')->nullable();
            $table->string('status')->default('Aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditors');
    }
};