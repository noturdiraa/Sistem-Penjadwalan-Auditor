@php
    $jadwals = \App\Models\JadwalAudit::with([
        'audit.perusahaan',
        'audit.ruangLingkup',
        'lokasi',
        'timAudits.auditor.detailAuditors.ruangLingkup'
    ])->get();

    $dbAuditTeams = [];
    foreach ($jadwals as $j) {
        $audit = $j->audit;
        if (!$audit) continue;
        
        $perusahaan = $audit->perusahaan;
        if (!$perusahaan) continue;

        $uiStatus = 'Review';
        if ($j->status_jadwal === 'Aktif') {
            $uiStatus = 'Aktif';
        } elseif ($j->status_jadwal === 'Selesai') {
            $uiStatus = 'Selesai';
        } elseif ($j->status_jadwal === 'Revisi') {
            $uiStatus = 'Review';
        }

        $members = [];
        $leadAuditor = '-';
        foreach ($j->timAudits as $tim) {
            $auditor = $tim->auditor;
            if (!$auditor) continue;

            $competencies = $auditor->detailAuditors->map(fn($d) => $d->ruangLingkup->nama_ruang_lingkup ?? '')->filter()->unique()->values()->all();
            $compLembagas = $auditor->detailAuditors->map(fn($d) => $d->ruangLingkup->lembaga->nama_lembaga ?? '')->filter()->unique()->values()->all();

            // Calculate initials
            $nameParts = explode(' ', trim($auditor->nama_auditor));
            $initials = count($nameParts) > 1 
                ? strtoupper(substr($nameParts[0], 0, 1) . substr($nameParts[1], 0, 1))
                : strtoupper(substr($nameParts[0], 0, 2));

            // Assign avatar background class
            $avatarBg = ($tim->peran === 'Lead Auditor') ? 'bg-avatar-blue' : 'bg-avatar-green';

            // Calculate point
            $rekomendasi = \App\Models\RekomendasiAuditor::where('id_jadwal', $j->id_jadwal)->where('id_auditor', $auditor->id_auditor)->first();
            $point = $rekomendasi ? (float)$rekomendasi->nilai_rekomendasi : 0;

            $members[] = [
                'name' => $auditor->nama_auditor,
                'role' => $tim->peran ?? 'Auditor',
                'NIP' => $auditor->nip ?? '-',
                'status' => $auditor->status ?? 'Aktif',
                'initials' => $initials,
                'avatarBg' => $avatarBg,
                'competencies' => $competencies,
                'scopes' => $competencies,
                'lembaga' => count($compLembagas) > 0 ? implode(', ', $compLembagas) : '-',
                'point' => $point
            ];

            if ($tim->peran === 'Lead Auditor') {
                $leadAuditor = $auditor->nama_auditor;
            }
        }

        $dbAuditTeams[] = [
            'id' => 'AUD-' . $j->id_jadwal,
            'auditCode' => 'AUD-' . $j->id_jadwal,
            'perusahaan' => $perusahaan->nama_perusahaan,
            'ruangLingkup' => $audit->ruangLingkup->nama_ruang_lingkup ?? '-',
            'lembaga' => $audit->jenis_audit ?? '-',
            'tanggal' => ($j->tanggal_mulai ? \Carbon\Carbon::parse($j->tanggal_mulai)->format('d M Y') : '-') . ' - ' . ($j->tanggal_selesai ? \Carbon\Carbon::parse($j->tanggal_selesai)->format('d M Y') : '-'),
            'lead' => $leadAuditor,
            'status' => $uiStatus,
            'members' => $members
        ];
    }
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Audit - BSPJI Palembang</title>
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

        body {
            background: #f4f7fc; /* Warna background disamakan dengan Dashboard PJI */
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 270px;
            height: 100vh;
            background: #0F3D91; /* Warna background disamakan dengan Dashboard PJI (#0F3D91) */
            color: white;
            padding: 14px 18px; /* Padding disamakan dengan Dashboard PJI */
            overflow-y: auto; /* Aktifkan scroll di samping sidebar jika menu melebihi tinggi layar */
            z-index: 1000;
        }

        /* Styling scrollbar untuk sidebar agar terlihat minimalis dan modern */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        .logo {
            text-align: center;
            margin-bottom: 18px; /* Margin-bottom disamakan */
        }

        .logo img {
            width: 70px;
            margin-bottom: 8px;
        }

        .logo h4 {
            font-weight: 700;
            margin: 0;
        }

        .logo p {
            font-size: 13px;
            opacity: .8;
        }

        .menu {
            list-style: none;
            padding: 0; /* Padding disamakan dengan Dashboard PJI (0) agar menu tidak menciut ke tengah */
        }

        .menu li {
            margin-bottom: 10px; /* Margin-bottom disamakan */
        }

        .menu li a {
            display: flex;
            align-items: center;
            gap: 15px;
            border-radius: 12px;
            color: white;
            text-decoration: none;
            white-space: normal;
            padding: 10px 12px; /* Padding menu disamakan */
            font-size: 15px;
            line-height: 1.1;
            transition: none; /* Menghapus transisi agar menu tetap diam dan tidak bergerak saat diklik/hover */
        }

        .menu li a i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .menu li a:hover,
        .menu li a.active {
            background: #2563EB;
        }

        /* ================= CONTENT ================= */
        .content {
            margin-left: 270px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            height: 80px; /* Tinggi navbar disamakan dengan Dashboard PJI (80px) */
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05); /* Shadow disamakan */
        }

        .search {
            width: 350px; /* Lebar kotak cari disamakan dengan Dashboard PJI (350px) */
            transition: none; /* Menghapus transisi */
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px; /* Jarak profil disamakan persis (15px) */
        }

        .profile .bell-icon {
            color: #1F2937;
            font-size: 20px;
            cursor: pointer;
        }

        .profile img {
            width: 45px; /* Ukuran logo disamakan persis (45px) */
            height: 45px;
            border-radius: 50%; /* Logo dibuat bulat tanpa border & background wrap sesuai Dashboard PJI */
            object-fit: contain;
        }

        .profile span {
            font-size: 15px;
            font-weight: 500;
            color: #1F2937;
        }

        .main {
            padding: 35px;
            flex-grow: 1;
        }

        /* ================= HEADER CARD ================= */
        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-card .title {
            font-size: 30px;
            font-weight: 700;
            color: #1F2937;
            margin: 0 0 6px 0;
        }

        .header-card .subtitle {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
        }

        /* ================= STATISTIK ================= */
        .statistik {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-card h6 {
            color: #6B7280;
            font-size: 14px;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .stat-card h2 {
            font-size: 28px;
            font-weight: 700;
            color: #1F2937;
            margin: 0;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        .bg-blue { background-color: #2563EB; }
        .bg-orange { background-color: #D97706; }
        .bg-green { background-color: #059669; }

        /* ================= FILTERS & SECTIONS ================= */
        .filter-row {
            margin-bottom: 22px;
        }

        .table-search-input,
        .status-filter-select {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
            font-size: 14px;
            padding: 10px 16px;
            transition: none;
        }

        .table-search-input:focus,
        .status-filter-select:focus {
            border-color: #2563EB;
            outline: none;
            box-shadow: none;
        }

        /* ================= AUDIT TEAM CARD ================= */
        .audit-card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
        }

        .audit-card .card-title-code {
            font-size: 18px;
            font-weight: 700;
            color: #1F2937;
        }

        .badge-status {
            background-color: #FEF3C7;
            color: #D97706;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
        }

        .audit-info-row {
            display: flex;
            gap: 25px;
            color: #6B7280;
            font-size: 14px;
            margin-top: 8px;
        }

        .audit-info-row span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .avatar-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 13px;
            color: white;
        }

        .bg-avatar-blue { background-color: #2563EB; }
        .bg-avatar-green { background-color: #059669; }
        .bg-avatar-purple { background-color: #7C3AED; }

        /* ================= MODAL MEMBER CARD ================= */
        .modal-member-card {
            background: #F9FAFB;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            padding: 16px;
            height: 100%;
        }

        .modal-badge-competence {
            background-color: #EFF6FF;
            color: #2563EB;
            border-radius: 6px;
            padding: 3px 8px;
            font-size: 11px;
            font-weight: 500;
            display: inline-block;
        }

        .modal-badge-lembaga {
            background-color: #FAF5FF;
            color: #7C3AED;
            border-radius: 6px;
            padding: 3px 8px;
            font-size: 11px;
            font-weight: 500;
            display: inline-block;
        }

        .modal-badge-scope {
            background-color: #F3F4F6;
            color: #4B5563;
            border-radius: 6px;
            padding: 3px 8px;
            font-size: 11px;
            font-weight: 500;
            display: inline-block;
        }

        .btn-outline-secondary {
            border-color: #D1D5DB;
            color: #4B5563;
        }

        .btn-outline-secondary:hover {
            background-color: #F9FAFB;
            border-color: #D1D5DB;
            color: #4B5563;
        }

        .footer hr {
            border-color: #E5E7EB;
            opacity: 1;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="content-wrapper">
        <!-- ================= SIDEBAR ================= -->
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}">
                <h4>BSPJI</h4>
                <p>PJI</p>
            </div>

            <ul class="menu">
                <li>
                    <a href="/dashboard-pji">
                        <i class="fas fa-house"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/pji/perusahaan">
                        <i class="fas fa-building"></i>
                        Kelola Perusahaan
                    </a>
                </li>
                <li>
                    <a href="/pji/audit">
                        <i class="fas fa-file-signature"></i> <!-- Icon dokumen & pena disamakan dengan Dashboard PJI -->
                        Kelola Audit
                    </a>
                </li>
                <li>
                    <a href="/pji/tim-audit" class="active">
                        <i class="fas fa-users"></i>
                        Tim Audit
                    </a>
                </li>
                <li>
                    <a href="/pji/review-katim">
                        <i class="fas fa-clipboard-check"></i> <!-- Icon checklist disamakan dengan Dashboard PJI -->
                        Review Katim PJI
                    </a>
                </li>
                <li>
                    <a href="/pji/profil">
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

        <!-- ================= CONTENT ================= -->
        <div class="content">
            <div class="navbar-custom">
                <input type="text" class="form-control search" placeholder="Cari...">

                <div class="profile">
                    <i class="far fa-bell bell-icon"></i>
                    <img src="{{ asset('images/logo.png') }}">
                    <span>PJI</span>
                </div>
            </div>

            <div class="main">
                <!-- ================= HEADER CARD ================= -->
                <div class="header-card">
                    <div>
                        <h2 class="title">Tim Audit</h2>
                        <p class="subtitle">Daftar tim audit yang telah dibentuk secara otomatis oleh sistem</p>
                    </div>
                </div>

                <!-- ================= STATISTIK ================= -->
                <div class="statistik">
                    <div class="stat-card">
                        <div>
                            <h6>Total Tim</h6>
                            <h2 id="statTotalTim">0</h2>
                        </div>
                        <div class="stat-icon bg-blue">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div>
                            <h6>Sedang Review</h6>
                            <h2 id="statSedangReview">0</h2>
                        </div>
                        <div class="stat-icon bg-orange">
                            <i class="fas fa-rotate"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div>
                            <h6>Aktif / Selesai</h6>
                            <h2 id="statAktifSelesai">0</h2>
                        </div>
                        <div class="stat-icon bg-green">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                    </div>
                </div>

                <!-- ================= FILTER ROW ================= -->
                <div class="row filter-row align-items-center">
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control table-search-input" onkeyup="filterTeams()" placeholder="🔍 Cari ID Audit atau Perusahaan...">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select status-filter-select" onchange="filterTeams()">
                            <option selected>Semua Status</option>
                            <option>Review</option>
                            <option>Aktif</option>
                            <option>Selesai</option>
                        </select>
                    </div>
                </div>

                <!-- ================= CONTAINER TIM AUDIT ================= -->
                <div id="timAuditContainer">
                    <!-- Dynamic list / empty state will be here -->
                </div>

            </div>

            <div class="footer text-center py-4">
                <hr>
                <p class="mb-0 text-secondary">
                    © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
                </p>
            </div>
        </div>
    </div>

    <!-- ================= DETAIL TIM MODAL ================= -->
    <div class="modal fade" id="detailTimModal" tabindex="-1" aria-labelledby="detailTimModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <div class="modal-header" style="border-bottom: 1px solid #F3F4F6; padding: 20px 24px;">
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-1" id="detailTimModalLabel" style="font-size: 20px;">Detail Tim</h5>
                        <small class="text-secondary" id="modalPerusahaanName" style="font-size: 14px;">-</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="transition: none;"></button>
                </div>
                <div class="modal-body" style="padding: 24px;">
                    <!-- Blue Summary Header -->
                    <div class="p-3 mb-4 d-flex flex-wrap justify-content-between rounded-3" style="background-color: #EFF6FF; border: 1px solid #BFDBFE;">
                        <div class="me-3 mb-2 mb-md-0">
                            <span class="text-primary d-block" style="font-size: 11px; font-weight: 600; text-transform: uppercase;">ID Audit</span>
                            <strong class="text-primary" id="modalHeaderAuditCode" style="font-size: 14px;">-</strong>
                        </div>
                        <div class="me-3 mb-2 mb-md-0">
                            <span class="text-primary d-block" style="font-size: 11px; font-weight: 600; text-transform: uppercase;">Perusahaan</span>
                            <strong class="text-primary" id="modalHeaderPerusahaan" style="font-size: 14px;">-</strong>
                        </div>
                        <div class="me-3 mb-2 mb-md-0">
                            <span class="text-primary d-block" style="font-size: 11px; font-weight: 600; text-transform: uppercase;">Jenis Audit</span>
                            <strong class="text-primary" id="modalHeaderLembaga" style="font-size: 14px;">-</strong>
                        </div>
                        <div>
                            <span class="text-primary d-block" style="font-size: 11px; font-weight: 600; text-transform: uppercase;">Tanggal</span>
                            <strong class="text-primary" id="modalHeaderTanggal" style="font-size: 14px;">-</strong>
                        </div>
                    </div>

                    <!-- Anggota Heading -->
                    <h5 class="fw-bold text-dark mb-3" style="font-size: 16px;">Anggota Tim Audit</h5>

                    <!-- Members Cards Row -->
                    <div class="row" id="modalMembersRow">
                        <!-- Dynamic member cards will be rendered here -->
                    </div>
                </div>
                <div class="modal-footer" style="border-top: none; padding: 0 24px 24px;">
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal" style="height: 45px; border-radius: 8px; font-weight: 600; background-color: #F3F4F6; color: #4B5563; border: none; transition: none;">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Data Tim Audit (Dapat dihubungkan ke Database)
        const dbAuditTeams = @json($dbAuditTeams);

        document.addEventListener('DOMContentLoaded', function() {
            renderTeams();
        });

        function renderTeams() {
            const container = document.getElementById('timAuditContainer');
            const searchVal = document.querySelector(".table-search-input").value.toLowerCase().trim();
            const filterVal = document.querySelector(".status-filter-select").value;

            // Filter
            const filtered = dbAuditTeams.filter(team => {
                const matchSearch = team.auditCode.toLowerCase().includes(searchVal) || team.perusahaan.toLowerCase().includes(searchVal);
                const matchStatus = filterVal === "Semua Status" || team.status === filterVal;
                return matchSearch && matchStatus;
            });

            // Update stats
            document.getElementById('statTotalTim').innerText = dbAuditTeams.length;
            document.getElementById('statSedangReview').innerText = dbAuditTeams.filter(t => t.status === 'Review').length;
            document.getElementById('statAktifSelesai').innerText = dbAuditTeams.filter(t => t.status === 'Aktif' || t.status === 'Selesai').length;

            if (filtered.length === 0) {
                container.innerHTML = `
                    <div class="audit-card text-center py-4 text-secondary" style="font-size: 14px;">
                        <i class="fas fa-info-circle me-1"></i> Belum ada data tim audit.
                    </div>
                `;
                return;
            }

            let html = '';
            filtered.forEach(team => {
                let badgeClass = 'bg-warning-subtle text-warning';
                if (team.status === 'Aktif') badgeClass = 'bg-success-subtle text-success';
                if (team.status === 'Selesai') badgeClass = 'bg-primary-subtle text-primary';

                html += `
                    <div class="audit-card">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div>
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <span class="card-title-code">${team.auditCode}</span>
                                    <span class="badge ${badgeClass}" style="font-weight: 600; padding: 6px 12px; border-radius: 8px;">${team.status}</span>
                                </div>
                                <h4 class="fw-bold text-dark mt-2 mb-1" style="font-size: 20px;">${team.perusahaan}</h4>
                                <div class="audit-info-row">
                                    <span><i class="far fa-building"></i> ${team.lembaga}</span>
                                    <span><i class="far fa-calendar"></i> ${team.tanggal}</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary px-3" onclick="showTeamDetail('${team.auditCode}')" style="height: 38px; border-radius: 8px;">
                                <i class="far fa-eye me-1"></i> Detail Tim
                            </button>
                        </div>

                        <!-- Horizontal Avatars Team -->
                        <div class="border-top pt-3 mt-3 d-flex flex-wrap gap-4">
                            ${team.members.map(m => `
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-circle ${m.avatarBg}">${m.initials}</div>
                                <div>
                                    <div class="fw-semibold text-dark" style="font-size: 14px; line-height: 1.2;">${m.name}</div>
                                    <small class="text-muted" style="font-size: 12px;">${m.role}</small>
                                </div>
                            </div>
                            `).join('')}
                        </div>
                    </div>
                `;
            });
            container.innerHTML = html;
        }

        function filterTeams() {
            renderTeams();
        }

        function showTeamDetail(auditCode) {
            const team = dbAuditTeams.find(t => t.auditCode === auditCode);
            if (!team) return;

            document.getElementById('detailTimModalLabel').innerText = `Detail Tim — ${team.auditCode}`;
            document.getElementById('modalPerusahaanName').innerText = team.perusahaan;
            document.getElementById('modalHeaderAuditCode').innerText = team.auditCode;
            document.getElementById('modalHeaderPerusahaan').innerText = team.perusahaan;
            document.getElementById('modalHeaderLembaga').innerText = team.lembaga;
            document.getElementById('modalHeaderTanggal').innerText = team.tanggal;

            let membersHtml = '';
            team.members.forEach(m => {
                membersHtml += `
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="modal-member-card">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="avatar-circle ${m.avatarBg}" style="width: 45px; height: 45px; font-size: 16px;">${m.initials}</div>
                                <div>
                                    <div class="fw-bold text-dark" style="font-size: 14px;">${m.name}</div>
                                    <span class="badge bg-purple-subtle text-purple fs-7" style="padding: 2px 6px; font-size: 10px;"><i class="far fa-star"></i> ${m.role}</span>
                                </div>
                            </div>
                            <div class="mb-2">
                                <small class="text-muted d-block" style="font-size: 11px;">Kompetensi:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    ${m.competencies.map(c => `<span class="modal-badge-competence">${c}</span>`).join('')}
                                </div>
                            </div>
                            <div class="mb-2">
                                <small class="text-muted d-block" style="font-size: 11px;">Jenis Audit:</small>
                                <div class="mt-1">
                                    <span class="modal-badge-lembaga">${m.lembaga}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted d-block" style="font-size: 11px;">Ruang Lingkup:</small>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    ${m.scopes.map(s => `<span class="modal-badge-scope">${s}</span>`).join('')}
                                </div>
                            </div>
                            <div class="border-top pt-2 d-flex justify-content-between align-items-center">
                                <span class="text-success fw-semibold" style="font-size: 12px;"><i class="fas fa-circle fs-8 me-1"></i> ${m.status}</span>
                                <span class="fw-bold text-dark" style="font-size: 13px;">Point: ${m.point}</span>
                            </div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('modalMembersRow').innerHTML = membersHtml;

            // Trigger modal
            const modal = new bootstrap.Modal(document.getElementById('detailTimModal'));
            modal.show();
        }
    </script>
</body>

</html>