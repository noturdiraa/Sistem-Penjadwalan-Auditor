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
        Schema::table('riwayat_auditors', function (Blueprint $table) {
            $table->string('kategori_wilayah')->nullable()->after('tim_audit_lainnya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat_auditors', function (Blueprint $table) {
            $table->dropColumn('kategori_wilayah');
        });
    }
};
