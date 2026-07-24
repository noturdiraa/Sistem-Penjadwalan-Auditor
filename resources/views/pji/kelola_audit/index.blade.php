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

/* ================= TABLE DESIGN ================= */
.table th {
    font-weight: 600;
    color: #4B5563;
    border-bottom: 2px solid #F3F4F6;
    padding: 16px 12px;
    font-size: 14px;
}

.table td {
    padding: 18px 12px;
    font-size: 14px;
    color: #1F2937;
    border-bottom: 1px solid #F3F4F6;
}

.table tr:last-child td {
    border-bottom: none;
}

.btn-outline-primary {
    border-color: #E5E7EB;
    color: #2563EB;
    border-radius: 8px;
    padding: 6px 10px;
    transition: none;
}

.btn-outline-primary:hover {
    background-color: #2563EB;
    border-color: #2563EB;
    color: #fff;
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
                    <input type="text" class="form-control table-search-input" placeholder="🔍 Cari perusahaan...">
                </div>
                <div class="col-md-4">
                    <select class="form-select status-filter-select">
                        <option selected>Semua Status</option>
                        <option>Review</option>
                        <option>Aktif</option>
                        <option>Selesai</option>
                    </select>
                </div>
            </div>

            <!-- ================= TABEL ================= -->
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 35%; white-space: nowrap; vertical-align: middle;">Perusahaan</th>
                            <th class="text-center" style="width: 20%; white-space: nowrap; vertical-align: middle;">Tanggal Audit</th>
                            <th class="text-center" style="width: 25%; white-space: nowrap; vertical-align: middle;">Lead Auditor</th>
                            <th class="text-center" style="width: 12%; white-space: nowrap; vertical-align: middle;">Status</th>
                            <th class="text-center" style="width: 8%; white-space: nowrap; vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($audits as $audit)
                            @php
                                $firstJadwal = $audit->jadwalAudits->first();
                                $leadAuditor = '-';
                                if ($firstJadwal) {
                                    $leadTim = $firstJadwal->timAudits->where('peran', 'Lead Auditor')->first();
                                    if ($leadTim && $leadTim->auditor) {
                                        $leadAuditor = $leadTim->auditor->nama_auditor;
                                    }
                                }
                                $statusBadgeMap = [
                                    'Review' => 'bg-secondary',
                                    'Aktif' => 'bg-success',
                                    'Revisi' => 'bg-warning text-dark',
                                    'Selesai' => 'bg-info'
                                ];
                                $statusBadge = $statusBadgeMap[$audit->status] ?? 'bg-secondary';

                                $memberNames = [];
                                if ($firstJadwal) {
                                    $memberTims = $firstJadwal->timAudits->where('peran', 'Auditor');
                                    foreach ($memberTims as $mt) {
                                        if ($mt->auditor) {
                                            $memberNames[] = $mt->auditor->nama_auditor;
                                        }
                                    }
                                }
                                $anggotaList = implode(', ', $memberNames) ?: '-';
                            @endphp
                            <tr>
                                <td>
                                    <strong>{{ $audit->perusahaan->nama_perusahaan ?? '-' }}</strong>
                                    <span class="d-block text-secondary mt-1" style="font-size: 12px;">Ruang Lingkup: {{ $audit->ruangLingkup->nama_ruang_lingkup ?? '-' }}</span>
                                </td>
                                <td class="text-center">
                                    @if($firstJadwal)
                                        {{ \Carbon\Carbon::parse($firstJadwal->tanggal_mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($firstJadwal->tanggal_selesai)->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $leadAuditor }}
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $statusBadge }}" style="padding: 8px 12px; font-size: 13px; color: white;">
                                        {{ $audit->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <!-- Detail Button -->
                                        <button class="btn btn-outline-info btn-sm d-inline-flex align-items-center justify-content-center btn-detail" 
                                                style="border-radius: 8px; padding: 6px 10px;"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#detailAuditModal"
                                                data-id="{{ $audit->id_audit }}"
                                                data-perusahaan="{{ $audit->perusahaan->nama_perusahaan ?? '-' }}"
                                                data-jenis-audit="{{ $audit->jenis_audit ?? '-' }}"
                                                data-ruang-lingkup="{{ $audit->ruangLingkup->nama_ruang_lingkup ?? '-' }}"
                                                data-tanggal-mulai="{{ $firstJadwal ? \Carbon\Carbon::parse($firstJadwal->tanggal_mulai)->format('d F Y') : '-' }}"
                                                data-tanggal-selesai="{{ $firstJadwal ? \Carbon\Carbon::parse($firstJadwal->tanggal_selesai)->format('d F Y') : '-' }}"
                                                data-lead-auditor="{{ $leadAuditor }}"
                                                data-anggota="{{ $anggotaList }}"
                                                data-status="{{ $audit->status }}"
                                                data-lokasi="{{ $firstJadwal && $firstJadwal->lokasi ? $firstJadwal->lokasi->nama_lokasi : '-' }}"
                                                data-kategori-wilayah="{{ $firstJadwal && $firstJadwal->lokasi ? $firstJadwal->lokasi->kategori_wilayah : '-' }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <!-- Delete Button -->
                                        <form action="{{ route('pji.audit.destroy', $audit->id_audit) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data audit ini?');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-inline-flex align-items-center justify-content-center" style="border-radius: 8px; padding: 6px 10px;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-secondary" style="font-size: 14px;">
                                    <i class="fas fa-info-circle fa-2x mb-3 d-block text-secondary"></i>
                                    <span>Belum ada data audit.</span>
                                </td>
                            </tr>
                        @endforelse
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
                <div class="modal-body" style="padding: 24px; font-size: 14px;">
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">ID Audit</span>
                        <strong class="text-dark text-end" id="detailAuditId">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Perusahaan</span>
                        <strong class="text-dark text-end" id="detailPerusahaan">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Jenis Audit</span>
                        <strong class="text-dark text-end" id="detailJenisAudit">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Ruang Lingkup</span>
                        <strong class="text-dark text-end" id="detailRuangLingkup">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Tanggal Mulai</span>
                        <strong class="text-dark text-end" id="detailTglMulai">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Tanggal Selesai</span>
                        <strong class="text-dark text-end" id="detailTglSelesai">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Lead Auditor</span>
                        <strong class="text-dark text-end" id="detailLeadAuditor">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Anggota</span>
                        <strong class="text-dark text-end" id="detailAnggota">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Lokasi</span>
                        <strong class="text-dark text-end" id="detailLokasi">-</strong>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <span class="text-secondary me-3" style="min-width: 120px;">Kategori Wilayah</span>
                        <strong class="text-dark text-end" id="detailKategoriWilayah">-</strong>
                    </div>
                    <div class="mb-0 d-flex justify-content-between align-items-center">
                        <span class="text-secondary me-3" style="min-width: 120px;">Status</span>
                        <span class="badge" id="detailStatus" style="background-color: #E2E8F0; color: #475569; font-weight: 600; padding: 6px 12px; border-radius: 8px;">-</span>
                    </div>
                </div>
                <div class="modal-footer d-flex gap-2" style="border-top: none; padding: 0 24px 24px;">
                    <form action="" method="POST" id="formSelesai" style="flex: 1; display: none;" onsubmit="return confirm('Apakah Anda yakin ingin menyelesaikan pelaksanaan audit ini?');">
                        @csrf
                        <button type="submit" class="btn btn-success w-100" style="height: 45px; border-radius: 8px; font-weight: 600; border: none; transition: none; background-color: #10B981;">Tandai Selesai</button>
                    </form>
                    <button type="button" class="btn btn-secondary" id="btnTutupDetail" data-bs-dismiss="modal" style="flex: 1; height: 45px; border-radius: 8px; font-weight: 600; background-color: #F3F4F6; color: #4B5563; border: none; transition: none;">Tutup</button>
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

// ================= SEARCH & STATUS FILTER =================
const search = document.querySelector(".table-search-input");
const statusFilter = document.querySelector(".status-filter-select");

function applyFilters() {
    let keyword = search ? search.value.toLowerCase().trim() : "";
    let selectedStatus = statusFilter ? statusFilter.value.toLowerCase().trim() : "semua status";
    const rows = document.querySelectorAll("tbody tr");
    
    rows.forEach(function(row){
        if (row.cells.length === 1) return; // Ignore empty state row
        
        const badgeEl = row.querySelector(".badge");
        const rowStatus = badgeEl ? badgeEl.textContent.toLowerCase().trim() : "";
        
        let matchStatus = selectedStatus === "semua status" || rowStatus === selectedStatus;
        let matchSearch = row.innerText.toLowerCase().includes(keyword);
        
        row.style.display = (matchStatus && matchSearch) ? "" : "none";
    });
}

if (search) {
    search.addEventListener("keyup", applyFilters);
}
if (statusFilter) {
    statusFilter.addEventListener("change", applyFilters);
}

// ================= DETAIL MODAL POPULATOR =================
document.querySelectorAll('.btn-detail').forEach(button => {
    button.addEventListener('click', function() {
        document.getElementById('detailAuditId').textContent = this.getAttribute('data-id');
        document.getElementById('detailPerusahaan').textContent = this.getAttribute('data-perusahaan');
        document.getElementById('detailJenisAudit').textContent = this.getAttribute('data-jenis-audit');
        document.getElementById('detailRuangLingkup').textContent = this.getAttribute('data-ruang-lingkup');
        document.getElementById('detailTglMulai').textContent = this.getAttribute('data-tanggal-mulai');
        document.getElementById('detailTglSelesai').textContent = this.getAttribute('data-tanggal-selesai');
        document.getElementById('detailLeadAuditor').textContent = this.getAttribute('data-lead-auditor');
        document.getElementById('detailAnggota').textContent = this.getAttribute('data-anggota');
        document.getElementById('detailLokasi').textContent = this.getAttribute('data-lokasi');
        document.getElementById('detailKategoriWilayah').textContent = this.getAttribute('data-kategori-wilayah');
        
        const status = this.getAttribute('data-status');
        const statusEl = document.getElementById('detailStatus');
        
        // Adjust status badge color & label
        statusEl.className = 'badge';
        statusEl.textContent = status;
        
        const id = this.getAttribute('data-id');
        const formSelesai = document.getElementById('formSelesai');
        
        if (status === 'Aktif') {
            statusEl.style.backgroundColor = '#10B981';
            statusEl.style.color = '#FFF';
            formSelesai.style.display = 'block';
            formSelesai.action = `/pji/audit/${id}/selesai`;
        } else if (status === 'Selesai') {
            statusEl.style.backgroundColor = '#06B6D4';
            statusEl.style.color = '#FFF';
            formSelesai.style.display = 'none';
        } else if (status === 'Revisi') {
            statusEl.style.backgroundColor = '#F59E0B';
            statusEl.style.color = '#FFF';
            formSelesai.style.display = 'none';
        } else {
            // Review or fallback
            statusEl.style.backgroundColor = '#6B7280';
            statusEl.style.color = '#FFF';
            formSelesai.style.display = 'none';
        }
    });
});
</script>

</body>

</html>