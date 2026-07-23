@php
    $jadwalId = request()->query('id');
    $allJadwals = \App\Models\JadwalAudit::with(['audit.perusahaan'])->where('status_jadwal', 'Menunggu')->get();
    
    if ($jadwalId) {
        $jadwal = \App\Models\JadwalAudit::with(['audit.perusahaan', 'audit.ruangLingkup', 'lokasi'])->find($jadwalId);
    } else {
        $jadwal = $allJadwals->first();
    }
    
    $auditors = \App\Models\Auditor::with(['detailAuditors.ruangLingkup.lembaga', 'timAudits', 'riwayatAuditors'])->get();
    $lembagas = \App\Models\Lembaga::with('ruangLingkups')->get();
    $ruangLingkups = \App\Models\RuangLingkup::all();

    $dbAuditors = [];
    foreach ($auditors as $aud) {
        $compLembagas = $aud->detailAuditors->map(fn($d) => $d->ruangLingkup->lembaga->nama_lembaga ?? '')->filter()->unique()->values()->all();
        $compRuangs = $aud->detailAuditors->map(fn($d) => $d->ruangLingkup->nama_ruang_lingkup ?? '')->filter()->unique()->values()->all();
        
        $totalAudit = $aud->riwayatAuditors->count() + $aud->timAudits->count();
        
        $point = 0;
        if ($jadwal) {
            $rekomendasi = \App\Models\RekomendasiAuditor::where('id_jadwal', $jadwal->id_jadwal)->where('id_auditor', $aud->id_auditor)->first();
            $point = $rekomendasi ? (float)$rekomendasi->nilai_rekomendasi : 0;
        }

        $dbAuditors[] = [
            'id' => $aud->id_auditor,
            'name' => $aud->nama_auditor,
            'nip' => $aud->nip ?? '-',
            'role' => $aud->jenis_auditor ?? 'Auditor',
            'subrole' => $aud->posisi ?? 'Auditor',
            'lembaga' => count($compLembagas) > 0 ? implode(', ', $compLembagas) : '-',
            'ruangLingkup' => count($compRuangs) > 0 ? $compRuangs[0] : '-',
            'point' => $point,
            'totalAudit' => $totalAudit,
            'lokasi' => $jadwal ? ($jadwal->lokasi->kategori_wilayah ?? 'Dalam Kota') : 'Dalam Kota',
            'status' => 'Tersedia',
            'badges' => $compLembagas
        ];
    }
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Auditor Manual</title>
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

        .form-control,
        .form-select {
            height: 46px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            border-color: #2563EB;
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
                <a href="/operasional/input-auditor" class="active">
                    <i class="fas fa-user-plus"></i>
                    Input Auditor Manual
                </a>
            </li>
            <li>
                <a href="/operasional/riwayat-review">
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
            <!-- Header Title -->
            <div class="header-card">
                <div>
                    <h2 class="title mb-0" style="font-size: 26px;">Input Auditor Manual</h2>
                    <p class="subtitle mb-0" style="font-size: 14px;">Pilih dan tetapkan auditor secara manual untuk jadwal audit</p>
                </div>
            </div>

            @if($allJadwals->count() > 0 && $jadwal)
            <!-- Select Schedule Dropdown -->
            <div class="card p-4 border-0 shadow-sm rounded-4 bg-white mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label fw-bold text-dark mb-2"><i class="fas fa-list-check me-1 text-primary"></i> Pilih Perusahaan & Jadwal Audit:</label>
                        <select class="form-select" onchange="location = this.value;" style="border-radius: 10px; font-weight: 500;">
                            @foreach($allJadwals as $j)
                                <option value="/operasional/input-auditor?id={{ $j->id_jadwal }}" {{ $jadwal && $jadwal->id_jadwal == $j->id_jadwal ? 'selected' : '' }}>
                                    {{ $j->audit->perusahaan->nama_perusahaan ?? '-' }} ({{ $j->audit->jenis_audit ?? '-' }} - {{ $j->tanggal_mulai ? \Carbon\Carbon::parse($j->tanggal_mulai)->format('d M Y') : '-' }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Target Audit Card -->
            <div class="card p-4 border-0 shadow-sm rounded-4 bg-white mb-4">
                <h6 class="fw-bold text-primary mb-4" style="font-size: 16px;">
                    <i class="far fa-calendar-check me-2"></i>Jadwal Audit
                </h6>
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <!-- Perusahaan -->
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                <i class="far fa-building"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block mb-1" style="font-size: 12px; font-weight: 500;">Perusahaan</small>
                                <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->audit->perusahaan->nama_perusahaan ?? '-' }}</span>
                            </div>
                        </div>
                        <!-- Jenis Audit -->
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                <i class="fas fa-list-check"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block mb-1" style="font-size: 12px; font-weight: 500;">Jenis Audit</small>
                                <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->audit->jenis_audit ?? '-' }}</span>
                            </div>
                        </div>
                        <!-- Tanggal Mulai -->
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                <i class="far fa-calendar"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block mb-1" style="font-size: 12px; font-weight: 500;">Tanggal Mulai</small>
                                <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->tanggal_mulai ? \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d M Y') : '-' }}</span>
                            </div>
                        </div>
                        <!-- Ruang Lingkup -->
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                <i class="fas fa-circle-nodes"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block mb-1" style="font-size: 12px; font-weight: 500;">Ruang Lingkup</small>
                                <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->audit->ruangLingkup->nama_ruang_lingkup ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- Lokasi -->
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block" style="font-size: 12px; font-weight: 500;">Lokasi</small>
                                <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->lokasi->nama_lokasi ?? '-' }}</span>
                            </div>
                        </div>
                        <!-- Kategori Wilayah -->
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                <i class="fas fa-map-pin"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block" style="font-size: 12px; font-weight: 500;">Kategori Wilayah</small>
                                <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->lokasi->kategori_wilayah ?? '-' }}</span>
                            </div>
                        </div>
                        <!-- Tanggal Selesai -->
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                <i class="far fa-calendar"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block mb-1" style="font-size: 12px; font-weight: 500;">Tanggal Selesai</small>
                                <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->tanggal_selesai ? \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d M Y') : '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Workspace -->
            <div class="row">
                <!-- Left Side: Auditor Selection List -->
                <div class="col-lg-8 mb-4">
                    <div class="card p-4 border-0 shadow-sm rounded-4 bg-white">
                        <!-- Filters -->
                        <div class="row g-2 mb-4">
                            <div class="col-md-5">
                                <div class="position-relative">
                                    <i class="fas fa-search position-absolute text-secondary" style="left: 14px; top: 15px; font-size: 14px;"></i>
                                    <input type="text" class="form-control ps-5" id="searchAuditor" placeholder="Cari nama / NIP auditor...">
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <select class="form-select" id="filterLembaga" onchange="updateRuangLingkupOptions()">
                                    <option value="" selected>Semua Jenis Audit</option>
                                    @foreach($lembagas as $l)
                                        <option value="{{ $l->nama_lembaga }}">{{ $l->nama_lembaga }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-6">
                                <select class="form-select" id="filterRuangLingkup" onchange="renderAuditors()">
                                    <option value="" selected>Semua Ruang Lingkup</option>
                                </select>
                            </div>
                        </div>

                        <!-- Auditor Cards Container -->
                        <div id="auditorCardsContainer">
                            <!-- Dummy cards are generated by Javascript for interactive selection/filtering -->
                        </div>
                    </div>
                </div>

                <!-- Right Side: Selected Team -->
                <div class="col-lg-4 mb-4">
                    <div class="card p-4 border-0 shadow-sm rounded-4 bg-white position-sticky" style="top: 20px;">
                        <h5 class="fw-bold mb-1 text-dark" style="font-size: 16px;">Tim Audit Dipilih</h5>
                        <small class="text-secondary d-block mb-4" id="selectedCountText">0 auditor dipilih</small>

                        <!-- Selected Auditor List -->
                        <div id="selectedAuditorsList" class="mb-4" style="min-height: 120px;">
                            <!-- Empty State -->
                            <div class="text-center py-5 text-secondary border rounded-3 bg-light-subtle d-flex flex-column align-items-center" id="selectedEmptyState" style="border-style: dashed !important; border-color: #cbd5e1 !important;">
                                <i class="fas fa-user-plus fa-2x mb-3 text-secondary" style="opacity: 0.5;"></i>
                                <span style="font-size: 13px;">Belum ada auditor dipilih</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <button class="btn btn-primary w-100 py-3 fw-bold disabled" id="btnSimpanTeam" style="border-radius: 12px;" onclick="simpanTetapkan()">
                            <i class="fas fa-floppy-disk me-1"></i> Simpan & Tetapkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="card p-5 border-0 shadow-sm rounded-4 bg-white text-center mb-4">
            <div class="py-5">
                <i class="fas fa-calendar-times fa-3x mb-3 text-secondary" style="opacity: 0.5;"></i>
                <h4 class="fw-bold mb-2">Tidak Ada Jadwal Audit</h4>
                <p class="text-secondary mb-0">Belum ada jadwal audit yang membutuhkan penetapan auditor manual saat ini.</p>
            </div>
        </div>
        @endif

        <!-- FOOTER -->
        <div class="footer">
            <hr>
            <p class="mb-0">
                © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
            </p>
        </div>
    </div>
    @if($jadwal)
    <!-- Hidden Form for submission -->
    <form id="formSimpanTeam" action="/operasional/input-auditor/save/{{ $jadwal->id_jadwal }}" method="POST" class="d-none">
        @csrf
        <div id="hiddenFieldsContainer"></div>
    </form>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Ruang Lingkup mappings based on Lembaga
        const ruangLingkupByLembaga = {
            @foreach($lembagas as $l)
                '{{ $l->nama_lembaga }}': [
                    @foreach($l->ruangLingkups as $rl)
                        '{{ $rl->nama_ruang_lingkup }}',
                    @endforeach
                ],
            @endforeach
        };

        // Auditor Dynamic Data from Database
        const dbAuditors = @json($dbAuditors);

        let selectedAuditorIds = [];

        // Cascading Dropdown Logic
        function updateRuangLingkupOptions() {
            const lembagaSelect = document.getElementById('filterLembaga');
            const ruangSelect = document.getElementById('filterRuangLingkup');
            const selectedLembaga = lembagaSelect.value;

            // Reset Ruang Lingkup Select
            ruangSelect.innerHTML = '<option value="" selected>Semua Ruang Lingkup</option>';

            if (selectedLembaga !== "") {
                const options = ruangLingkupByLembaga[selectedLembaga] || [];
                options.forEach(opt => {
                    const el = document.createElement('option');
                    el.value = opt;
                    el.innerText = opt;
                    ruangSelect.appendChild(el);
                });
            }

            renderAuditors();
        }

        // Render functions
        function renderAuditors() {
            const container = document.getElementById('auditorCardsContainer');
            if (!container) return;
            const searchVal = document.getElementById('searchAuditor').value.toLowerCase().trim();
            const filterLembaga = document.getElementById('filterLembaga').value;
            const filterRuang = document.getElementById('filterRuangLingkup').value;

            // Filter data
            const filtered = dbAuditors.filter(item => {
                // Search term
                const matchSearch = item.name.toLowerCase().includes(searchVal) || item.nip.includes(searchVal);
                // Lembaga
                const matchLembaga = filterLembaga === "" || item.lembaga === filterLembaga || item.badges.includes(filterLembaga);
                // Ruang Lingkup
                const matchRuang = filterRuang === "" || item.ruangLingkup === filterRuang || item.ruangLingkup.includes(filterRuang);

                return matchSearch && matchLembaga && matchRuang;
            });

            if (filtered.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-5 text-secondary border rounded-3 bg-light-subtle">
                        <i class="fas fa-magnifying-glass fa-2x mb-3 text-secondary" style="opacity: 0.5;"></i>
                        <p class="mb-0" style="font-size: 14px;">Auditor tidak ditemukan dengan kriteria tersebut.</p>
                    </div>
                `;
                return;
            }

            let html = '';
            filtered.forEach(item => {
                const isSelected = selectedAuditorIds.includes(item.id);
                const isBusy = item.status === "Sedang Audit";

                // Action buttons and badges depending on availability
                let btnHtml = '';
                let statusBadgeHtml = '';

                if (isBusy) {
                    statusBadgeHtml = `<span class="badge bg-danger-subtle text-danger fw-semibold" style="font-size: 11px; padding: 4px 8px; border-radius: 6px;">Sedang Audit</span>`;
                    btnHtml = `<button class="btn btn-secondary btn-sm px-3 disabled" style="border-radius: 8px; font-weight: 600; opacity: 0.6;"><i class="fas fa-ban"></i> Sibuk</button>`;
                } else if (isSelected) {
                    statusBadgeHtml = `<span class="badge bg-success-subtle text-success fw-semibold" style="font-size: 11px; padding: 4px 8px; border-radius: 6px;">Tersedia</span>`;
                    btnHtml = `<button class="btn btn-outline-secondary btn-sm px-3 disabled" style="border-radius: 8px; font-weight: 600;"><i class="fas fa-check"></i> Terpilih</button>`;
                } else {
                    statusBadgeHtml = `<span class="badge bg-success-subtle text-success fw-semibold" style="font-size: 11px; padding: 4px 8px; border-radius: 6px;">Tersedia</span>`;
                    btnHtml = `<button class="btn btn-primary btn-sm px-3" style="border-radius: 8px; font-weight: 600;" onclick="selectAuditor(${item.id})"><i class="fas fa-plus"></i> Pilih</button>`;
                }

                // Render matching Figma: Card enclosed in border "kotak"
                html += `
                    <div class="card p-3 border rounded-3 bg-white mb-3" style="border-color: #E2E8F0 !important; box-shadow: 0 4px 12px rgba(15, 61, 145, 0.02); opacity: ${isBusy ? '0.75' : '1'};">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-start gap-3">
                                <!-- Initial Circle Avatar -->
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white fw-bold" style="width: 48px; height: 48px; font-size: 18px; flex-shrink: 0;">
                                    ${item.name.charAt(0)}
                                </div>
                                <!-- Auditor details -->
                                <div>
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <h6 class="fw-bold text-dark mb-0" style="font-size: 15px;">${item.name}</h6>
                                        <span class="badge" style="background: #FAF5FF; color: #7E3AF2; font-size: 11px; font-weight: 600; padding: 4px 8px; border-radius: 6px;">${item.role}</span>
                                    </div>
                                    <small class="text-secondary d-block mb-2" style="font-size: 12px;">NIP: ${item.nip} · ${item.subrole}</small>
                                    
                                    <div class="d-flex gap-4 flex-wrap text-secondary" style="font-size: 12px;">
                                        <div>Jenis Audit: <strong class="text-dark">${item.lembaga}</strong></div>
                                        <div>Total Penugasan: <strong class="text-dark">${item.totalAudit}</strong></div>
                                        <div>Poin: <strong class="text-dark">${item.point} / 4</strong></div>
                                        <div>Lokasi: <strong class="text-dark">${item.lokasi}</strong></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action and Availability on right side -->
                            <div class="text-end flex-shrink-0 d-flex flex-column align-items-end gap-3" style="min-width: 100px;">
                                ${statusBadgeHtml}
                                ${btnHtml}
                            </div>
                        </div>
                    </div>
                `;
            });
            container.innerHTML = html;
        }

        function selectAuditor(id) {
            if (selectedAuditorIds.includes(id)) return;
            selectedAuditorIds.push(id);
            updateSelectedList();
            renderAuditors();
        }

        // Action when deselecting auditor
        function deselectAuditor(id) {
            selectedAuditorIds = selectedAuditorIds.filter(itemId => itemId !== id);
            updateSelectedList();
            renderAuditors();
        }

        function updateSelectedList() {
            const listContainer = document.getElementById('selectedAuditorsList');
            const countText = document.getElementById('selectedCountText');
            const emptyState = document.getElementById('selectedEmptyState');
            const btnSave = document.getElementById('btnSimpanTeam');

            if (!listContainer) return;

            countText.innerText = `${selectedAuditorIds.length} auditor dipilih`;

            if (selectedAuditorIds.length === 0) {
                emptyState.classList.remove('d-none');
                btnSave.classList.add('disabled');
                
                // Clear any rendered items
                const items = listContainer.querySelectorAll('.selected-item-row');
                items.forEach(el => el.remove());
                return;
            }

            emptyState.classList.add('d-none');
            btnSave.classList.remove('disabled');

            // Clear old elements before rendering new ones
            const items = listContainer.querySelectorAll('.selected-item-row');
            items.forEach(el => el.remove());

            selectedAuditorIds.forEach(id => {
                const item = dbAuditors.find(aud => aud.id === id);
                const div = document.createElement('div');
                div.className = 'selected-item-row card p-3 border rounded-3 bg-white mb-2';
                div.style.borderColor = '#e2e8f0';

                // Determine default selected based on role
                const isLead = item.role.toLowerCase().includes('lead') || item.subrole.toLowerCase().includes('lead');
                const roleSelectHtml = `
                    <select class="role-select form-select form-select-sm mt-2" data-auditor-id="${item.id}" style="font-size: 11px; height: 30px; padding: 2px 8px; border-radius: 6px; width: 110px;">
                        <option value="Ketua Tim" ${isLead ? 'selected' : ''}>Ketua Tim</option>
                        <option value="Anggota" ${!isLead ? 'selected' : ''}>Anggota</option>
                    </select>
                `;

                div.innerHTML = `
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary-subtle text-primary fw-bold" style="width: 36px; height: 36px; font-size: 14px; flex-shrink: 0;">
                                ${item.name.charAt(0)}
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 13px;">${item.name}</h6>
                                <small class="text-secondary" style="font-size: 11px;">${item.role}</small>
                                ${roleSelectHtml}
                            </div>
                        </div>
                        <button class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center" onclick="deselectAuditor(${item.id})" style="width: 28px; height: 28px; border-radius: 6px; border-color: #EF4444; color: #EF4444; background: transparent; transition: none; flex-shrink: 0; margin-left: 10px;">
                            <i class="far fa-trash-can" style="font-size: 12px;"></i>
                        </button>
                    </div>
                `;
                listContainer.appendChild(div);
            });
        }

        function simpanTetapkan() {
            const form = document.getElementById('formSimpanTeam');
            const container = document.getElementById('hiddenFieldsContainer');
            if (!form || !container) return;

            container.innerHTML = '';
            
            selectedAuditorIds.forEach((id, index) => {
                const selectEl = document.querySelector(`.role-select[data-auditor-id="${id}"]`);
                const roleVal = selectEl ? selectEl.value : 'Anggota';
                const dbRole = roleVal === 'Ketua Tim' ? 'Lead Auditor' : 'Auditor';
                
                container.innerHTML += `
                    <input type="hidden" name="auditors[${index}][id_auditor]" value="${id}">
                    <input type="hidden" name="auditors[${index}][peran]" value="${dbRole}">
                `;
            });
            
            form.submit();
        }

        // Event listeners
        const searchInput = document.getElementById('searchAuditor');
        if (searchInput) {
            searchInput.addEventListener('input', renderAuditors);
        }
        const ruangFilter = document.getElementById('filterRuangLingkup');
        if (ruangFilter) {
            ruangFilter.addEventListener('change', renderAuditors);
        }

        // Initial render
        renderAuditors();
    </script>
</body>
</html>
