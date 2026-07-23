<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard PJI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 270px;
            height: 100vh;
            background: #0F3D91;
            color: white;
            padding: 14px 18px;
            overflow-y: auto; /* Aktifkan scrollbar kustom */
            z-index: 1000;
        }

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
            margin-bottom: 18px;
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
            transition: none; /* Tanpa efek transisi geser */
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
/* Statistik card adjustments */
.card-stat{
background:white;
border-radius:18px;
padding:18px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
transition:.3s;
border:none;
min-height:100px;
}

.card-stat .d-flex > div{
    max-width:calc(100% - 80px);
}

.card-stat h2{
    font-size:28px;
}

.card-stat small{
    display:block;
}

.icon-box{
width:60px;
height:60px;
border-radius:14px;
display:flex;
justify-content:center;
align-items:center;
font-size:22px;
color:white;
}

/* Footer inside content only */
.footer{color:#6b7280;padding:14px 0}
.footer hr{border:none;border-top:1px solid rgba(0,0,0,.8);margin:10px 0 12px;width:100%}

.main h2{

font-weight:700;

}

.main p{

color:#777;

margin-bottom:30px;

}

</style>

</head>

<body>

<div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}">
            <h4>BSPJI</h4>
            <p>PJI</p>
        </div>

        <ul class="menu">
            <li>
                <a href="/dashboard-pji" class="active">
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
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; display: flex; align-items: center; gap: 15px; width: 100%; padding: 10px 12px; font-size: 15px; line-height: 1.1;">
                        <i class="fas fa-right-from-bracket"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

<div class="content">

<div class="navbar-custom">

<input
type="text"
class="form-control search"
placeholder="Cari...">

<div class="profile">

<i class="far fa-bell fs-5"></i>

<img src="{{ asset('images/logo.png') }}">

<span>PJI</span>

</div>

</div>

<div class="main">

<div class="header-card">
    <h2 class="title">Dashboard PJI</h2>
    <p class="subtitle">Selamat datang di Sistem Penjadwalan Auditor BSPJI Palembang.</p>
</div>

<!-- Card Statistik akan dilanjutkan pada Bagian 2 -->
<style>

.card-stat{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
transition:.3s;
border:none;
}

.card-stat:hover{
transform:translateY(-6px);
}

.icon-box{
width:70px;
height:70px;
border-radius:18px;
display:flex;
justify-content:center;
align-items:center;
font-size:28px;
color:white;
}

.bg-blue{background:#2563EB;}
.bg-green{background:#10B981;}
.bg-orange{background:#F59E0B;}
.bg-red{background:#EF4444;}

.table-box{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
margin-top:35px;
}

.chart-box{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
margin-top:35px;
}

.panel-box{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
margin-top:35px;
}

.panel-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:24px;
}

.panel-list{
display:grid;
gap:16px;
}

.panel-item{
display:flex;
justify-content:space-between;
align-items:center;
padding:18px 20px;
border-radius:16px;
background:#f8fafc;
box-shadow:inset 0 1px 0 rgba(255,255,255,.85);
}

.panel-item h5{
margin:0;
font-size:1rem;
}

.panel-item small{
font-size:.95rem;
}

.panel-item .badge{
font-size:.75rem;
padding:.45em .7em;
}

.stats-list{
    display:grid;
    gap:16px;
}

.stats-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:16px 18px;
    border-radius:14px;
    font-weight:600;
    color:#0f172a;
}

.stats-item div{
    display:flex;
    align-items:center;
    gap:12px;
}

.stats-item i{
    width:32px;
    height:32px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:10px;
    color:white;
}

.stats-item-green{background:#ecfdf5;color:#166534;}
.stats-item-green i{background:#16a34a;}

.stats-item-yellow{background:#fef9c3;color:#a16207;}
.stats-item-yellow i{background:#f59e0b;}

.stats-item-blue{background:#dbeafe;color:#1d4ed8;}
.stats-item-blue i{background:#2563eb;}

.stats-item-red{background:#fee2e2;color:#b91c1c;}
.stats-item-red i{background:#dc2626;}

/* Header / banner */
.header-card{
    background: linear-gradient(180deg, #ffffff, #fbfdff);
    border-radius:14px;
    padding:20px 24px;
    box-shadow:0 6px 18px rgba(15,61,145,0.06);
    margin-bottom:22px;
    display:flex;
    flex-direction:column;
}

.header-card .title{
    font-size:30px;
    font-weight:700;
    margin:0 0 6px 0;
}

.header-card .subtitle{
    margin:0;
    color:#6b7280;
    font-size:15px;
}

</style>

@php
    $totalPerusahaan = \App\Models\Perusahaan::count();
    $jadwalAudit = \App\Models\JadwalAudit::count();
    $menungguReview = \App\Models\JadwalAudit::where('status_jadwal', 'Menunggu')->count();
    $auditAktif = \App\Models\JadwalAudit::where('status_jadwal', 'Disetujui')->count();
@endphp

<div class="row">

    <div class="col-lg-3 mb-4">

        <div class="card-stat">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold mb-0 text-dark">{{ $totalPerusahaan }}</h3>
                    <small class="text-secondary">
                        Total Perusahaan
                    </small>

                </div>

                <div class="icon-box bg-blue">

                    <i class="fas fa-building"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 mb-4">

        <div class="card-stat">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold mb-0 text-dark">{{ $jadwalAudit }}</h3>
                    <small class="text-secondary">
                        Jadwal Audit
                    </small>

                </div>

                <div class="icon-box bg-green">

                    <i class="fas fa-calendar-days"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 mb-4">

        <div class="card-stat">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold mb-0 text-dark">{{ $menungguReview }}</h3>
                    <small class="text-secondary">
                        Menunggu Review
                    </small>

                </div>

                <div class="icon-box bg-orange">

                    <i class="fas fa-clock"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 mb-4">

        <div class="card-stat">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold mb-0 text-dark">{{ $auditAktif }}</h3>
                    <small class="text-secondary">
                        Audit Aktif
                    </small>

                </div>

                <div class="icon-box bg-red">

                    <i class="fas fa-clipboard-check"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row gx-4 align-items-stretch">

    <div class="col-lg-7">

        <div class="panel-box h-100">

            <div class="panel-header">

                <h4 class="fw-bold mb-0">
                    Jadwal Audit Terbaru
                </h4>

            </div>

            <div class="panel-list text-center py-5">
                <div class="text-secondary">
                    <i class="fas fa-calendar-times fa-2x mb-3"></i>
                    <p class="mb-1 fw-semibold">Belum ada Jadwal Audit Terbaru</p>
                    <small>Data jadwal audit akan muncul setelah dibuat.</small>
                </div>
            </div>

        </div>

    </div>

    <div class="col-lg-5">

            <div class="chart-box h-100 d-flex flex-column justify-content-center align-items-center text-center px-4">

            <h4 class="fw-bold mb-4">
                Statistik Audit Bulan Ini
            </h4>

            <div class="text-secondary">
                <i class="fas fa-chart-bar fa-2x mb-3"></i>
                <p class="mb-1 fw-semibold">Belum ada data statistik</p>
                <small>Statistik audit akan muncul setelah data audit tersedia.</small>
            </div>

        </div>

    </div>

</div>

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

<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

// Efek menu aktif

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