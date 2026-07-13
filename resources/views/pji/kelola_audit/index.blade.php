<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Kelola Audit</title>

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

/* ================= SIDEBAR ================= */
.sidebar{
position:fixed;
left:0;
top:0;
width:270px;
height:100vh;
background:#0F3D91;
color:white;
padding:14px 18px;
overflow-y:auto; /* Aktifkan scroll di samping sidebar jika menu melebihi tinggi layar */
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

.menu li a i {
font-size: 16px;
width: 20px;
text-align: center;
}

.menu li a:hover,
.menu li a.active{
background:#2563EB;
}

/* ================= CONTENT ================= */
.content{
margin-left:270px;
min-height:100vh;
display: flex;
flex-direction: column;
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
transition: none;
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
object-fit: contain;
}

.main{
padding:35px;
flex-grow: 1;
}

.page-header{
background: linear-gradient(180deg, #ffffff, #fbfdff);
border-radius:14px;
padding:20px 24px;
box-shadow:0 6px 18px rgba(15,61,145,0.06);
margin-bottom:22px;
display:flex;
justify-content:space-between;
align-items:center;
}

.page-header h2{
font-size:30px;
font-weight:700;
color:#1F2937;
margin:0 0 6px 0;
}

.page-header p{
margin:0;
color:#6b7280;
font-size:15px;
}

.btn-add{
background-color:#2563EB;
color:white;
border-radius:12px;
padding:10px 20px;
font-weight:600;
font-size:15px;
display:inline-flex;
align-items:center;
gap:10px;
text-decoration:none;
transition:none;
}

.btn-add:hover{
background-color:#1D4ED8;
color:white;
}

.table-card{
background:white;
border-radius:14px;
padding:25px;
box-shadow:0 6px 18px rgba(15,61,145,0.06);
}

</style>

</head>

<body>

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
                <a href="/pji/audit" class="active">
                    <i class="fas fa-file-signature"></i>
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
                    <i class="fas fa-clipboard-check"></i>
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
                <a href="/login">
                    <i class="fas fa-right-from-bracket"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- ================= CONTENT ================= -->
    <div class="content">
        <div class="navbar-custom">
            <input type="text" class="form-control search" placeholder="Cari...">

            <div class="profile">
                <i class="far fa-bell fs-5"></i>
                <img src="{{ asset('images/logo.png') }}">
                <span>PJI</span>
            </div>
        </div>

<div class="main">

<div class="page-header">

<div>

<h2>Kelola Audit</h2>

<p>Kelola seluruh data audit perusahaan.</p>

</div>

<a href="/pji/audit/create" class="btn-add">

<i class="fas fa-plus"></i>

Buat Audit

</a>

</div>

<div class="table-card">
            <!-- ================= SEARCH ================= -->
            <div class="row mb-4">
                <div class="col-md-8 mb-3 mb-md-0">
                    <input type="text" class="form-control table-search-input" placeholder="🔍 Cari perusahaan atau kode audit...">
                </div>
                <div class="col-md-4">
                    <select class="form-select status-filter-select">
                        <option selected>Semua Status</option>
                        <option>Menunggu</option>
                        <option>Disetujui</option>
                        <option>Selesai</option>
                    </select>
                </div>
            </div>

            <!-- ================= TABEL ================= -->
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Kode Audit</th>
                            <th>Perusahaan</th>
                            <th>Ruang Lingkup</th>
                            <th>Tanggal Audit</th>
                            <th>Ketua Tim</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-4" style="font-size: 14px;">
                                <i class="fas fa-info-circle me-1"></i> Belum ada data audit.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ================= DETAIL AUDIT MODAL ================= -->
    <div class="modal fade" id="detailAuditModal" tabindex="-1" aria-labelledby="detailAuditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <div class="modal-header" style="border-bottom: 1px solid #F3F4F6; padding: 20px 24px;">
                    <h5 class="modal-title fw-bold text-dark" id="detailAuditModalLabel">Detail Data Audit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="transition: none;"></button>
                </div>
                <div class="modal-body" style="padding: 24px; font-size: 15px;">
                    <div class="mb-3 d-flex justify-content-between">
                        <span class="text-secondary">Kode Audit</span>
                        <strong class="text-dark">AUD-001</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <span class="text-secondary">Perusahaan</span>
                        <strong class="text-dark">PT ABC Indonesia</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <span class="text-secondary">Ruang Lingkup</span>
                        <strong class="text-dark">LSPRO</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <span class="text-secondary">Tanggal Audit</span>
                        <strong class="text-dark">10 Jul 2026</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <span class="text-secondary">Ketua Tim</span>
                        <strong class="text-dark">Popy Marlina</strong>
                    </div>
                    <div class="mb-0 d-flex justify-content-between align-items-center">
                        <span class="text-secondary">Status</span>
                        <span class="badge" style="background-color: #FEF3C7; color: #D97706; font-weight: 600; padding: 6px 12px; border-radius: 8px;">Menunggu</span>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: none; padding: 0 24px 24px;">
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal" style="height: 45px; border-radius: 8px; font-weight: 600; background-color: #F3F4F6; color: #4B5563; border: none; transition: none;">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer text-center py-4">
        <hr style="border-color: #E5E7EB; opacity: 1; margin-bottom: 20px;">
        <p class="mb-0 text-secondary">
            © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
        </p>
    </div>

</div>
<!-- End Content -->

<!-- ================= BOOTSTRAP ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

// ================= MENU ACTIVE =================

const menu = document.querySelectorAll(".menu a");

menu.forEach(item => {

    item.addEventListener("click", function(){

        menu.forEach(i => i.classList.remove("active"));

        this.classList.add("active");

    });

});

// ================= SEARCH =================
const search = document.querySelector(".table-search-input");
const rows = document.querySelectorAll("tbody tr");

search.addEventListener("keyup", function(){
    let keyword = this.value.toLowerCase();
    rows.forEach(function(row){
        row.style.display = row.innerText.toLowerCase().includes(keyword)
            ? ""
            : "none";
    });
});

</script>

</body>

</html>