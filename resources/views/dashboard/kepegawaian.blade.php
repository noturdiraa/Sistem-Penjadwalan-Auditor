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
        }

        /* ===================== SIDEBAR ===================== */

        .sidebar{

            position:fixed;

            left:0;

            top:0;

            width:270px;

            height:100vh;

            background:#0F3D91;

            color:white;

            padding:14px 18px;

            overflow-y:visible;

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

            padding:14px 18px;

            border-radius:12px;

            color:white;

            text-decoration:none;

            transition:.3s;

        }

        .menu li a:hover{

            background:rgba(255,255,255,.15);

        }

        .menu .active{

            background:#2563eb;

        }

        /* ===================== CONTENT ===================== */

        .content{

            margin-left:270px;

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

            <a href="#" class="active">

                <i class="fas fa-house"></i>

                Dashboard

            </a>

        </li>

        <li>

            <a href="#">

                <i class="fas fa-users"></i>

                Kelola Auditor

            </a>

        </li>

        <li>

            <a href="#">

                <i class="fas fa-user"></i>

                Profil

            </a>

        </li>

        <li>

            <a href="#">

                <i class="fas fa-right-from-bracket"></i>

                Logout

            </a>

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

    <div class="col-lg-3 col-md-6 mb-4">

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

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-4">

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

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-4">

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

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body d-flex align-items-center">

                <div class="bg-danger text-white rounded-circle d-flex justify-content-center align-items-center"
                    style="width:70px;height:70px;">

                    <i class="fas fa-award fa-2x"></i>

                </div>

                <div class="ms-3">

                    <h6 class="text-muted mb-1">
                        Jenis Kompetensi
                    </h6>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ================= TABEL AUDITOR ================= -->

<div class="table-box">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">Daftar Auditor</h4>
        <a href="#" class="text-primary small">Lihat semua →</a>
    </div>

    <div class="auditor-list">
        <div class="auditor-card justify-content-center">
            <div class="auditor-meta text-center" style="width:100%;">
                <h5 class="mb-2">Belum ada data auditor</h5>
                <p class="mb-0 text-muted">Silakan tambahkan auditor terlebih dahulu di menu Kelola Auditor.</p>
            </div>
        </div>
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