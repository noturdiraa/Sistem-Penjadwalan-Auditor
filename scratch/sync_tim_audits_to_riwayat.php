<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$timAudits = \App\Models\TimAudit::all();
$syncedCount = 0;

foreach ($timAudits as $ta) {
    $jadwal = $ta->jadwalAudit;
    if ($jadwal && $jadwal->audit) {
        $exists = \App\Models\RiwayatAuditor::where('id_jadwal', $ta->id_jadwal)
            ->where('id_auditor', $ta->id_auditor)
            ->exists();

        if (!$exists) {
            $kategoriWilayah = $jadwal->lokasi ? $jadwal->lokasi->kategori_wilayah : null;

            \App\Models\RiwayatAuditor::create([
                'id_auditor' => $ta->id_auditor,
                'id_perusahaan' => $jadwal->audit->id_perusahaan,
                'id_lembaga' => $jadwal->audit->id_ruang_lingkup ? $jadwal->audit->ruangLingkup->id_lembaga : null,
                'jenis_audit' => $jadwal->audit->jenis_audit,
                'id_audit' => $jadwal->id_audit,
                'id_jadwal' => $jadwal->id_jadwal,
                'peran_auditor' => $ta->peran,
                'status_penugasan' => $jadwal->status_jadwal === 'Selesai' ? 'Selesai' : 'Berlangsung',
                'tanggal_mulai' => $jadwal->tanggal_mulai,
                'tanggal_selesai' => $jadwal->tanggal_selesai,
                'kategori_wilayah' => $kategoriWilayah,
            ]);
            $syncedCount++;
        }
    }
}

echo "Successfully synchronized $syncedCount tim_audits to riwayat_auditors!\n";
