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

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#F4F7FC;
overflow-x:hidden;
}

/* ================= SIDEBAR ================= */

.sidebar{

position:fixed;
left:0;
top:0;
width:280px;
height:100vh;

background:#1E429F;
color:white;

}

.logo{

display:flex;
align-items:center;
gap:15px;

padding:25px;

border-bottom:1px solid rgba(255,255,255,.15);

}

.logo img{

width:55px;
height:55px;

border-radius:50%;

background:white;
padding:6px;

}

.logo h4{

margin:0;
font-weight:700;
font-size:28px;

}

.logo p{

margin:0;
font-size:15px;
opacity:.8;

}

.menu{

list-style:none;
padding:20px;

}

.menu li{

margin-bottom:10px;

}

.menu li a{

display:flex;
align-items:center;
gap:15px;

padding:15px 20px;

border-radius:14px;

text-decoration:none;

font-size:18px;

color:white;

transition:.3s;

}

.menu li a:hover,
.menu li a.active{

background:#2563EB;

}

.menu li i{

width:24px;

text-align:center;

}

/* ================= CONTENT ================= */

.content{

margin-left:280px;
min-height:100vh;

}

/* ================= NAVBAR ================= */

.navbar-custom{

height:90px;

background:white;

display:flex;
justify-content:space-between;
align-items:center;

padding:0 35px;

box-shadow:0 4px 15px rgba(0,0,0,.05);

}

.search{

width:520px;
height:48px;

border-radius:30px;

}

.profile{

display:flex;
align-items:center;
gap:20px;

}

.profile img{

width:45px;
height:45px;

border-radius:50%;

}

.profile i{

font-size:23px;

}

.main{

padding:40px;

}

.breadcrumb{

font-size:17px;

margin-bottom:18px;

}

.page-title h1{

font-size:55px;

font-weight:700;

color:#1F2937;

margin-bottom:10px;

}

.page-title p{

font-size:23px;

color:#6B7280;

margin-bottom:35px;

}

.footer{

padding:30px;

text-align:center;

color:#777;

}

</style>

</head>

<body>

<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

<div class="logo">

<img src="{{ asset('images/logo.png') }}">

<div>

<h4>BSPJI</h4>

<p>Teknis</p>

</div>

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

<i class="fas fa-clipboard-check"></i>

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

<a href="/operasional/profil">

<i class="fas fa-user"></i>

Profil

</a>

</li>

<li>

<a href="/login">

<i class="fas fa-right-from-bracket"></i>

Logout

</a>

</li>

</ul>

</div>

<!-- ================= CONTENT ================= -->

<div class="content">

<!-- ================= NAVBAR ================= -->

<div class="navbar-custom">

<input
type="text"
class="form-control search"
placeholder="Cari...">

<div class="profile">

<i class="far fa-bell"></i>

<img src="{{ asset('images/logo.png') }}">

<strong>Teknis</strong>

</div>

</div>

<!-- ================= MAIN ================= -->

<div class="main">

<div class="breadcrumb">

Dashboard

</div>

<div class="page-title">

<h1>Dashboard Teknis</h1>

<p>Selamat datang di Sistem Review Jadwal Audit</p>

</div>
<!-- ================= CARD STATISTIK ================= -->

<div class="row g-4 mb-5">

    <div class="col-lg-3">

        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-secondary">
                        Menunggu Review
                    </small>

                    <h1 class="fw-bold mt-2 mb-0">
                        8
                    </h1>

                </div>

                <div
                    class="d-flex justify-content-center align-items-center rounded-circle"
                    style="
                    width:75px;
                    height:75px;
                    background:#FFC107;
                    color:white;
                    font-size:34px;">

                    <i class="fas fa-clock"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-secondary">
                        Disetujui
                    </small>

                    <h1 class="fw-bold mt-2 mb-0">
                        25
                    </h1>

                </div>

                <div
                    class="d-flex justify-content-center align-items-center rounded-circle"
                    style="
                    width:75px;
                    height:75px;
                    background:#22C55E;
                    color:white;
                    font-size:34px;">

                    <i class="fas fa-circle-check"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-secondary">
                        Ditolak
                    </small>

                    <h1 class="fw-bold mt-2 mb-0">
                        3
                    </h1>

                </div>

                <div
                    class="d-flex justify-content-center align-items-center rounded-circle"
                    style="
                    width:75px;
                    height:75px;
                    background:#EF4444;
                    color:white;
                    font-size:34px;">

                    <i class="fas fa-circle-xmark"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-secondary">
                        Total Review
                    </small>

                    <h1 class="fw-bold mt-2 mb-0">
                        36
                    </h1>

                </div>

                <div
                    class="d-flex justify-content-center align-items-center rounded-circle"
                    style="
                    width:75px;
                    height:75px;
                    background:#2563EB;
                    color:white;
                    font-size:34px;">

                    <i class="fas fa-file-lines"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ================= JADWAL PERLU REVIEW ================= -->

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <h3 class="fw-bold mb-4">

            Jadwal Perlu Review

        </h3>
        <!-- ================= LIST JADWAL REVIEW ================= -->

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3 class="fw-bold mb-2">
                    AUD-2026-001
                </h3>

                <h4 class="mb-3">
                    PT ABC Indonesia
                </h4>

                <span class="badge bg-warning text-dark px-3 py-2">
                    Menunggu Review
                </span>

            </div>

            <div class="text-end">

                <p class="text-secondary mb-3">

                    <i class="far fa-calendar"></i>

                    29 Juni 2026

                </p>

                <a href="/operasional/review-jadwal/review"
                   class="btn btn-primary px-4">

                    Review

                </a>

            </div>

        </div>

    </div>

</div>

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3 class="fw-bold mb-2">
                    AUD-2026-002
                </h3>

                <h4 class="mb-3">
                    CV XYZ Palembang
                </h4>

                <span class="badge bg-warning text-dark px-3 py-2">
                    Menunggu Review
                </span>

            </div>

            <div class="text-end">

                <p class="text-secondary mb-3">

                    <i class="far fa-calendar"></i>

                    30 Juni 2026

                </p>

                <a href="/operasional/review-jadwal/review"
                   class="btn btn-primary px-4">

                    Review

                </a>

            </div>

        </div>

    </div>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3 class="fw-bold mb-2">
                    AUD-2026-003
                </h3>

                <h4 class="mb-3">
                    PT Maju Bersama
                </h4>

                <span class="badge bg-warning text-dark px-3 py-2">
                    Menunggu Review
                </span>

            </div>

            <div class="text-end">

                <p class="text-secondary mb-3">

                    <i class="far fa-calendar"></i>

                    02 Juli 2026

                </p>

                <a href="/operasional/review-jadwal/review"
                   class="btn btn-primary px-4">

                    Review

                </a>

            </div>

        </div>

    </div>

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