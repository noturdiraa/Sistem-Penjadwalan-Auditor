<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\ReviewOperasional;

$reviews = ReviewOperasional::all();
echo "Total ReviewOperasional: " . $reviews->count() . "\n";
foreach ($reviews as $rev) {
    echo "ID: {$rev->id_review_operasional}, Jadwal: {$rev->id_jadwal}, Status: {$rev->status_review}\n";
    $j = $rev->jadwalAudit;
    if (!$j) {
        echo " -> Jadwal NOT found!\n";
    } else {
        echo " -> Jadwal ID: {$j->id_jadwal}, Status: {$j->status_jadwal}\n";
        $a = $j->audit;
        if (!$a) {
            echo "   -> Audit NOT found!\n";
        } else {
            echo "   -> Audit ID: {$a->id_audit}, Status: {$a->status}\n";
        }
    }
}
