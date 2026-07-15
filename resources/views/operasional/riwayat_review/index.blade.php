<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html {
            overflow-y: scroll;
        }

        body {
            background: #f4f7fc;
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 270px;
    height: 100vh;
    background: #0F3D91;
    color: white;
    padding: 14px 18px;
    overflow-y: auto;
    z-index: 1000;
}

.sidebar::-webkit-scrollbar {
    display: none;
}

.sidebar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.logo {
    text-align: center;
    margin-bottom: 18px;
}

.logo img {
    width: 70px;
    margin-bottom: 8px;
}

.logo h4 {
    font-weight: 700;
    margin: 0;
    font-size: 20px;
}

.logo p {
    font-size: 13px;
    opacity: .8;
    margin: 5px 0 0 0;
}

.menu {
    list-style: none;
    padding: 0;
}

.menu li {
    margin-bottom: 10px;
}

.menu li a {
    display: flex;
    align-items: center;
    gap: 15px;
    border-radius: 12px;
    color: white;
    text-decoration: none;
    white-space: normal;
    padding: 10px 12px;
    font-size: 15px;
    line-height: 1.1;
    transition: none;
}

.menu li a:hover,
.menu li a.active {
    background: #2563EB;
}

.menu li i {
    width: 20px;
    text-align: center;
    font-size: 16px;
}

        /* ================= CONTENT ================= */
        .content {
            margin-left: 270px;
            min-height: 100vh;
        }

        .navbar-custom {
            height: 80px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
        }

        .search {
            width: 350px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .main {
            padding: 35px;
        }

        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, .06);
            margin-bottom: 22px;
        }

        .header-card .title {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .header-card .subtitle {
            color: #6b7280;
            font-size: 15px;
            margin: 0;
        }

        /* ================= STATS CARD ================= */
        .card-stat {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(15, 61, 145, 0.03);
            border: 1px solid #eef2f6;
            display: flex;
            align-items: center;
            gap: 15px;
            min-height: 90px;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .bg-blue-light { background: #EBF5FF; color: #1E429F; }
        .bg-green-light { background: #DEF7EC; color: #03543F; }
        .bg-yellow-light { background: #FDF6B2; color: #723B13; }

        /* ================= FILTER & TABLES ================= */
        .form-control, .form-select {
            height: 42px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            font-size: 14px;
        }

        .table thead th {
            font-size: 13px;
            font-weight: 600;
            color: #4b5563;
            text-transform: none;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #edf2f7;
            padding: 16px 12px;
            white-space: nowrap;
        }

        .table tbody td {
            font-size: 14px;
            color: #1f2937;
            padding: 16px 12px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
            white-space: nowrap;
        }

        .badge-success {
            background: #DEF7EC;
            color: #03543F;
            border-radius: 9999px;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-warning {
            background: #FEECDC;
            color: #9B1C1C;
            border-radius: 9999px;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .footer {
            color: #6b7280;
            padding: 14px 0;
            text-align: center;
        }

        .footer hr {
            border: none;
            border-top: 1px solid rgba(0, 0, 0, .08);
            margin: 10px 0 12px;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo BSPJI">
            <h4>BSPJI</h4>
            <p>Operasional</p>
        </div>

        <ul class="menu">
            <li>
                <a href="/dashboard-operasional">
                    <i class="fas fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/operasional/review-jadwal">
                    <i class="fas fa-calendar-check"></i>
                    Review Jadwal Audit
                </a>
            </li>
            <li>
                <a href="/operasional/input-auditor">
                    <i class="fas fa-user-plus"></i>
                    Input Auditor Manual
                </a>
            </li>
            <li>
                <a href="/operasional/riwayat-review" class="active">
                    <i class="fas fa-clock-rotate-left"></i>
                    Riwayat Review
                </a>
            </li>

        <li>
            <a href="/operasional/kalender-audit">
                <i class="fas fa-calendar-days"></i>
                Kalender Audit
            </a>
        </li>
            <li>
                <a href="/operasional/profil">
                    <i class="fas fa-user"></i>
                    Profil
                </a>
            </li>
                        <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; display: flex; align-items: center; gap: 15px; width: 100%; padding: 14px 18px; font-size: 15px; line-height: 1.1; cursor: pointer;">
                        <i class="fas fa-right-from-bracket"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="navbar-custom">
            <!-- Search bar on left of navbar -->
            <input type="text" class="form-control search" placeholder="Cari...">
            
            <div class="right-menu d-flex align-items-center gap-3">
                <i class="far fa-bell fs-5 cursor-pointer"></i>
                <div class="profile">
                    <img src="{{ asset('images/logo.png') }}">
                    <span>Operasional</span>
                </div>
            </div>
        </div>

        <div class="main">
            <!-- Header Card -->
            <div class="header-card">
                <h2 class="title" style="font-size: 26px;">Riwayat Review</h2>
                <p class="subtitle" style="font-size: 14px;">Rekap semua jadwal audit yang telah Anda review</p>
            </div>

            <!-- Stats Row -->
            <div class="row g-3 mb-4">
                <div class="col-md-4 col-sm-6">
                    <div class="card-stat">
                        <div class="icon-box bg-blue-light">
                            <i class="fas fa-circle-check"></i>
                        </div>
                        <div>
                            <small class="text-secondary d-block" style="font-size: 12px; font-weight: 500;">Total Review</small>
                            <h4 class="fw-bold text-dark mb-0" id="statTotal" style="font-size: 22px;">0</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card-stat">
                        <div class="icon-box bg-green-light">
                            <i class="fas fa-circle-check"></i>
                        </div>
                        <div>
                            <small class="text-secondary d-block" style="font-size: 12px; font-weight: 500;">Disetujui</small>
                            <h4 class="fw-bold text-dark mb-0" id="statDisetujui" style="font-size: 22px;">0</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card-stat">
                        <div class="icon-box bg-yellow-light">
                            <i class="fas fa-clock-rotate-left"></i>
                        </div>
                        <div>
                            <small class="text-secondary d-block" style="font-size: 12px; font-weight: 500;">Dikembalikan</small>
                            <h4 class="fw-bold text-dark mb-0" id="statDikembalikan" style="font-size: 22px;">0</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table & Filters Card -->
            <div class="card p-4 border-0 shadow-sm rounded-4 bg-white">
                <!-- Filters Row -->
                <div class="d-flex align-items-center gap-2 mb-4 w-100">
                    <div class="position-relative flex-grow-1">
                        <i class="fas fa-search position-absolute text-secondary" style="left: 14px; top: 13px; font-size: 14px;"></i>
                        <input type="text" class="form-control ps-5" id="searchTable" placeholder="Cari Perusahaan...">
                    </div>
                    <select class="form-select" id="filterStatus" style="width: 180px; flex-shrink: 0;" onchange="filterData()">
                        <option value="">Semua</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                    </select>
                    <button class="btn p-0 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px; border: 1px solid #e2e8f0; border-radius: 8px; background: white;" onclick="resetFilters()" title="Reset Filter">
                        <i class="fas fa-rotate-right text-secondary"></i>
                    </button>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width: 35%;">Perusahaan</th>
                                <th style="width: 15%;">Tanggal Review</th>
                                <th style="width: 15%;">Reviewer</th>
                                <th style="width: 12%; text-align: center;">Keputusan</th>
                                <th style="width: 25%;">Catatan</th>
                                <th style="width: 8%; text-align: center;">Status</th>
                                <th style="width: 5%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="riwayatTableBody">
                            <!-- Populated dynamically by JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <hr>
            <p class="mb-0">
                © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
            </p>
        </div>
    </div>

    <!-- Modal Detail Riwayat Review -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                <div class="modal-header bg-primary text-white border-0 py-3">
                    <h5 class="modal-title fw-bold" id="detailModalLabel" style="font-size: 18px;">
                        <i class="far fa-folder-open me-2"></i>Detail Riwayat Review
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <div id="modalDetailContent">
                        <!-- Populated dynamically by JS -->
                    </div>
                </div>
                <div class="modal-footer border-0 bg-white py-3">
                    <button type="button" class="btn btn-secondary px-4 fw-semibold" data-bs-dismiss="modal" style="border-radius: 10px;">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    @php
        $reviews = \App\Models\ReviewOperasional::with([
            'jadwalAudit.audit.perusahaan',
            'jadwalAudit.audit.ruangLingkup',
            'jadwalAudit.lokasi',
            'jadwalAudit.timAudits.auditor',
            'user'
        ])->get();

        $formattedReviews = [];
        foreach ($reviews as $rev) {
            $jadwal = $rev->jadwalAudit;
            $audit = $jadwal->audit ?? null;
            $perusahaan = $audit->perusahaan ?? null;
            $ruangLingkup = $audit->ruangLingkup ?? null;
            $lokasi = $jadwal->lokasi ?? null;
            $user = $rev->user;

            $ketua = null;
            $anggotaList = [];
            if ($jadwal && $jadwal->timAudits) {
                foreach ($jadwal->timAudits as $tim) {
                    $auditor = $tim->auditor;
                    if ($auditor) {
                        $item = [
                            'name' => $auditor->nama_auditor ?? '',
                            'role' => $tim->jabatan ?? 'Auditor',
                            'NIP' => $auditor->nip ?? '',
                            'jenisAudit' => $audit->jenis_audit ?? 'Sertifikasi',
                            'point' => 0
                        ];
                        if (strtolower($tim->jabatan) === 'ketua' || strtolower($tim->jabatan) === 'lead auditor') {
                            $ketua = $item;
                        } else {
                            $anggotaList[] = $item;
                        }
                    }
                }
            }

            $formattedReviews[] = [
                'id' => 'AUD-' . ($jadwal->id_jadwal ?? $rev->id_review_teknis),
                'perusahaan' => $perusahaan->nama_perusahaan ?? 'Belum diatur',
                'tanggal' => $rev->created_at ? $rev->created_at->format('d M Y') : '-',
                'reviewer' => $user->nama_user ?? 'Reviewer',
                'keputusan' => $rev->status_review ?? 'Selesai',
                'catatan' => $rev->catatan ?? '-',
                'status' => 'Selesai',
                'jenisAudit' => $audit->jenis_audit ?? 'Sertifikasi',
                'lembaga' => $audit->jenis_audit ?? 'LSSM',
                'ruangLingkup' => $ruangLingkup->nama_ruang_lingkup ?? '-',
                'tanggalMulai' => $jadwal->tanggal_mulai ? \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d M Y') : '-',
                'tanggalSelesai' => $jadwal->tanggal_selesai ? \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d M Y') : '-',
                'lokasi' => $lokasi->nama_lokasi ?? '-',
                'kategoriWilayah' => $lokasi->kategori_wilayah ?? '-',
                'timAudit' => [
                    'ketua' => $ketua,
                    'anggota' => $anggotaList
                ]
            ];
        }
    @endphp
    <script>
        // Dynamic data from database
        const dbRiwayat = {!! json_encode($formattedReviews) !!};

        // Filter and display logic
        function filterData() {
            const searchVal = document.getElementById('searchTable').value.toLowerCase().trim();
            const filterStatus = document.getElementById('filterStatus').value;
            const tbody = document.getElementById('riwayatTableBody');

            const filtered = dbRiwayat.filter(item => {
                const matchSearch = item.perusahaan.toLowerCase().includes(searchVal);
                const matchStatus = filterStatus === "" || item.keputusan === filterStatus;
                return matchSearch && matchStatus;
            });

            // Update Statistics dynamically
            const total = dbRiwayat.length;
            const disetujui = dbRiwayat.filter(x => x.keputusan === "Disetujui").length;
            const dikembalikan = dbRiwayat.filter(x => x.keputusan === "Dikembalikan").length;
            
            document.getElementById('statTotal').innerText = total;
            document.getElementById('statDisetujui').innerText = disetujui;
            document.getElementById('statDikembalikan').innerText = dikembalikan;

            if (filtered.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="8" class="text-center py-5 text-secondary">
                            <i class="fas fa-magnifying-glass fa-2x mb-3 text-secondary" style="opacity: 0.5;"></i>
                            <p class="mb-0">Tidak ada riwayat review yang sesuai dengan pencarian.</p>
                        </td>
                    </tr>
                `;
                return;
            }

            let html = '';
            filtered.forEach((item) => {
                const badgeClass = item.keputusan === "Disetujui" ? "badge-success" : "badge-warning";
                html += `
                    <tr>
                        <td class="fw-semibold text-dark">${item.perusahaan}</td>
                        <td>${item.tanggal}</td>
                        <td>${item.reviewer}</td>
                        <td class="text-center">
                            <span class="${badgeClass}">${item.keputusan}</span>
                        </td>
                        <td class="text-secondary text-truncate" style="max-width: 250px;" title="${item.catatan}">${item.catatan}</td>
                        <td class="text-center text-secondary">${item.status}</td>
                        <td class="text-center">
                            <button onclick="showDetailModal('${item.id}')" class="btn btn-outline-primary p-0 d-flex align-items-center justify-content-center mx-auto" style="width: 32px; height: 32px; border-radius: 6px;" title="Lihat Detail">
                                <i class="far fa-eye" style="font-size: 14px;"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        // Show detailed card layout in Modal
        function showDetailModal(id) {
            const item = dbRiwayat.find(x => x.id === id);
            if (!item) return;

            // Build decisions badge class
            const badgeClass = item.keputusan === "Disetujui" ? "badge-success" : "badge-warning";

            // Build Members (Anggota) list
            let anggotaHtml = '';
            if (item.timAudit.anggota && item.timAudit.anggota.length > 0) {
                item.timAudit.anggota.forEach(ang => {
                    anggotaHtml += `
                        <div class="d-flex align-items-center gap-2 border rounded-3 p-2 bg-light mb-2">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white fw-bold" style="width: 32px; height: 32px; font-size: 13px; flex-shrink: 0;">
                                ${ang.name.charAt(0)}
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 13px;">${ang.name}</h6>
                                <small class="text-secondary d-block" style="font-size: 11px;">${ang.NIP} · Anggota (${ang.jenisAudit})</small>
                                <small class="text-dark fw-semibold" style="font-size: 11px;">Point: <span class="text-success">${ang.point}</span></small>
                            </div>
                        </div>
                    `;
                });
            } else {
                anggotaHtml = `<p class="text-secondary mb-0" style="font-size: 13px; font-style: italic;">Tidak ada anggota tim.</p>`;
            }

            const html = `
                <!-- Detail Jadwal Audit Card -->
                <div class="card p-3 border-0 shadow-sm rounded-3 bg-white mb-3" style="border: 1px solid #eef2f6 !important;">
                    <h6 class="fw-bold text-primary mb-3" style="font-size: 15px;">
                        <i class="far fa-calendar-check me-2"></i>Detail Jadwal Audit
                    </h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-2 mb-3">
                                <div class="text-secondary" style="font-size: 16px; width: 20px;"><i class="far fa-building"></i></div>
                                <div>
                                    <small class="text-secondary d-block" style="font-size: 11px;">Perusahaan</small>
                                    <span class="fw-bold text-dark" style="font-size: 13px;">${item.perusahaan}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2 mb-3">
                                <div class="text-secondary" style="font-size: 16px; width: 20px;"><i class="fas fa-list-check"></i></div>
                                <div>
                                    <small class="text-secondary d-block" style="font-size: 11px;">Jenis Audit</small>
                                    <span class="fw-bold text-dark" style="font-size: 13px;">${item.lembaga}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2 mb-3">
                                <div class="text-secondary" style="font-size: 16px; width: 20px;"><i class="far fa-calendar"></i></div>
                                <div>
                                    <small class="text-secondary d-block" style="font-size: 11px;">Tanggal Mulai</small>
                                    <span class="fw-bold text-dark" style="font-size: 13px;">${item.tanggalMulai}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2">
                                <div class="text-secondary" style="font-size: 16px; width: 20px;"><i class="fas fa-circle-nodes"></i></div>
                                <div>
                                    <small class="text-secondary d-block" style="font-size: 11px;">Ruang Lingkup</small>
                                    <span class="fw-bold text-dark" style="font-size: 13px;">${item.ruangLingkup}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-2 mb-3">
                                <div class="text-secondary" style="font-size: 16px; width: 20px;"><i class="fas fa-location-dot"></i></div>
                                <div>
                                    <small class="text-secondary d-block" style="font-size: 11px;">Lokasi</small>
                                    <span class="fw-bold text-dark" style="font-size: 13px;">${item.lokasi}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2 mb-3">
                                <div class="text-secondary" style="font-size: 16px; width: 20px;"><i class="fas fa-map-pin"></i></div>
                                <div>
                                    <small class="text-secondary d-block" style="font-size: 11px;">Kategori Wilayah</small>
                                    <span class="fw-bold text-dark" style="font-size: 13px;">${item.kategoriWilayah}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2">
                                <div class="text-secondary" style="font-size: 16px; width: 20px;"><i class="far fa-calendar"></i></div>
                                <div>
                                    <small class="text-secondary d-block" style="font-size: 11px;">Tanggal Selesai</small>
                                    <span class="fw-bold text-dark" style="font-size: 13px;">${item.tanggalSelesai}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tim Audit Card -->
                <div class="card p-3 border-0 shadow-sm rounded-3 bg-white mb-3" style="border: 1px solid #eef2f6 !important;">
                    <h6 class="fw-bold text-primary mb-3" style="font-size: 15px;">
                        <i class="fas fa-users-gear me-2"></i>Tim Audit Terpilih
                    </h6>
                    <div class="row">
                        <!-- Ketua Tim -->
                        <div class="col-md-6 mb-3 mb-md-0">
                            <small class="text-secondary d-block mb-2" style="font-size: 12px; font-weight: 500;">Ketua Tim</small>
                            <div class="d-flex align-items-center gap-2 border rounded-3 p-2 bg-light">
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white fw-bold" style="width: 32px; height: 32px; font-size: 13px; flex-shrink: 0;">
                                    ${item.timAudit.ketua.name.charAt(0)}
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 13px;">${item.timAudit.ketua.name}</h6>
                                    <small class="text-secondary d-block" style="font-size: 11px;">${item.timAudit.ketua.NIP} · Ketua (${item.timAudit.ketua.jenisAudit})</small>
                                    <small class="text-dark fw-semibold" style="font-size: 11px;">Point: <span class="text-success">${item.timAudit.ketua.point}</span></small>
                                </div>
                            </div>
                        </div>
                        <!-- Anggota -->
                        <div class="col-md-6">
                            <small class="text-secondary d-block mb-2" style="font-size: 12px; font-weight: 500;">Anggota Tim</small>
                            ${anggotaHtml}
                        </div>
                    </div>
                </div>

                <!-- Hasil Review Card -->
                <div class="card p-3 border-0 shadow-sm rounded-3 bg-white mb-0" style="border: 1px solid #eef2f6 !important;">
                    <h6 class="fw-bold text-primary mb-3" style="font-size: 15px;">
                        <i class="fas fa-clipboard-check me-2"></i>Keputusan & Catatan Review
                    </h6>
                    <div class="row g-2 mb-3 border-bottom pb-2">
                        <div class="col-4">
                            <small class="text-secondary d-block mb-1" style="font-size: 11px;">Status Keputusan</small>
                            <span class="${badgeClass}">${item.keputusan}</span>
                        </div>
                        <div class="col-4 text-center">
                            <small class="text-secondary d-block mb-1" style="font-size: 11px;">Tanggal Review</small>
                            <span class="fw-semibold text-dark" style="font-size: 13px;">${item.tanggal}</span>
                        </div>
                        <div class="col-4 text-end">
                            <small class="text-secondary d-block mb-1" style="font-size: 11px;">Reviewer</small>
                            <span class="fw-semibold text-dark" style="font-size: 13px;">${item.reviewer}</span>
                        </div>
                    </div>
                    <div>
                        <small class="text-secondary d-block mb-1" style="font-size: 11px;">Catatan Reviewer</small>
                        <div class="p-3 bg-light rounded-3 text-secondary" style="font-size: 13px; font-style: italic; border: 1px solid #eef2f6;">
                            "${item.catatan}"
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('modalDetailContent').innerHTML = html;
            
            // Show bootstrap modal
            const myModal = new bootstrap.Modal(document.getElementById('detailModal'));
            myModal.show();
        }

        function resetFilters() {
            document.getElementById('searchTable').value = '';
            document.getElementById('filterStatus').value = '';
            filterData();
        }

        // Live search listener
        document.getElementById('searchTable').addEventListener('input', filterData);

        // Initial execution
        filterData();
    </script>
</body>

</html>
