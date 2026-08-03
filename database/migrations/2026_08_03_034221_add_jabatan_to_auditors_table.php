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
        Schema::table('auditors', function (Blueprint $table) {
            $table->enum('jabatan', ['Lead Auditor', 'Auditor', 'Calon Auditor'])->default('Auditor')->after('posisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auditors', function (Blueprint $table) {
            $table->dropColumn('jabatan');
        });
    }
};
