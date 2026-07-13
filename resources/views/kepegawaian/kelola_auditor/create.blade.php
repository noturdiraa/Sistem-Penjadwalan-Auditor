<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Auditor</title>

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

color:#6b7280;
margin:0;

}

/* ================= FORM ================= */

.form-box{

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 8px 20px rgba(0,0,0,.06);

}

.form-label{

font-weight:600;

margin-bottom:8px;

}

.form-control,
.form-select{

height:48px;

border-radius:12px;

}

.text-blue {
    color: #2563EB;
}

.footer{

padding:25px;

text-align:center;

color:#777;

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
            <a href="/kepegawaian/profil">
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

<!-- CONTENT -->

<div class="content">

<div class="navbar-custom">

    <!-- Kolom pencarian dihapus, digantikan dengan div kosong agar profile tetap rata kanan -->
    <div></div>

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

<h2>Tambah Auditor</h2>

<p>Silakan lengkapi data auditor baru.</p>

</div>

<div class="form-box">

<form action="#" method="POST">
    {{-- @csrf --}}
    
    <div class="row">

        <!-- NIP -->
        <div class="col-md-6 mb-4">

            <label class="form-label">
                NIP
            </label>

            <input
            type="text"
            name="nip"
            class="form-control"
            placeholder="Masukkan NIP"
            required>

        </div>

        <!-- Nama Auditor -->
        <div class="col-md-6 mb-4">

            <label class="form-label">
                Nama Auditor
            </label>

            <input
            type="text"
            name="nama"
            class="form-control"
            placeholder="Masukkan Nama Auditor"
            required>

        </div>

        <!-- Jabatan -->
        <div class="col-md-4 mb-4">

            <label class="form-label">
                Jabatan
            </label>

            <select name="jabatan" class="form-select" required>

                <option value="" selected disabled>Pilih Jabatan</option>
                <option value="Lead Auditor">Lead Auditor</option>
                <option value="Auditor">Auditor</option>

            </select>

        </div>

        <!-- Posisi -->
        <div class="col-md-4 mb-4">

            <label class="form-label">
                Posisi
            </label>

            <select name="posisi" class="form-select" required>

                <option value="" selected disabled>Pilih Posisi</option>
                <option value="Fungsional">Fungsional</option>
                <option value="AMI">AMI</option>
                <option value="Non AMI">Non AMI</option>
                <option value="Subkon">Subkon</option>
                <option value="Non Subkon">Non Subkon</option>

            </select>

        </div>

        <!-- Status -->
        <div class="col-md-4 mb-4">

            <label class="form-label">
                Status
            </label>

            <select name="status" class="form-select" required>

                <option value="Aktif" selected>Aktif</option>
                <option value="Nonaktif">Nonaktif</option>

            </select>

        </div>

        <!-- Kompetensi Lembaga & Ruang Lingkup -->
        <div class="col-12 mb-4">
            <div class="card border-0 bg-light" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-blue mb-3">
                        <i class="fas fa-building me-2"></i>Kompetensi Lembaga & Ruang Lingkup
                    </h6>
                    
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label text-muted small">Pilih Lembaga</label>
                            <select class="form-select" id="selectLembaga">
                                <option value="" selected disabled>Pilih Lembaga...</option>
                            </select>
                        </div>
                        
                        <div class="col-md-7 d-none" id="ruangLingkupSection">
                            <label class="form-label text-muted small">Pilih Ruang Lingkup (Bisa Pilih Lebih dari Satu)</label>
                            <div id="ruangLingkupChecklist" class="d-flex flex-wrap gap-2 p-3 bg-white border rounded-3" style="min-height: 48px; border-color: #dee2e6 !important;">
                                <!-- Checkbox dinamis akan di-populate oleh Javascript -->
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-3 px-3" id="btnTambahKompetensi" style="border-radius: 8px;">
                                <i class="fas fa-plus me-1"></i> Tambah Kompetensi
                            </button>
                        </div>
                    </div>
                    
                    <!-- Daftar Kompetensi Terpilih -->
                    <div class="mt-4 d-none" id="daftarKompetensiSection">
                        <label class="form-label text-muted small d-block mb-2">Daftar Kompetensi Terpilih</label>
                        <div id="daftarKompetensiList" class="d-flex flex-column gap-2">
                            <!-- Item kompetensi muncul di sini secara dinamis -->
                        </div>
                        <!-- Input hidden penampung JSON kompetensi untuk dikirim ke Controller -->
                        <input type="hidden" name="kompetensi_lembaga" id="inputKompetensiLembaga">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ================= TOMBOL AKSI ================= -->
    <div class="d-flex justify-content-end gap-2 mt-3">

        <a href="/kepegawaian/auditor" class="btn btn-secondary px-4" style="border-radius: 12px; height: 48px; display: inline-flex; align-items: center; gap: 8px;">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>

        <button type="reset" class="btn btn-warning text-white px-4" style="border-radius: 12px; height: 48px; display: inline-flex; align-items: center; gap: 8px;" id="btnResetForm">
            <i class="fas fa-rotate-left"></i>
            Reset
        </button>

        <button type="submit" class="btn btn-primary px-4" style="border-radius: 12px; height: 48px; display: inline-flex; align-items: center; gap: 8px;">
            <i class="fas fa-floppy-disk"></i>
            Simpan
        </button>

    </div>

</form>

</div>

</div>

<!-- ================= FOOTER ================= -->

<div class="footer">

<hr>

<p class="mb-0">

© 2026 Sistem Penjadwalan Auditor BSPJI Palembang

</p>

</div>

</div>

<!-- ================= BOOTSTRAP & SCRIPTS ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

// Efek menu aktif
const menu = document.querySelectorAll(".menu a");
menu.forEach(item => {
    item.addEventListener("click", function(){
        menu.forEach(i => i.classList.remove("active"));
        this.classList.add("active");
    });
});

// Data Pemetaan Ruang Lingkup untuk 8 Lembaga
const lingkupData = {};

// State list kompetensi terpilih
let selectedKompetensi = [];

const selectLembaga = document.getElementById('selectLembaga');
const ruangLingkupSection = document.getElementById('ruangLingkupSection');
const ruangLingkupChecklist = document.getElementById('ruangLingkupChecklist');
const btnTambahKompetensi = document.getElementById('btnTambahKompetensi');
const daftarKompetensiSection = document.getElementById('daftarKompetensiSection');
const daftarKompetensiList = document.getElementById('daftarKompetensiList');
const inputKompetensiLembaga = document.getElementById('inputKompetensiLembaga');
const btnResetForm = document.getElementById('btnResetForm');

// Ketika Lembaga dipilih
selectLembaga.addEventListener('change', function() {
    const lembagaKey = this.value;
    const scopes = lingkupData[lembagaKey];
    
    if (scopes && scopes.length > 0) {
        ruangLingkupChecklist.innerHTML = '';
        scopes.forEach((scope, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'form-check me-3 mb-2';
            itemDiv.innerHTML = `
                <input class="form-check-input" type="checkbox" value="${scope}" id="scope_${index}">
                <label class="form-check-label small text-dark" for="scope_${index}">
                    ${scope}
                </label>
            `;
            ruangLingkupChecklist.appendChild(itemDiv);
        });
        ruangLingkupSection.classList.remove('d-none');
    } else {
        ruangLingkupSection.classList.add('d-none');
    }
});

// Ketika tombol Tambah Kompetensi diklik
btnTambahKompetensi.addEventListener('click', function() {
    const lembagaKey = selectLembaga.value;
    const lembagaText = selectLembaga.options[selectLembaga.selectedIndex].text;
    
    // Cari semua checkbox yang dicentang
    const checkedBoxes = ruangLingkupChecklist.querySelectorAll('input[type="checkbox"]:checked');
    if (checkedBoxes.length === 0) {
        alert('Silakan pilih minimal satu ruang lingkup terlebih dahulu!');
        return;
    }
    
    // Ambil nilai lingkup
    const listLingkup = [];
    checkedBoxes.forEach(box => {
        listLingkup.push(box.value);
    });
    
    // Cek apakah lembaga tersebut sudah ditambahkan sebelumnya
    const existingIndex = selectedKompetensi.findIndex(item => item.lembaga_id === lembagaKey);
    if (existingIndex > -1) {
        // Jika sudah ada, gabungkan lingkupnya secara unik
        listLingkup.forEach(lingkup => {
            if (!selectedKompetensi[existingIndex].ruang_lingkup.includes(lingkup)) {
                selectedKompetensi[existingIndex].ruang_lingkup.push(lingkup);
            }
        });
    } else {
        // Jika belum ada, masukkan data baru
        selectedKompetensi.push({
            lembaga_id: lembagaKey,
            lembaga_nama: lembagaText,
            ruang_lingkup: listLingkup
        });
    }
    
    // Render list kompetensi ke UI dan perbarui input
    renderKompetensiList();
    
    // Reset Form Input Lembaga
    selectLembaga.value = '';
    ruangLingkupSection.classList.add('d-none');
    ruangLingkupChecklist.innerHTML = '';
});

// Fungsi untuk merender daftar kompetensi yang terpilih ke UI
function renderKompetensiList() {
    daftarKompetensiList.innerHTML = '';
    
    if (selectedKompetensi.length > 0) {
        selectedKompetensi.forEach((komp, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'd-flex align-items-center justify-content-between p-3 bg-white rounded-3 border border-light shadow-sm';
            itemDiv.style.borderLeft = '4px solid #2563EB';
            itemDiv.innerHTML = `
                <div>
                    <strong class="text-blue small">${komp.lembaga_nama}</strong>
                    <div class="text-muted small mt-1">
                        <strong>Ruang Lingkup:</strong> ${komp.ruang_lingkup.join(', ')}
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle" onclick="hapusKompetensi(${index})">
                    <i class="fas fa-trash-can"></i>
                </button>
            `;
            daftarKompetensiList.appendChild(itemDiv);
        });
        
        daftarKompetensiSection.classList.remove('d-none');
        // Update input hidden dalam format JSON
        inputKompetensiLembaga.value = JSON.stringify(selectedKompetensi);
    } else {
        daftarKompetensiSection.classList.add('d-none');
        inputKompetensiLembaga.value = '';
    }
}

// Fungsi untuk menghapus kompetensi terpilih dari daftar
window.hapusKompetensi = function(index) {
    selectedKompetensi.splice(index, 1);
    renderKompetensiList();
};

// Reset form event handler
btnResetForm.addEventListener('click', function() {
    selectedKompetensi = [];
    renderKompetensiList();
    ruangLingkupSection.classList.add('d-none');
    ruangLingkupChecklist.innerHTML = '';
});

</script>

</body>

</html>