<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Kelola Auditor</title>

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

display:flex;
align-items:center;
gap:15px;

padding:14px 18px;

border-radius:12px;

text-decoration:none;

color:white;

transition:.3s;

}

.menu li a:hover,
.menu li a.active{

background:#2563EB;

}

/* ================= CONTENT ================= */

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

}

.search-box input{
    border-radius:30px;
    height:45px;
}

/* ensure profile image fills circle like dashboard */
.profile img{
    object-fit:cover;
}

.search-box input{
    padding:10px 18px;
}

.main{

padding:35px;

}

.page-header{

background:white;

padding:25px;

border-radius:20px;

box-shadow:0 8px 20px rgba(0,0,0,.06);

margin-bottom:25px;

}

.page-header h2{

font-weight:700;

margin-bottom:8px;

}

.page-header p{

margin:0;

color:#6b7280;

}

/* ================= FILTER ================= */

.filter-box{

background:white;

padding:20px;

border-radius:20px;

box-shadow:0 8px 20px rgba(0,0,0,.06);

margin-bottom:25px;

}

.filter-box .form-control,
.filter-box .form-select{

height:48px;

border-radius:12px;

}

.table-box{

background:white;

border-radius:20px;

box-shadow:0 8px 20px rgba(0,0,0,.06);

overflow:hidden;

}

/* Custom Scrollbar for responsive table */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}
.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}
.table-responsive::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}
.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.table thead{

background:#EEF4FF;

}

.table th{

padding:18px;

font-weight:600;

color:#555;

white-space:nowrap;

}

.table td{

padding:18px;

vertical-align:middle;

}

.avatar{

width:50px;
height:50px;

background:#2563EB;

border-radius:50%;

display:flex;

justify-content:center;

align-items:center;

font-weight:700;

color:white;

font-size:18px;

}

.badge-komp{

background:#E7F0FF;

color:#2563EB;

padding:6px 12px;

border-radius:8px;

font-size:12px;

font-weight:500;

display:inline-flex;

align-items:center;

white-space:nowrap;

border: 1px solid rgba(37, 99, 235, 0.15);

}

.badge-status{

padding:7px 14px;

border-radius:20px;

font-size:13px;

}

.footer{

padding:25px;

text-align:center;

color:#777;

}

.btn-action{

font-size:18px;

margin-right:10px;

text-decoration:none;

}

.text-blue{

color:#2563EB;

}

.text-orange{

color:#F59E0B;

}

.text-red{

color:#EF4444;

}

/* ================= MODAL DETAIL STYLING ================= */

.lembaga-card {
    background: #ffffff;
    border: 1px solid #E2E8F0;
    border-radius: 12px;
    padding: 14px 18px;
    margin-bottom: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
}

.lembaga-card:last-child {
    margin-bottom: 0;
}

.lembaga-name {
    font-weight: 600;
    color: #0F3D91;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.lingkup-list {
    font-size: 13px;
    color: #4b5563;
    margin-top: 6px;
    padding-left: 22px;
    line-height: 1.5;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        <img src="{{ asset('images/logo.png') }}">

        <h4>BSPJI</h4>

        <p>Kepegawaian</p>

    </div>

    <ul class="menu">
        <li>
            <a href="/dashboard-kepegawaian">
                <i class="fas fa-house"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/kepegawaian/auditor" class="active">
                <i class="fas fa-users"></i>
                Kelola Auditor
            </a>
        </li>
        <li>
            <a href="/kepegawaian/lembaga">
                <i class="fas fa-landmark"></i>
                Kelola Jenis Audit
            </a>
        </li>
        <li>
            <a href="/kepegawaian/ruang-lingkup">
                <i class="fas fa-circle-nodes"></i>
                Kelola Ruang Lingkup
            </a>
        </li>
        <li>
            <a href="/kepegawaian/profil">
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

<!-- CONTENT -->

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

<div class="page-header">

<h2>Kelola Auditor</h2>

<p>Kelola data auditor BSPJI Palembang.</p>

</div>
<!-- FILTER -->

<div class="filter-box">

<div class="row g-3 align-items-center">

<div class="col-md-4">

<input
type="text"
class="form-control"
placeholder="Cari Nama Auditor atau NIP">

</div>

<div class="col-md-3">

<select class="form-select">

<option selected>Kompetensi</option>

<option>LSPRO</option>
<option>LSSM</option>
<option>LSSML</option>
<option>LSIH</option>
<option>LSSMKP</option>
<option>LPH</option>
<option>LSHACCP</option>
<option>LSSMK3</option>
</select>

</div>

<div class="col-md-2">

<select class="form-select">

<option selected>Status</option>

<option>Aktif</option>

<option>Nonaktif</option>

</select>

</div>

<div class="col-md-3 text-end">

<a href="{{ route('kepegawaian.auditor.create') }}" class="btn btn-primary w-100 w-md-auto">

<i class="fas fa-plus"></i>

Tambah Auditor

</a>

</div>

</div>

</div>

<!-- TABEL -->

<div class="table-box">

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

        <thead>

        <tr>

        <th>No</th>

        <th>NIP</th>

        <th>Nama Auditor</th>

        <th>Jabatan</th>

        <th>Status</th>

        <th>Aksi</th>

        </tr>

        </thead>

        <tbody>

        <!-- KONDISI KOSONG (Belum Ada Data) -->
        <tr>
            <td colspan="6" class="text-center py-5 text-muted">
                <div class="mb-3">
                    <i class="fas fa-users-slash fa-3x text-secondary opacity-50"></i>
                </div>
                <h5 class="fw-semibold text-dark mb-1">Belum Ada Data Auditor</h5>
                <p class="small text-muted mb-0">Silakan klik tombol <strong>Tambah Auditor</strong> untuk memasukkan data baru.</p>
            </td>
        </tr>

        {{-- TEMPLATE BARIS DATA (Gunakan ini saat data sudah ditarik dari database / loop forelse)
        <tr>

        <td>1</td>

        <td>197805012024001</td>

        <td>

        <div class="d-flex align-items-center">

        <div class="avatar me-3">

        P

        </div>

        <div>

        <strong>Popy Marlina</strong>

        <br>

        <small class="text-muted">

        Lead Auditor

        </small>

        </div>

        </div>

        </td>

        <td>Lead Auditor</td>

        <td>

        <span class="badge bg-success badge-status">

        Aktif

        </span>

        </td>

        <td>

        <a href="#" class="btn-action"
           data-bs-toggle="modal"
           data-bs-target="#detailModal"
           data-nama="Popy Marlina"
           data-nip="197805012024001"
           data-jabatan="Lead Auditor"
           data-status="Aktif"
           data-lembaga="LSPRO BSPJI Palembang: Garam Konsumsi, Pupuk NPK, Air Minum dalam Kemasan (AMDK) | LSSM BSPJI Palembang: Sistem Manajemen Mutu (ISO 9001:2015)">
           <i class="fas fa-eye text-blue" title="Detail"></i>
        </a>

        <a href="#" class="btn-action">

        <i class="fas fa-pen text-orange" title="Edit"></i>

        </a>

        <a href="#" class="btn-action">

        <i class="fas fa-trash text-red" title="Hapus"></i>

        </a>

        </td>

        </tr>
        --}}

        </tbody>

        </table>

    </div>

</div>

</div>

<!-- FOOTER -->

<div class="footer">

<hr>

<p>

© 2026 Sistem Penjadwalan Auditor BSPJI Palembang

</p>

</div>

</div>

<!-- MODAL DETAIL AUDITOR -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 20px; overflow: hidden; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="modal-header" style="background: #EEF4FF; border-bottom: 1px solid #E7F0FF; padding: 20px 25px;">
                <h5 class="modal-title fw-bold" id="detailModalLabel" style="color: #0F3D91;">
                    <i class="fas fa-id-card me-2"></i>Detail Informasi Auditor
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 25px;">
                <div class="row g-4">
                    <!-- SISI KIRI: Informasi Profil Utama -->
                    <div class="col-md-5 border-end border-light">
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar me-3" id="modalAvatar" style="width: 60px; height: 60px; font-size: 24px;">-</div>
                            <div>
                                <h5 class="fw-bold mb-1" id="modalNama">-</h5>
                                <span class="text-muted small" id="modalJabatan">-</span>
                            </div>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="text-muted small d-block">NIP</label>
                                <strong id="modalNip" class="text-dark">-</strong>
                            </div>
                            <div class="col-12 mt-3">
                                <label class="text-muted small d-block">Status Keaktifan</label>
                                <div class="mt-1">
                                    <span class="badge badge-status" id="modalStatus" style="font-size: 12px; padding: 5px 12px;">-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SISI KANAN: Detail Lembaga dan Ruang Lingkup -->
                    <div class="col-md-7">
                        <div class="card border-0 bg-light" style="border-radius: 16px; height: 100%;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold text-dark mb-3">
                                    <i class="fas fa-building text-primary me-2"></i>Lembaga & Ruang Lingkup Audit
                                </h6>
                                <div id="modalLembagaContainer">
                                    <!-- List Lembaga dan Ruang Lingkup secara dinamis -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #eee; padding: 15px 25px;">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 10px;">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

const menu=document.querySelectorAll(".menu a");

menu.forEach(item=>{

item.addEventListener("click",function(){

menu.forEach(i=>i.classList.remove("active"));

this.classList.add("active");

});
});

// Event listener untuk memuat data auditor secara dinamis ke dalam modal
const detailModal = document.getElementById('detailModal');
if (detailModal) {
    detailModal.addEventListener('show.bs.modal', function (event) {
        // Tombol aksi detail yang diklik
        const button = event.relatedTarget;
        
        // Ambil data dari atribut data-bs-*
        const nama = button.getAttribute('data-nama');
        const nip = button.getAttribute('data-nip');
        const jabatan = button.getAttribute('data-jabatan');
        const status = button.getAttribute('data-status');
        const lembagaData = button.getAttribute('data-lembaga'); // Format string: "Lembaga A: Lingkup A, B | Lembaga B: Lingkup C"
        
        // Terapkan data ke elemen modal
        detailModal.querySelector('#modalNama').textContent = nama;
        detailModal.querySelector('#modalNip').textContent = nip;
        detailModal.querySelector('#modalJabatan').textContent = jabatan;
        
        // Tentukan inisial avatar dari huruf pertama nama
        const inisial = nama ? nama.charAt(0).toUpperCase() : '-';
        detailModal.querySelector('#modalAvatar').textContent = inisial;
        
        // Atur badge status (hijau untuk Aktif, merah untuk Nonaktif)
        const statusBadge = detailModal.querySelector('#modalStatus');
        statusBadge.textContent = status;
        if (status && status.toLowerCase() === 'aktif') {
            statusBadge.className = 'badge bg-success badge-status';
        } else {
            statusBadge.className = 'badge bg-danger badge-status';
        }

        // Tampilkan data Lembaga dan Ruang Lingkup
        const lembagaContainer = detailModal.querySelector('#modalLembagaContainer');
        lembagaContainer.innerHTML = '';
        if (lembagaData) {
            lembagaData.split('|').forEach(item => {
                const parts = item.split(':');
                if (parts.length >= 2) {
                    const namaLembaga = parts[0].trim();
                    const lingkup = parts[1].trim();
                    
                    // Buat elemen card lembaga
                    const card = document.createElement('div');
                    card.className = 'lembaga-card';
                    card.innerHTML = `
                        <div class="lembaga-name">
                            <i class="fas fa-check-circle text-success"></i>
                            ${namaLembaga}
                        </div>
                        <div class="lingkup-list">
                            <strong>Ruang Lingkup:</strong><br>
                            ${lingkup}
                        </div>
                    `;
                    lembagaContainer.appendChild(card);
                }
            });
        } else {
            lembagaContainer.innerHTML = `
                <div class="text-center py-4 text-muted">
                    <i class="far fa-folder-open fa-2x mb-2 opacity-50"></i>
                    <p class="small mb-0">Belum ada data lembaga & ruang lingkup</p>
                </div>
            `;
        }
    });
}
</script>
</body>
</html>