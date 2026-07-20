<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Kepegawaian</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f4f7fc;
            overflow-x:hidden;
        }

        /* ===================== SIDEBAR ===================== */

        .sidebar{

            position:fixed;

            left:0;

            top:0;

            width: 290px;

            height:100vh;

            background:#0F3D91;

            padding:18px;

            color:white;

        }

        .logo{

            text-align:center;

            margin-bottom:25px;

        }

        .logo img{

            width:70px;

            margin-bottom:10px;

        }

        .logo h4{

            font-weight:700;

            margin:0;

        }

        .logo p{

            font-size:14px;

            opacity:.8;

        }

        .menu{

            list-style:none;

            padding:0;

        }

        .menu li{

            margin-bottom:10px;

        }

        .menu li a{
            white-space: nowrap;

            display:flex;

            align-items:center;

            gap: 12px;

            padding: 12px 14px;

            border-radius:12px;

            color:white;

            text-decoration:none;

            transition:.3s;

        }

        .menu li a:hover,
        .menu li a.active{

            background:#2563EB;

        }

        /* ===================== CONTENT ===================== */

        .content{

            margin-left: 290px;

            min-height:100vh;

        }

        .navbar-custom{

            background:white;

            padding:20px 35px;

            display:flex;

            justify-content:space-between;

            align-items:center;

            box-shadow:0 5px 15px rgba(0,0,0,.05);

        }

        .search-box{

            width:350px;

        }

        .search-box input{

            border-radius:30px;

            height:45px;

        }

        .search-box input{
            padding:10px 18px;
        }

        .right-menu{

            display:flex;

            align-items:center;

            gap:25px;

        }

        .right-menu i{

            font-size:20px;

            cursor:pointer;

        }

        .profile{

            display:flex;

            align-items:center;

            gap:10px;

        }

        .profile img{

            width:45px;

            height:45px;

            border-radius:50%;

            object-fit:cover;

        }

        .main{

            padding:35px;

        }

        .main h2{

            font-weight:700;

        }

        .main p{

            color:#777;

        }

        /* Header card and table box styles */
        .header-card{
            background: linear-gradient(180deg,#ffffff,#fbfdff);
            border-radius:12px;
            padding:18px 22px;
            box-shadow:0 6px 18px rgba(15,61,145,0.06);
            margin-bottom:18px;
        }

        .header-card .title{font-size:28px;margin:0 0 6px 0;font-weight:700}
        .header-card .subtitle{margin:0;color:#6b7280}

        .table-box{
            background:white;
            border-radius:12px;
            padding:18px;
            box-shadow:0 8px 20px rgba(0,0,0,.06);
            margin-top:18px;
        }

        .table-box .table thead th{background:#dbeafe}

        .auditor-list{
            display:grid;
            gap:14px;
        }

        .auditor-card{
            background:#ffffff;
            border-radius:18px;
            box-shadow:0 8px 20px rgba(0,0,0,.05);
            padding:18px 22px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
        }

        .auditor-info{
            display:flex;
            align-items:center;
            gap:16px;
        }

        .auditor-avatar{
            width:52px;
            height:52px;
            border-radius:50%;
            background:#2563EB;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:20px;
            font-weight:700;
        }

        .auditor-meta h5{
            margin:0;
            font-size:1.05rem;
            font-weight:700;
        }

        .auditor-meta p{
            margin:4px 0 0;
            color:#6b7280;
            font-size:.95rem;
        }

        .badge-group{
            display:flex;
            flex-wrap:wrap;
            gap:8px;
            justify-content:flex-end;
            align-items:center;
        }

        .badge-group .badge{
            padding:.45em .75em;
            border-radius:10px;
            font-size:.78rem;
            font-weight:600;
        }

        .badge-active{
            background:#dcfce7;
            color:#15803d;
        }

        .badge-light{
            background:#e2e8f0;
            color:#0f172a;
        }

    </style>

</head>

<body>

<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

    <div class="logo">

        <img src="{{ asset('images/logo.png') }}">

        <h4>BSPJI</h4>

        <p>Kepegawaian</p>

    </div>

    <ul class="menu">
        <li>
            <a href="/dashboard-kepegawaian" class="active">
                <i class="fas fa-house"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/kepegawaian/auditor">
                <i class="fas fa-users"></i>
                Kelola Auditor
            </a>
        </li>
        <li>
            <a href="/kepegawaian/lembaga">
                <i class="fas fa-landmark"></i>
                Kelola Lembaga
            </a>
        </li>
        <li>
            <a href="/kepegawaian/ruang-lingkup">
                <i class="fas fa-circle-nodes"></i>
                Kelola Ruang Lingkup
            </a>
        </li>
        <li>
            <a href="/kepegawaian/riwayat-auditor">
                <i class="fas fa-clock-rotate-left"></i>
                Riwayat Auditor
            </a>
        </li>
        <li>
            <a href="/kepegawaian/profil">
                <i class="fas fa-user"></i>
                Profil
            </a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" style="background: none; border: none; color: white; display: flex; align-items: center; gap: 12px; width: 100%; padding: 12px 14px; font-size: 15px; line-height: 1.1;">
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

        <div class="search-box">

            <input
                type="text"
                class="form-control"
                placeholder="Cari...">

        </div>

        <div class="right-menu">

            <i class="far fa-bell"></i>

            <div class="profile">

                <img src="{{ asset('images/logo.png') }}">

                <span>Kepegawaian</span>

            </div>

        </div>

    </div>

    <div class="main">

        <div class="header-card">
            <h2 class="title">Dashboard Kepegawaian</h2>
            <p class="subtitle">Selamat datang di Sistem Penjadwalan Auditor BSPJI Palembang</p>
        </div>

        <!-- Card statistik akan kita lanjutkan di Bagian 2 -->
         <!-- ================= CARD STATISTIK ================= -->

<div class="row mt-4">

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body d-flex align-items-center">

                <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                    style="width:70px;height:70px;">

                    <i class="fas fa-users fa-2x"></i>

                </div>

                <div class="ms-3">

                    <h6 class="text-muted mb-1">
                        Total Auditor
                    </h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totalAuditor }}</h3>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body d-flex align-items-center">

                <div class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center"
                    style="width:70px;height:70px;">

                    <i class="fas fa-user-check fa-2x"></i>

                </div>

                <div class="ms-3">

                    <h6 class="text-muted mb-1">
                        Auditor Aktif
                    </h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $auditorAktif }}</h3>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body d-flex align-items-center">

                <div class="bg-warning text-white rounded-circle d-flex justify-content-center align-items-center"
                    style="width:70px;height:70px;">

                    <i class="fas fa-building fa-2x"></i>

                </div>

                <div class="ms-3">

                    <h6 class="text-muted mb-1">
                        Total Lembaga
                    </h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totalLembaga }}</h3>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ================= TABEL AUDITOR ================= -->

<div class="table-box">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">Daftar Auditor</h4>
        <a href="/kepegawaian/auditor" class="text-primary small">Lihat semua →</a>
    </div>

    <div class="auditor-list">
        @forelse($auditors as $auditor)
            <div class="auditor-card shadow-sm border-0">
                <div class="auditor-info">
                    <div class="auditor-avatar" style="background: #2563EB; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 20px;">
                        {{ strtoupper(substr($auditor->nama_auditor, 0, 1)) }}
                    </div>
                    <div class="auditor-meta">
                        <h5 class="fw-bold mb-1 text-dark">{{ $auditor->nama_auditor }}</h5>
                        <p class="small text-muted mb-0">NIP: {{ $auditor->nip ?: '-' }}</p>
                    </div>
                </div>
                <div class="badge-group">
                    {{-- 1. Status Badge: Shape Pill Lonjong dengan Dot Indicator --}}
                    @if($auditor->status == 'Aktif')
                        <span class="badge d-inline-flex align-items-center" style="background: #ECFDF5; color: #065F46; border: 1px solid #A7F3D0; border-radius: 50px; padding: 6px 14px; font-weight: 600; font-size: 12px;">
                            <i class="fas fa-circle me-1 text-success" style="font-size: 8px;"></i> {{ $auditor->status }}
                        </span>
                    @else
                        <span class="badge d-inline-flex align-items-center" style="background: #FEF2F2; color: #991B1B; border: 1px solid #FECACA; border-radius: 50px; padding: 6px 14px; font-weight: 600; font-size: 12px;">
                            <i class="fas fa-circle me-1 text-danger" style="font-size: 8px;"></i> {{ $auditor->status }}
                        </span>
                    @endif

                    {{-- 2. Posisi Badge: Shape Kartu Tiket Kotak dengan Left Accent Border --}}
                    @php
                        $posisiStyle = match($auditor->posisi) {
                            'AMMI' => 'background: #F3E8FF; color: #6B21A8; border-left: 4px solid #9333EA; border-top: 1px solid #E9D5FF; border-right: 1px solid #E9D5FF; border-bottom: 1px solid #E9D5FF;',
                            'Non AMMI' => 'background: #FEF3C7; color: #92400E; border-left: 4px solid #D97706; border-top: 1px solid #FDE68A; border-right: 1px solid #FDE68A; border-bottom: 1px solid #FDE68A;',
                            'Subkon' => 'background: #F1F5F9; color: #334155; border-left: 4px solid #64748B; border-top: 1px solid #E2E8F0; border-right: 1px solid #E2E8F0; border-bottom: 1px solid #E2E8F0;',
                            default => 'background: #F1F5F9; color: #334155; border-left: 4px solid #64748B; border-top: 1px solid #E2E8F0; border-right: 1px solid #E2E8F0; border-bottom: 1px solid #E2E8F0;',
                        };
                    @endphp
                    <span class="badge d-inline-flex align-items-center" style="{{ $posisiStyle }} border-radius: 4px; padding: 5px 12px; font-weight: 700; font-size: 12px;">
                        <i class="fas fa-id-badge me-1" style="opacity: 0.8;"></i> {{ $auditor->posisi }}
                    </span>

                    {{-- 3. Lembaga Badges: Shape Chip Lengkung dengan Icon Gedung --}}
                    @php
                        $grouped = [];
                        foreach ($auditor->detailAuditors as $detail) {
                            $rl = $detail->ruangLingkup;
                            if ($rl && $rl->lembaga) {
                                $grouped[$rl->lembaga->nama_lembaga][] = $rl->nama_ruang_lingkup;
                            }
                        }
                    @endphp
                    @foreach($grouped as $lembaga_nama => $scopes)
                        @php
                            $lembagaStyle = match($lembaga_nama) {
                                'LSPro'   => 'background: #E0F2FE; color: #0369A1; border: 1px solid #BAE6FD;',
                                'LSSM'    => 'background: #EEF2FF; color: #4338CA; border: 1px solid #C7D2FE;',
                                'LSSML'   => 'background: #CCFBF1; color: #0F766E; border: 1px solid #99F6E4;',
                                'LSIH'    => 'background: #D1FAE5; color: #065F46; border: 1px solid #A7F3D0;',
                                'LPH'     => 'background: #FFE4E6; color: #BE123C; border: 1px solid #FECDD3;',
                                'LSHACCP' => 'background: #F5F3FF; color: #6D28D9; border: 1px solid #DDD6FE;',
                                'LSSMK3'  => 'background: #FFEDD5; color: #C2410C; border: 1px solid #FED7AA;',
                                default   => 'background: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE;',
                            };
                        @endphp
                        <span class="badge d-inline-flex align-items-center" style="{{ $lembagaStyle }} border-radius: 10px; padding: 5px 10px; font-weight: 600; font-size: 11px;" title="{{ implode(', ', $scopes) }}">
                            <i class="fas fa-building me-1" style="font-size: 10px; opacity: 0.7;"></i> {{ $lembaga_nama }}
                        </span>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="auditor-card justify-content-center border-0 shadow-sm">
                <div class="auditor-meta text-center" style="width:100%;">
                    <h5 class="mb-2">Belum ada data auditor</h5>
                    <p class="mb-0 text-muted">Silakan tambahkan auditor terlebih dahulu di menu Kelola Auditor.</p>
                </div>
            </div>
        @endforelse
    </div>

</div>

<!-- ================= FOOTER ================= -->

<div class="mt-5 text-center text-muted">

    <hr>

    <p class="mb-3">
        © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
    </p>

</div>

</div>
<!-- End Main -->

</div>
<!-- End Content -->

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function(){

    // Efek aktif menu sidebar

    const menu = document.querySelectorAll(".menu a");

    menu.forEach(item => {

        item.addEventListener("click", function(){

            menu.forEach(i => i.classList.remove("active"));

            this.classList.add("active");

        });

    });

    // Hover Card

    const cards = document.querySelectorAll(".card");

    cards.forEach(card=>{

        card.addEventListener("mouseenter",()=>{

            card.style.transform="translateY(-6px)";

            card.style.transition=".3s";

        });

        card.addEventListener("mouseleave",()=>{

            card.style.transform="translateY(0px)";

        });

    });

});

</script>

</body>

</html>