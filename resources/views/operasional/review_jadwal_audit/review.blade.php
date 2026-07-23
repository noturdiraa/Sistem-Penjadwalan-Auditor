@php
    $jadwalId = request()->query('id');
    $jadwal = \App\Models\JadwalAudit::with(['audit.perusahaan', 'lokasi', 'timAudits.auditor.detailAuditors.ruangLingkup'])->findOrFail($jadwalId);
    $perusahaan = $jadwal->audit->perusahaan;
    $lokasi = $jadwal->lokasi;
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Jadwal Audit</title>
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
                <a href="/operasional/review-jadwal" class="active">
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
            <div></div>
            <div class="right-menu d-flex align-items-center gap-3">
                <i class="far fa-bell fs-5 cursor-pointer"></i>
                <div class="profile">
                    <img src="{{ asset('images/logo.png') }}">
                    <span>Operasional</span>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="header-card">
                <h2 class="title">Review Jadwal</h2>
                <p class="subtitle">Form verifikasi dan persetujuan usulan jadwal audit.</p>
            </div>

            <div class="row">
                <!-- Detail & Tim Audit (Left Column) -->
                <div class="col-lg-8 mb-4">
                    <!-- Detail Jadwal Audit -->
                    <div class="card p-4 border-0 shadow-sm rounded-4 bg-white mb-4">
                        <h5 class="fw-bold mb-4 text-dark" style="font-size: 18px;">
                            <i class="far fa-calendar-check me-2 text-primary"></i>Detail Jadwal Audit
                        </h5>
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
                                        <span class="fw-bold text-dark" style="font-size: 14px;">{{ $perusahaan->nama_perusahaan ?? '-' }}</span>
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
                                        <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->tanggal_mulai ? \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d F Y') : '-' }}</span>
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
                                        <small class="text-secondary d-block mb-1" style="font-size: 12px; font-weight: 500;">Lokasi</small>
                                        <span class="fw-bold text-dark" style="font-size: 14px;">{{ $lokasi->nama_lokasi ?? '-' }}</span>
                                    </div>
                                </div>
                                <!-- Kategori Wilayah -->
                                <div class="d-flex align-items-start gap-3 mb-4">
                                    <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                        <i class="fas fa-map-pin"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block mb-1" style="font-size: 12px; font-weight: 500;">Kategori Wilayah</small>
                                        <span class="fw-bold text-dark" style="font-size: 14px;">{{ $lokasi->kategori_wilayah ?? '-' }}</span>
                                    </div>
                                </div>
                                <!-- Tanggal Selesai -->
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <div class="field-icon-box text-secondary" style="font-size: 20px; width: 24px; text-align: center;">
                                        <i class="far fa-calendar"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block mb-1" style="font-size: 12px; font-weight: 500;">Tanggal Selesai</small>
                                        <span class="fw-bold text-dark" style="font-size: 14px;">{{ $jadwal->tanggal_selesai ? \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d F Y') : '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tim Audit -->
                    <div class="card p-4 border-0 shadow-sm rounded-4 bg-white">
                        <h5 class="fw-bold mb-4 text-dark" style="font-size: 18px;">
                            <i class="fas fa-users-gear me-2 text-primary"></i>Tim Audit
                        </h5>
                        
                        @foreach($jadwal->timAudits as $index => $timAudit)
                            @php
                                $auditor = $timAudit->auditor;
                                $initial = strtoupper(substr($auditor->nama_auditor ?? 'A', 0, 1));
                                $totalAudit = $auditor->riwayatAuditors->count() + $auditor->timAudits->count();
                                $rekomendasi = \App\Models\RekomendasiAuditor::where('id_jadwal', $jadwal->id_jadwal)->where('id_auditor', $auditor->id_auditor)->first();
                                $scoreVal = $rekomendasi ? $rekomendasi->nilai_rekomendasi : '-';
                                $competencies = $auditor->detailAuditors->map(fn($d) => $d->ruangLingkup->nama_ruang_lingkup ?? '')->filter()->unique();
                            @endphp
                            <!-- Auditor Card -->
                            <div class="card p-3 border rounded-3 bg-white mb-3" style="border-color: #E2E8F0 !important; box-shadow: 0 4px 12px rgba(15, 61, 145, 0.02);">
                                <div class="d-flex align-items-start gap-3">
                                    <!-- Initial circle -->
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white fw-bold" style="width: 48px; height: 48px; font-size: 18px; flex-shrink: 0;">
                                        {{ $initial }}
                                    </div>
                                    
                                    <!-- Auditor Info -->
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                            <h6 class="fw-bold text-dark mb-0" style="font-size: 15px;">{{ $auditor->nama_auditor }}</h6>
                                            <span class="badge" style="background: {{ $timAudit->peran === 'Lead Auditor' ? '#FAF5FF' : '#E0F2FE' }}; color: {{ $timAudit->peran === 'Lead Auditor' ? '#7E3AF2' : '#0369A1' }}; font-size: 11px; font-weight: 600; padding: 4px 8px; border-radius: 6px;">{{ $timAudit->peran }}</span>
                                        </div>
                                        <small class="text-secondary d-block mb-3" style="font-size: 12px; font-weight: 500;">NIP: {{ $auditor->nip ?? '-' }}</small>
                                        
                                        <!-- Details Grid -->
                                        <div class="row g-2 mb-3">
                                            <div class="col-sm-6">
                                                <small class="text-secondary d-block" style="font-size: 12px;">Posisi: <strong class="text-dark">{{ $auditor->posisi ?? '-' }}</strong></small>
                                                <small class="text-secondary d-block mt-1" style="font-size: 12px;">Total Penugasan: <strong class="text-dark">{{ $totalAudit }}</strong></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <small class="text-secondary d-block" style="font-size: 12px;">Poin Rekomendasi: <strong class="text-success">{{ $scoreVal }} / 4</strong></small>
                                                <small class="text-secondary d-block mt-1" style="font-size: 12px;">Status: <strong class="text-dark">{{ $auditor->status ?? '-' }}</strong></small>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Form Keputusan (Right Column) -->
                <div class="col-lg-4 mb-4">
                    <div class="card p-4 border-0 shadow-sm rounded-4 bg-white position-sticky" style="top: 20px;">
                        <h5 class="fw-bold mb-4 text-dark" style="font-size: 18px;">
                            <i class="fas fa-circle-check me-2 text-primary"></i>Keputusan Review
                        </h5>
                        <form action="{{ route('operasional.reviewjadwal.submit', $jadwal->id_jadwal) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-2">Tindakan</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="radio" class="btn-check" name="status" id="btnApprove" value="setuju" checked>
                                        <label class="btn btn-outline-success w-100 py-3 d-flex align-items-center justify-content-center gap-2 fw-semibold" for="btnApprove" style="border-radius: 12px;">
                                            <i class="fas fa-check-circle"></i> Setujui
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" class="btn-check" name="status" id="btnReject" value="tolak">
                                        <label class="btn btn-outline-danger w-100 py-3 d-flex align-items-center justify-content-center gap-2 fw-semibold" for="btnReject" style="border-radius: 12px;">
                                            <i class="fas fa-times-circle"></i> Tolak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-2">Catatan Review</label>
                                <textarea name="catatan" class="form-control" rows="4" placeholder="Tuliskan catatan review di sini..." style="border-radius: 12px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold" style="border-radius: 12px;">
                                <i class="fas fa-paper-plane me-1"></i> Kirim Keputusan
                            </button>
                        </form>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
