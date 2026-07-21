<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Kepegawaian
        User::create([
            'nama_user' => 'Admin Kepegawaian',
            'username'  => 'kepegawaianbspji',
            'password'  => Hash::make('bspji123'),
            'role'      => 'kepegawaian',
        ]);

        // 2. Akun PJI
        User::create([
            'nama_user' => 'Staff PJI',
            'username'  => 'pjibspji',
            'password'  => Hash::make('bspji123'),
            'role'      => 'pji',
        ]);

        // 3. Akun Kepala Balai
        User::create([
            'nama_user' => 'Kepala Balai',
            'username'  => 'kepalabalaibspji',
            'password'  => Hash::make('bspji123'),
            'role'      => 'kepala balai',
        ]);

        // 4. Akun Operasional
        User::create([
            'nama_user' => 'Staff Operasional',
            'username'  => 'operasionalbspji',
            'password'  => Hash::make('bspji123'),
            'role'      => 'operasional',
        ]);

        // 5. Seed Lembaga & Ruang Lingkup
        $data_lembaga = [
            'LSPro' => [
                'Peralatan Permesinan Lainnya (04.99)',
                'Hasil pertanian dan perkebunan (biji kopi, beras) (12.02)',
                'Produk pertanian dan perkebunan lainnya (12.99)',
                'Kopi, teh, kakao, cokelat (15.06)',
                'Gula, Produk Gula (15.03)',
                'Minyak Nabati, Lemak, Minyak Sayur (15.09)',
                'Daging, produk daging, produk ikan dan produk hewani lain dan turunannya (16.02)',
                'Produk hewan dan turunan lainnya (16.99)',
                'Minuman (17.01)',
                'Rempah dan Bumbu (17.02)',
                'Produk Pangan Lainnya (17.99)',
                'Produk Kimia Dasar (18.01)',
                'Pupuk (18.07)',
                'Semen (18.09)',
                'Produk Logam Lembaran (19.04)',
                'Genteng (22.04)',
                'Karet/SIR (23.01)',
                'Pipa/Selang (23.03)',
                'Tangki Air (23.04)',
                'Produk Karet dan Plastik Lainnya (23.99)',
                'Bahan Bangunan, Konstruksi, dan Teknik Sipil Lainnya (25.99)',
                'Mainan Anak (26.01)',
            ],
            'LSSM' => [
                'Pertanian, Kehutanan, dan Perikanan (01)',
                'Produk makanan, minuman, dan tembakau (03)',
                'Kimia, produk kimia dan serat (12)',
                'Karet dan produk plastik (14)',
                'Beton, semen, kapur, plester, dll (16)',
                'Jasa Lainnya (35)',
            ],
            'LSSML' => [
                'Produk makanan, minuman, dan tembakau (03)',
                'Karet dan produk plastik (14)',
            ],
            'LSIH' => [
                'Karet / Crumb Rubber',
                'Pengasapan Karet (RSS)',
                'Minyak Goreng Kelapa Sawit',
                'Air mineral',
                'Biskuit dan produk roti kering lainnya',
                'Semen portland',
                'Pupuk NPK',
                'Baja Lapis Seng (BjLS)',
                'Pupuk Urea',
                'Pupuk Amonium Sulfat',
            ],
            'LSSMKP' => [
                'Pengolahan produk hewan mudah rusak (C I)',
                'Pengolahan produk tanaman mudah rusak (C II)',
                'Pengolahan produk hewan dan tanaman mudah rusak (produk campuran) (C III)',
                'Pengolahan produk yang stabil pada suhu ruang (C IV)',
            ],
            'LPH' => [
                'Makanan',
                'Minuman',
                'Produk Kimiawi',
                'Produk Biologi',
                'Barang Gunaan',
                'Jasa Pengolahan',
                'Jasa Penyimpanan',
                'Jasa Pengemasan',
                'Jasa Pendistribusian',
                'Jasa Penjualan',
                'Jasa Penyajikan',
            ],
            'LSHACCP' => [
                'Lemak, minyak dan emulsi minyak (02.0)',
                'Buah dan Sayur (04.0)',
                'Kembang Gula/Permen dan Coklat (05.0)',
                'Serealia dan produk serealia (06.0)',
                'Produk bakeri (07.0)',
                'Daging dan produk daging (08.0)',
                'Ikan dan produk perikanan (09.0)',
                'Gula dan pemanis termasuk madu (11.0)',
                'Garam, rempah, sup, saus, salad, produk protein (12.0)',
                'Minuman, tidak termasuk produk susu (14.0)',
                'Jasa Boga/Pelayanan Pangan (19.0)',
            ],
            'LSSMK3' => [
                'Karet dan produk plastik (14)',
            ],
        ];

        $lembagaModels = [];
        $rlFirstIds = [];
        foreach ($data_lembaga as $nama_lembaga => $scopes) {
            $lembaga = \App\Models\Lembaga::create([
                'nama_lembaga' => $nama_lembaga,
                'deskripsi'    => 'Lembaga ' . $nama_lembaga . ' BSPJI Palembang',
            ]);
            $lembagaModels[$nama_lembaga] = $lembaga;

            foreach ($scopes as $index => $scope) {
                $rl = \App\Models\RuangLingkup::create([
                    'id_lembaga'         => $lembaga->id_lembaga,
                    'nama_ruang_lingkup' => $scope,
                ]);
                if ($index === 0) {
                    $rlFirstIds[$nama_lembaga] = $rl->id_ruang_lingkup;
                }
            }
        }

        // 6. Restorasi Data Auditor
        $auditorsData = [
            [
                'nama_auditor'  => 'Popy Marlina',
                'nip'           => '197509232002122001',
                'jenis_auditor' => 'Pegawai',
                'posisi'        => 'AMMI',
                'status'        => 'Aktif',
                'lembagas'      => ['LSPro', 'LSSM', 'LSSML', 'LSIH', 'LPH', 'LSHACCP', 'LSSMK3']
            ],
            [
                'nama_auditor'  => 'Risman Affandy',
                'nip'           => '198509252010121003',
                'jenis_auditor' => 'Pegawai',
                'posisi'        => 'AMMI',
                'status'        => 'Aktif',
                'lembagas'      => ['LSPro', 'LSSM', 'LSSML', 'LSIH', 'LPH', 'LSHACCP', 'LSSMK3']
            ],
            [
                'nama_auditor'  => 'Eli Yulita',
                'nip'           => '197803132002122002',
                'jenis_auditor' => 'Pegawai',
                'posisi'        => 'AMMI',
                'status'        => 'Aktif',
                'lembagas'      => ['LSPro', 'LSSM', 'LPH']
            ],
            [
                'nama_auditor'  => 'Nesi Susilawati',
                'nip'           => '197704082005022001',
                'jenis_auditor' => 'Pegawai',
                'posisi'        => 'AMMI',
                'status'        => 'Aktif',
                'lembagas'      => ['LSPro', 'LSSM', 'LSSML', 'LSIH']
            ],
            [
                'nama_auditor'  => 'Eni Efendri',
                'nip'           => null,
                'jenis_auditor' => 'Subkontrak',
                'posisi'        => 'Subkon',
                'status'        => 'Aktif',
                'lembagas'      => ['LSPro', 'LSSM', 'LSIH', 'LSSMK3']
            ],
            [
                'nama_auditor'  => 'Faramitasari',
                'nip'           => '199504182019012001',
                'jenis_auditor' => 'Pegawai',
                'posisi'        => 'AMMI',
                'status'        => 'Aktif',
                'lembagas'      => ['LSPro', 'LSSM']
            ],
        ];

        $createdAuditors = [];
        foreach ($auditorsData as $aData) {
            $auditor = \App\Models\Auditor::create([
                'nama_auditor'  => $aData['nama_auditor'],
                'nip'           => $aData['nip'],
                'jenis_auditor' => $aData['jenis_auditor'],
                'posisi'        => $aData['posisi'],
                'status'        => $aData['status'],
            ]);
            $createdAuditors[$aData['nama_auditor']] = $auditor;

            foreach ($aData['lembagas'] as $lName) {
                if (isset($rlFirstIds[$lName])) {
                    \App\Models\DetailAuditor::create([
                        'id_auditor'      => $auditor->id_auditor,
                        'id_ruang_lingkup' => $rlFirstIds[$lName],
                    ]);
                }
            }
        }

        // 7. Restorasi Data Perusahaan
        $p1 = \App\Models\Perusahaan::create([
            'nama_perusahaan' => 'CV Mulya Insani',
            'status_jasa'     => 'LSSM',
            'ruang_lingkup'   => 'Pertanian, Kehutanan, dan Perikanan (01)',
            'bidang_usaha'    => 'Pengolahan Kayu & Hasil Hutan',
            'skala'           => 'Kecil',
            'no_telepon'      => '081277665544',
            'email'           => 'contact@mulyainsani.com',
            'alamat'          => 'Jl. Angkatan 45 No. 12, Palembang',
            'provinsi'        => 'Sumatera Selatan',
            'status'          => 'Aktif',
        ]);

        $p2 = \App\Models\Perusahaan::create([
            'nama_perusahaan' => 'PT Darussalam Tegal Rejo Jaya Tirta',
            'status_jasa'     => 'LSPro',
            'ruang_lingkup'   => 'Air mineral',
            'bidang_usaha'    => 'Industri Air Minum Dalam Kemasan (AMDK)',
            'skala'           => 'Besar',
            'no_telepon'      => '081122334455',
            'email'           => 'info@darussalamtirta.co.id',
            'alamat'          => 'Jl. Raya Tegal Rejo No. 88, Muara Enim',
            'provinsi'        => 'Sumatera Selatan',
            'status'          => 'Aktif',
        ]);

        $p3 = \App\Models\Perusahaan::create([
            'nama_perusahaan' => 'PT Darussalam Tegal Rejo Jaya Tirta',
            'status_jasa'     => 'LPH',
            'ruang_lingkup'   => 'Minuman',
            'bidang_usaha'    => 'Sertifikasi Halal Minuman Kemasan',
            'skala'           => 'Besar',
            'no_telepon'      => '081122334455',
            'email'           => 'info@darussalamtirta.co.id',
            'alamat'          => 'Jl. Raya Tegal Rejo No. 88, Muara Enim',
            'provinsi'        => 'Sumatera Selatan',
            'status'          => 'Aktif',
        ]);

        // 8. Restorasi Data Riwayat Penugasan Auditor
        if (isset($createdAuditors['Nesi Susilawati']) && isset($lembagaModels['LSSM'])) {
            \App\Models\RiwayatAuditor::create([
                'id_auditor'        => $createdAuditors['Nesi Susilawati']->id_auditor,
                'id_perusahaan'     => $p1->id_perusahaan,
                'id_lembaga'        => $lembagaModels['LSSM']->id_lembaga,
                'jenis_audit'       => 'Sertifikasi Awal',
                'tim_audit_lainnya' => 'Faramitasari (NIP: 199504182019012001)',
                'peran_auditor'     => 'Lead Auditor',
                'status_penugasan'  => 'Selesai',
                'tanggal_mulai'     => '2026-01-06',
                'tanggal_selesai'   => '2026-01-07',
                'keterangan'        => 'Pelaksanaan audit sertifikasi awal berjalan dengan lancar.',
            ]);
        }

        if (isset($createdAuditors['Risman Affandy']) && isset($lembagaModels['LSPro'])) {
            \App\Models\RiwayatAuditor::create([
                'id_auditor'        => $createdAuditors['Risman Affandy']->id_auditor,
                'id_perusahaan'     => $p2->id_perusahaan,
                'id_lembaga'        => $lembagaModels['LSPro']->id_lembaga,
                'jenis_audit'       => 'Sertifikasi Awal',
                'tim_audit_lainnya' => null,
                'peran_auditor'     => 'Auditor',
                'status_penugasan'  => 'Selesai',
                'tanggal_mulai'     => '2026-01-06',
                'tanggal_selesai'   => '2026-01-07',
                'keterangan'        => 'Audit kesesuaian produk AMDK.',
            ]);
        }
    }
}
