<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\DB::table('riwayat_auditors')->update(['kategori_wilayah' => null]);
echo "Successfully cleared all kategori_wilayah values in riwayat_auditors to NULL!\n";
