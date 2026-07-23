<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Kepala Balai</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Font -->
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

.sidebar{
position:fixed;
left:0;
top:0;
width:270px;
height:100vh;
background:#0F3D91;
color:white;
padding:14px 18px;
overflow-y:auto;
z-index:1000;
}

.logo{
text-align:center;
margin-bottom:18px;
}

.logo img{
width:70px;
margin-bottom:8px;
}

.logo h4{
font-weight:700;
margin:0;
}

.logo p{
font-size:13px;
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
display:flex;
align-items:center;
gap:15px;
border-radius:12px;
color:white;
text-decoration:none;
white-space:normal;
padding:10px 12px;
font-size:15px;
line-height:1.1;
transition:none;
}

.menu li a:hover,
.menu li a.active{
background:#2563EB;
}

.content{
margin-left:270px;
min-height:100vh;
}

.navbar-custom{
height:80px;
background:white;
display:flex;
justify-content:space-between;
align-items:center;
padding:0 35px;
box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.search{
width:350px;
}

.profile{
display:flex;
align-items:center;
gap:15px;
}

.profile img{
width:45px;
height:45px;
border-radius:50%;
}

.main{
padding:35px;
}

.header-card{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
margin-bottom:30px;
}

.header-card h2{
font-weight:700;
margin-bottom:8px;
}

.header-card p{
margin:0;
color:#777;
}

.card-stat{
        background:white;
        border-radius:20px;
        padding:20px;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
        transition:.3s;
        min-height:145px;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
    }

    .card-stat:hover{
        transform:translateY(-3px);
    }

    .icon-box{
        width:66px;
        height:66px;
        border-radius:18px;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:26px;
        color:white;
    }

    .bg-blue{
        background:#2563EB;
    }

    .bg-green{
        background:#10B981;
    }

    .bg-orange{
        background:#F59E0B;
    }

    .bg-red{
        background:#EF4444;
    }

    .table-box,
    .chart-box {
        background:white;
        border-radius:20px;
        padding:25px;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
        margin-top:35px;
    }

    .progress-sm {
        height: 10px;
        border-radius: 999px;
        overflow: hidden;
        background: #e5e7eb;
    }

    .audit-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(15, 61, 145, 0.08);
    }

    .stat-section {
        background: #ffffff;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(15, 61, 145, 0.08);
    }

    .stat-line {
        width: 100%;
        height: 12px;
        border-radius: 999px;
        background: #e5e7eb;
    }

    .stat-line-fill {
        height: 100%;
        border-radius: 999px;
        transition: width 0.4s ease;
    }

    .bg-purple {
        background: #8b5cf6 !important;
    }

    .auditor-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-top: 1px solid #f3f4f6;
    }

    .auditor-item:first-child {
        border-top: none;
    }

    .auditor-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: 700;
    }

    .auditor-score {
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .text-warning {
        color: #f59e0b !important;
    }

    .table-box {
        display:flex;
        flex-direction:column;
        min-height:100%;
    }

    .row.gy-4 > .col-lg-6 {
        display:flex;
        align-items:stretch;
    }

    .row.gy-4 > .col-lg-6 > .table-box {
        flex:1;
    }

    .table-box .audit-card:last-child {
        margin-bottom: 0;
    }

    .stat-item:last-child,
    .auditor-item:last-child {
        padding-bottom: 0;
    }

    .footer{
        padding:15px;
        text-align:center;
        color:#777;
    }

    .footer hr{
        margin-bottom:15px;
    }

</style>
</head>

<body>

<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

<div class="logo">

<img src="{{ asset('images/logo.png') }}">

<h4>BSPJI</h4>

<p>Kepala Balai</p>

</div>

<ul class="menu">

<li>
<a href="/dashboard-kepala-balai" class="active">
<i class="fas fa-house"></i>
Dashboard
</a>
</li>

<li>
<a href="/kepala-balai/monitoring">
<i class="fas fa-chart-line"></i>
Monitoring
</a>
</li>

<li>
<a href="/kepala-balai/kalender-audit">
<i class="fas fa-calendar-days"></i>
Kalender Audit
</a>
</li>

<li>
<a href="/kepala-balai/grafik-penugasan">
<i class="fas fa-chart-column"></i>
Grafik Penugasan
</a>
</li>

<li>
<a href="/kepala-balai/profil">
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
            <div class="search-box-container" style="position: relative; width: 320px;">
                <input type="text" class="form-control" placeholder="Cari..." style="height: 38px; border-radius: 20px; padding-left: 35px; font-size: 14px; border: 1px solid #E2E8F0; background-color: #F8FAFC;">
                <i class="fas fa-search text-secondary" style="position: absolute; left: 12px; top: 12px; font-size: 14px;"></i>
            </div>

            <div class="profile">
                <i class="far fa-bell fs-5 me-3" style="cursor: pointer; color: #6B7280;"></i>
                <img src="{{ asset('images/logo.png') }}">
                <strong>Kepala Balai</strong>
            </div>
        </div>

        <div class="main">

<div class="header-card">

<h2>Dashboard Kepala Balai</h2>

<p>
Selamat datang di Sistem Penjadwalan Auditor BSPJI Palembang.
Pantau seluruh aktivitas audit dan lihat statistik pelaksanaan audit secara real-time.
</p>

</div>

<!-- ================= LANJUT KE BAGIAN 2 ================= -->
<!-- ================= CARD STATISTIK ================= -->

@php
    $totalAudit = \App\Models\JadwalAudit::count();
    $auditSelesai = \App\Models\JadwalAudit::where('status_jadwal', 'Disetujui')->count();
    $auditBerlangsung = \App\Models\JadwalAudit::where('status_jadwal', 'Menunggu')->count();
@endphp

<div class="row">

    <!-- Total Audit Bulan Ini -->
    <div class="col-lg-4 mb-4">

        <div class="card-stat text-center">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold mb-0 text-dark text-start">{{ $totalAudit }}</h3>
                    <small class="text-secondary">
                        Total Audit Bulan Ini
                    </small>

                </div>

                <div class="icon-box bg-blue">

                    <i class="fas fa-clipboard-list"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- Audit Selesai -->
    <div class="col-lg-4 mb-4">

        <div class="card-stat text-center">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold mb-0 text-dark text-start">{{ $auditSelesai }}</h3>
                    <small class="text-secondary">
                        Audit Selesai
                    </small>

                </div>

                <div class="icon-box bg-green">

                    <i class="fas fa-circle-check"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- Audit Berlangsung -->
    <div class="col-lg-4 mb-4">

        <div class="card-stat text-center">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold mb-0 text-dark text-start">{{ $auditBerlangsung }}</h3>
                    <small class="text-secondary">
                        Audit Berlangsung
                    </small>

                </div>

                <div class="icon-box bg-orange">

                    <i class="fas fa-spinner"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ================= AUDIT SEDANG BERLANGSUNG ================= -->

<div class="row gy-4">

    <div class="col-lg-6">

        <div class="table-box">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="fw-bold mb-0">Audit Sedang Berlangsung</h4>

            </div>

            <div class="audit-card mb-3 text-center">

                <h5 class="mb-3">Belum ada audit berlangsung</h5>

                <p class="text-secondary mb-0">Data audit masih kosong di database.</p>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="table-box">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="fw-bold mb-0">Statistik Audit</h4>

            </div>

            <div class="stat-section mb-4 text-center">

                <h6 class="fw-semibold mb-3">Audit per Ruang Lingkup</h6>

                <p class="text-secondary mb-0">Belum ada data ruang lingkup audit.</p>

            </div>

            <div class="stat-section text-center">

                <h6 class="fw-semibold mb-3">Performa Auditor Terbaik</h6>

                <p class="text-secondary mb-0">Belum ada data auditor terbaik.</p>

            </div>

        </div>

    </div>

</div>

<!-- ================= END STATISTIK AUDIT ================= -->

<!-- ================= FOOTER ================= -->

</div>
<!-- End Main -->

<div class="footer mt-3 text-center text-muted">

    <hr>

    <p class="mb-0">

        © 2026 Sistem Penjadwalan Auditor BSPJI Palembang

    </p>

</div>

</div>
<!-- End Content -->

<!-- ================= Bootstrap ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ================= MENU AKTIF ================= -->

<script>

const menu = document.querySelectorAll(".menu a");

menu.forEach(item => {

    item.addEventListener("click", function(){

        menu.forEach(i => i.classList.remove("active"));

        this.classList.add("active");

    });

});

</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const savedAvatar = localStorage.getItem('kepalabalai_avatar');
            if (savedAvatar) {
                const profileImg = document.querySelector('.profile img');
                if (profileImg) {
                    profileImg.src = savedAvatar;
                }
            }
        });
    </script>
</body>

</html>