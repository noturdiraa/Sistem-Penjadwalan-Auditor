<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Review Katim PJI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f5f7fb;
}

/* ================= SIDEBAR ================= */

.sidebar{

    position:fixed;
    left:0;
    top:0;

    width:280px;
    height:100vh;

    background:#173C97;
    color:white;

}

.logo{

    padding:28px;

    border-bottom:1px solid rgba(255,255,255,.15);

}

.logo h3{

    margin:0;
    font-weight:700;

}

.logo small{

    opacity:.8;

}

.menu{

    margin-top:20px;

}

.menu a{

    display:flex;
    align-items:center;
    gap:14px;

    padding:16px 28px;

    color:white;
    text-decoration:none;

    transition:.3s;

}

.menu a:hover{

    background:#2455d6;

}

.menu a.active{

    background:#2455d6;

}

/* ================= CONTENT ================= */

.content{

    margin-left:280px;

}

/* ================= TOPBAR ================= */

.topbar{

    height:80px;

    background:white;

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:0 35px;

    box-shadow:0 2px 10px rgba(0,0,0,.05);

}

.search{

    width:450px;

}

.search input{

    border-radius:30px;

}

.right{

    display:flex;
    align-items:center;
    gap:20px;

}

.right i{

    font-size:22px;

}

/* ================= MAIN ================= */

.main{

    padding:35px;

}

.page-title{

    font-size:38px;
    font-weight:700;

}

.subtitle{

    color:#666;
    margin-bottom:30px;

}

.card-box{

    background:white;

    border-radius:18px;

    padding:28px;

    box-shadow:0 5px 18px rgba(0,0,0,.08);

    margin-bottom:25px;

}

.info-title{

    font-size:24px;
    font-weight:700;

    margin-bottom:20px;

}

.info-item{

    margin-bottom:15px;

}

.info-item label{

    color:#888;

    display:block;

    margin-bottom:5px;

}

.info-item p{

    margin:0;
    font-weight:500;

}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">

<h3>BSPJI</h3>

<small>Palembang</small>

</div>

<div class="menu">

<a href="/dashboard-pji">

<i class="fa-solid fa-house"></i>

Dashboard

</a>

<a href="/pji/perusahaan">

<i class="fa-solid fa-building"></i>

Kelola Perusahaan

</a>

<a href="/pji/audit">

<i class="fa-solid fa-file-circle-check"></i>

Kelola Audit

</a>

<a href="/pji/jadwal">

<i class="fa-solid fa-calendar-days"></i>

Jadwal Audit

</a>

<a href="/pji/tim-audit">

<i class="fa-solid fa-users"></i>

Tim Audit

</a>

<a href="/pji/review-katim" class="active">

<i class="fa-solid fa-list-check"></i>

Review Katim PJI

</a>

<a href="/pji/profil">

<i class="fa-solid fa-user"></i>

Profil

</a>

</div>

</div>

<!-- CONTENT -->

<div class="content">

<div class="topbar">

<div class="search">

<input
type="text"
class="form-control"
placeholder="Cari...">

</div>

<div class="right">

<i class="fa-regular fa-bell"></i>

<i class="fa-regular fa-user"></i>

</div>

</div>

<div class="main">

<h1 class="page-title">

Review Jadwal Audit

</h1>

<p class="subtitle">

Periksa informasi audit sebelum dikembalikan.

</p>
<!-- ================= INFORMASI AUDIT ================= -->

<div class="card-box">

    <h3 class="info-title">

        <i class="fa-solid fa-file-circle-check text-primary me-2"></i>

        Informasi Audit

    </h3>

    <div class="row">

        <div class="col-md-6">

            <div class="info-item">

                <label>ID Audit</label>

                <p>AUD-2026-001</p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="info-item">

                <label>Status</label>

                <span class="badge bg-warning text-dark">

                    Menunggu Review Katim

                </span>

            </div>

        </div>

        <div class="col-md-6">

            <div class="info-item">

                <label>Perusahaan</label>

                <p>PT ABC Indonesia</p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="info-item">

                <label>Ruang Lingkup</label>

                <p>LSSM</p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="info-item">

                <label>Tanggal Audit</label>

                <p>25 Juni 2026 - 27 Juni 2026</p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="info-item">

                <label>Lokasi Audit</label>

                <p>Palembang</p>

            </div>

        </div>

    </div>

</div>

<!-- ================= TIM AUDIT ================= -->

<div class="card-box">

    <h3 class="info-title">

        <i class="fa-solid fa-users text-primary me-2"></i>

        Tim Audit

    </h3>

    <div class="row">

        <!-- Lead Auditor -->

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center">

                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3"
                        style="width:80px;height:80px;font-size:30px;font-weight:bold;">

                        PM

                    </div>

                    <h4>Popy Marlina</h4>

                    <span class="badge bg-primary">

                        Lead Auditor

                    </span>

                    <hr>

                    <p class="mb-1">

                        <strong>Lembaga</strong>

                    </p>

                    <p>LSSM</p>

                    <p class="mb-1">

                        <strong>Status Sertifikat</strong>

                    </p>

                    <span class="badge bg-success">

                        Aktif

                    </span>

                </div>

            </div>

        </div>

        <!-- Auditor 1 -->

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center">

                    <div class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3"
                        style="width:80px;height:80px;font-size:30px;font-weight:bold;">

                        AS

                    </div>

                    <h4>Andi Saputra</h4>

                    <span class="badge bg-secondary">

                        Auditor

                    </span>

                    <hr>

                    <p class="mb-1">

                        <strong>Lembaga</strong>

                    </p>

                    <p>LSPro</p>

                    <p class="mb-1">

                        <strong>Status Sertifikat</strong>

                    </p>

                    <span class="badge bg-success">

                        Aktif

                    </span>

                </div>

            </div>

        </div>

        <!-- Auditor 2 -->

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center">

                    <div class="bg-warning text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3"
                        style="width:80px;height:80px;font-size:30px;font-weight:bold;">

                        RA

                    </div>

                    <h4>Rina Agustina</h4>

                    <span class="badge bg-secondary">

                        Auditor

                    </span>

                    <hr>

                    <p class="mb-1">

                        <strong>Lembaga</strong>

                    </p>

                    <p>LSSM</p>

                    <p class="mb-1">

                        <strong>Status Sertifikat</strong>

                    </p>

                    <span class="badge bg-success">

                        Aktif

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- ================= CATATAN PENGEMBALIAN ================= -->

<div class="card-box">

    <h3 class="info-title">

        <i class="fa-solid fa-clipboard text-danger me-2"></i>

        Catatan Pengembalian

    </h3>

    <div class="mb-3">

        <label class="form-label fw-semibold">

            Alasan Jadwal Audit Dikembalikan

        </label>

        <textarea
            class="form-control"
            rows="6"
            placeholder="Tuliskan alasan mengapa jadwal audit dikembalikan..."></textarea>

    </div>

</div>

<!-- ================= TOMBOL ================= -->

<div class="d-flex justify-content-between mt-4 mb-5">

    <a href="/pji/review-katim"
       class="btn btn-outline-secondary btn-lg px-5">

        <i class="fa-solid fa-arrow-left me-2"></i>

        Kembali

    </a>

    <button
        type="button"
        class="btn btn-danger btn-lg px-5">

        <i class="fa-solid fa-rotate-left me-2"></i>

        Kembalikan

    </button>

</div>

</div>
<!-- End Main -->

</div>
<!-- End Content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>