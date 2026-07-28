<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Katim PJI</title>
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

        /* ================= AUDIT CARD ================= */
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

        .audit-info-row {
            display: flex;
            gap: 25px;
            color: #6B7280;
            font-size: 14px;
            margin-top: 15px;
        }

        .audit-info-row span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn {
            height: 45px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: none;
        }

        .btn-primary {
            background-color: #2563EB;
            border-color: #2563EB;
        }

        .btn-primary:hover {
            background-color: #1D4ED8;
            border-color: #1D4ED8;
        }

        .btn-outline-danger {
            border-color: #EF4444;
            color: #EF4444;
        }

        .btn-outline-danger:hover {
            background-color: #EF4444;
            color: white;
            border-color: #EF4444;
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
                    <a href="/pji/tim-audit">
                        <i class="fas fa-users"></i>
                        Tim Audit
                    </a>
                </li>
                <li>
                    <a href="/pji/review-katim" class="active">
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
                        <h2 class="title">Review Katim PJI</h2>
                        <p class="subtitle">Setujui atau kembalikan jadwal audit yang telah diverifikasi Operasional</p>
                    </div>
                </div>

                <!-- ================= FILTER ROW ================= -->
                <div class="row filter-row align-items-center">
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control table-search-input" placeholder="🔍 Cari ID / Perusahaan...">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select status-filter-select">
                            <option selected>Semua Status</option>
                            <option>Menunggu Persetujuan</option>
                            <option>Disetujui</option>
                            <option>Dikembalikan</option>
                        </select>
                    </div>
                </div>

                <!-- ================= JADWAL LIST ================= -->
                @php
                    $jadwals = \App\Models\JadwalAudit::with(['audit.perusahaan', 'audit.ruangLingkup', 'lokasi', 'timAudits.auditor', 'reviewKatimPjis'])
                        ->whereHas('reviewTeknis', function($q) {
                            $q->where('status_review', 'Dikembalikan');
                        })
                        ->orderBy('updated_at', 'desc')
                        ->get();
                @endphp

                <div class="row g-4 mt-2" id="auditCardsContainer">
                    @forelse($jadwals as $j)
                        @php
                            $perusahaan = $j->audit->perusahaan->nama_perusahaan ?? '-';
                            $jenisAudit = $j->audit->jenis_audit ?? '-';
                            $tanggalText = $j->tanggal_mulai ? \Carbon\Carbon::parse($j->tanggal_mulai)->format('d F Y') : '-';
                            $ruangLingkup = $j->audit->ruangLingkup->nama_ruang_lingkup ?? '-';
                            
                            $lastReview = $j->reviewKatimPjis->sortByDesc('created_at')->first();
                            $rev = $j->reviewTeknis->where('status_review', 'Dikembalikan')->sortByDesc('created_at')->first();
                            $lastRejectionTime = $lastReview 
                                ? $lastReview->created_at 
                                : ($rev ? $rev->created_at : $j->created_at);

                            $hasBeenSubmitted = $j->updated_at->gt($lastRejectionTime);

                            // Determine status review by Katim PJI
                            $statusKatim = 'Menunggu Persetujuan';
                            $badgeClass = 'bg-warning text-dark';

                            if ($j->status_jadwal === 'Aktif' || $j->status_jadwal === 'Selesai') {
                                $statusKatim = 'Disetujui';
                                $badgeClass = 'bg-success text-white';
                            } elseif ($lastReview && $lastReview->status_review === 'Dikembalikan' && $j->status_jadwal === 'Revisi' && !$hasBeenSubmitted) {
                                $statusKatim = 'Dikembalikan';
                                $badgeClass = 'bg-danger text-white';
                            }
                        @endphp
                        <div class="col-12 audit-card" data-status="{{ $statusKatim }}">
                            <div class="card p-4 border-0 shadow-sm rounded-4 bg-white" style="box-shadow: 0 4px 15px rgba(15, 61, 145, 0.04) !important;">
                                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                                    <div>
                                        <h5 class="fw-bold text-dark mb-1" style="font-size: 18px;">{{ $perusahaan }}</h5>
                                        <small class="text-secondary d-block">Ruang Lingkup: {{ $ruangLingkup }}</small>
                                    </div>
                                    <span class="badge {{ $badgeClass }} px-3 py-2 fs-8 rounded-3" style="font-weight: 600;">
                                        {{ $statusKatim }}
                                    </span>
                                </div>
                                <div class="row g-2 mb-3 text-secondary" style="font-size: 13px;">
                                    <div class="col-sm-4">
                                        <i class="fas fa-list-check me-1"></i> Jenis Audit: <strong class="text-dark">{{ $jenisAudit }}</strong>
                                    </div>
                                    <div class="col-sm-4">
                                        <i class="far fa-calendar me-1"></i> Tanggal Audit: <strong class="text-dark">{{ $tanggalText }}</strong>
                                    </div>
                                    <div class="col-sm-4">
                                        <i class="fas fa-location-dot me-1"></i> Lokasi: <strong class="text-dark">{{ $j->lokasi->nama_lokasi ?? '-' }}</strong>
                                    </div>
                                </div>
                                @if($statusKatim === 'Menunggu Persetujuan')
                                    <div class="d-flex justify-content-end">
                                        <a href="/pji/review-katim/review?id={{ $j->id_jadwal }}" class="btn btn-primary btn-sm px-4 py-2" style="border-radius: 8px; font-weight: 600;">
                                            <i class="fas fa-clipboard-check me-1"></i> Review Jadwal
                                        </a>
                                    </div>
                                @else
                                    @if($lastReview && $lastReview->catatan)
                                        <div class="bg-light p-3 rounded-3 text-secondary mb-0 mt-2" style="font-size: 12px; font-style: italic;">
                                            <i class="fas fa-comment-dots text-primary me-1"></i> Catatan Katim: "{{ $lastReview->catatan }}"
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card p-5 border-0 shadow-sm rounded-4 bg-white text-center text-secondary">
                                <i class="fas fa-info-circle fa-2x mb-3 text-secondary" style="opacity: 0.5;"></i>
                                <p class="mb-0" style="font-size: 14px;">Belum ada data review.</p>
                            </div>
                        </div>
                    @endforelse
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const searchInput = document.querySelector(".table-search-input");
        const statusFilter = document.querySelector(".status-filter-select");

        function filterCards() {
            const keyword = searchInput.value.toLowerCase().trim();
            const selectedStatus = statusFilter.value; // "Semua Status", "Menunggu Persetujuan", "Disetujui", "Dikembalikan"
            const cards = document.querySelectorAll(".audit-card");

            cards.forEach(function(card) {
                const textMatch = card.innerText.toLowerCase().includes(keyword);
                const cardStatus = card.getAttribute("data-status");
                const statusMatch = selectedStatus === "Semua Status" || cardStatus === selectedStatus;

                if (textMatch && statusMatch) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }

        if (searchInput) {
            searchInput.addEventListener("keyup", filterCards);
        }
        if (statusFilter) {
            statusFilter.addEventListener("change", filterCards);
        }
    </script>
</body>
</html>