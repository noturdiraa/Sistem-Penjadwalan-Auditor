<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Teknis</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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

        .card-stat {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            transition: .3s;
            border: none;
        }

        .card-stat:hover {
            transform: translateY(-6px);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            color: white;
        }

        /* Make card content consistent: number larger and left column constrained */
        .card-stat .d-flex>div {
            max-width: calc(100% - 90px)
        }

        .card-stat h2 {
            font-size: 34px
        }

        .card-stat small {
            display: block;
            color: #6b7280;
            font-weight: 500;
        }

        /* Force all statistic cards to same min height and align content */
        .stats-row {
            display: flex;
            flex-wrap: nowrap;
            gap: 20px;
            align-items: stretch;
            overflow-x: auto;
            padding-bottom: 10px
        }

        .stat-card-col {
            flex: 0 0 calc(25% - 15px);
            max-width: calc(25% - 15px)
        }

        .card-stat {
            min-height: 135px;
            padding: 22px;
            display: flex;
            align-items: center
        }

        .card-stat .d-flex {
            width: 100%;
            align-items: center
        }

        .card-stat .d-flex>div:first-child {
            display: flex;
            flex-direction: column;
            justify-content: center
        }

        .card-stat .d-flex>div:first-child h2 {
            margin: 0;
            font-size: 34px
        }

        .card-stat .d-flex>div:first-child small {
            margin-top: 6px;
            color: #6b7280
        }

        .card-stat .icon-box {
            width: 64px;
            height: 64px;
            border-radius: 14px;
            font-size: 22px;
            flex-shrink: 0;
        }

        @media (max-width: 992px) {
            .stat-card-col {
                flex: 0 0 45%;
                max-width: 45%
            }
        }

        @media (max-width: 576px) {
            .stat-card-col {
                flex: 0 0 80%;
                max-width: 80%
            }
        }

        .bg-blue {
            background: #2563EB;
        }

        .bg-green {
            background: #10B981;
        }

        .bg-orange {
            background: #F59E0B;
        }

        .bg-red {
            background: #EF4444;
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

<!-- ================= SIDEBAR ================= -->

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

<!-- ================= CONTENT ================= -->

<div class="content">

    <!-- ================= NAVBAR ================= -->

    <div class="navbar-custom">

        <input type="text" class="form-control search" placeholder="Cari...">

        <div class="profile">

            <i class="far fa-bell fs-5"></i>

            <img src="{{ asset('images/logo.png') }}" alt="Profil">

            <span>Operasional</span>

        </div>

    </div>

    <!-- ================= MAIN ================= -->

    <div class="main">

        <div class="header-card">

            <h2 class="title">Review Jadwal Audit</h2>

            <p class="subtitle">Manajemen review jadwal audit yang dikirim oleh PJI.</p>

        </div>

        <!-- ================= CARD STATISTIK ================= -->

        @php
            $countMenunggu = \App\Models\JadwalAudit::where('status_jadwal', 'Menunggu Review')->count();
            $countDisetujui = \App\Models\JadwalAudit::where('status_jadwal', 'Disetujui')->count();
            $countDikembalikan = \App\Models\JadwalAudit::where('status_jadwal', 'Dikembalikan')->count();
            $countTotal = \App\Models\JadwalAudit::count();
        @endphp

        <div class="stats-row cards-row mb-5">

            <!-- Menunggu Review -->
            <div class="stat-card-col">
                <div class="card-stat">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0 fw-bold text-dark">{{ $countMenunggu }}</h2>
                            <small class="text-secondary mt-1">
                                Menunggu Review
                            </small>
                        </div>
                        <div class="icon-box bg-orange">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disetujui -->
            <div class="stat-card-col">
                <div class="card-stat">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0 fw-bold text-dark">{{ $countDisetujui }}</h2>
                            <small class="text-secondary mt-1">
                                Disetujui
                            </small>
                        </div>
                        <div class="icon-box bg-green">
                            <i class="fas fa-circle-check"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ditolak -->
            <div class="stat-card-col">
                <div class="card-stat">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0 fw-bold text-dark">{{ $countDikembalikan }}</h2>
                            <small class="text-secondary mt-1">
                                Ditolak
                            </small>
                        </div>
                        <div class="icon-box bg-red">
                            <i class="fas fa-circle-xmark"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Review -->
            <div class="stat-card-col">
                <div class="card-stat">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0 fw-bold text-dark">{{ $countTotal }}</h2>
                            <small class="text-secondary mt-1">
                                Total Review
                            </small>
                        </div>
                        <div class="icon-box bg-blue">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<!-- ================= JADWAL PERLU REVIEW ================= -->

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <h4 class="fw-bold mb-4 text-dark" style="font-size: 20px;">
            Jadwal Perlu Review
        </h4>

        @php
            $jadwals = \App\Models\JadwalAudit::with(['audit.perusahaan'])->where('status_jadwal', 'Menunggu Review')->get();
        @endphp
        @if($jadwals->count() > 0)
            @foreach($jadwals as $jadwal)
                <div class="card mb-3 p-3 border rounded-3 bg-white" style="box-shadow: 0 4px 12px rgba(15, 61, 145, 0.03); border-color: #E2E8F0 !important;">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-warning text-dark fw-semibold" style="font-size: 12px; padding: 6px 12px; border-radius: 6px;">{{ $jadwal->status_jadwal }}</span>
                            </div>
                            <h5 class="fw-bold mb-0 text-dark" style="font-size: 16px;">{{ $jadwal->audit->perusahaan->nama_perusahaan ?? '-' }}</h5>
                        </div>
                        <div class="d-flex align-items-center gap-4 flex-wrap">
                            <span class="text-secondary" style="font-size: 14px;">
                                <i class="far fa-calendar me-1"></i> {{ $jadwal->tanggal_mulai ? \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d M Y') : '-' }}
                            </span>
                            <a href="/operasional/review-jadwal/review?id={{ $jadwal->id_jadwal }}" class="btn btn-primary" style="border-radius: 10px; padding: 8px 24px; font-size: 14px; font-weight: 500; height: 38px; display: inline-flex; align-items: center; justify-content: center; transition: none;">Review</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center text-secondary py-4">
                Tidak ada jadwal yang perlu direview.
            </div>
        @endif

    </div>

</div>

</div>

<div class="footer">

<hr>

<p class="mb-0">

© 2026 Sistem Penjadwalan Auditor BSPJI Palembang

</p>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

const menu = document.querySelectorAll(".menu a");

menu.forEach(item=>{

item.addEventListener("click",function(){

menu.forEach(i=>i.classList.remove("active"));

this.classList.add("active");

});

});

</script>

</body>

</html>