<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Operasional</title>

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

html {
    overflow-y: scroll;
}

body{
background:#f4f7fc;
overflow-x:hidden;
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
background:linear-gradient(180deg,#ffffff,#fbfdff);
border-radius:14px;
padding:20px 24px;
box-shadow:0 6px 18px rgba(15,61,145,.06);
margin-bottom:22px;
}

.header-card .title{
font-size:30px;
font-weight:700;
margin-bottom:6px;
}

.header-card .subtitle{
color:#6b7280;
font-size:15px;
margin:0;
}

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

/* Make card content consistent: number larger and left column constrained */
.card-stat .d-flex > div{max-width:calc(100% - 90px)}
.card-stat h2{font-size:34px}
.card-stat small{display:block}

/* Force all statistic cards to same min height and align content */
.stats-row{display:flex;flex-wrap:nowrap;gap:20px;align-items:stretch;overflow-x:auto;padding-bottom:10px}
.stat-card-col{flex:0 0 calc(25% - 15px);max-width:calc(25% - 15px)}
.card-stat{min-height:135px;padding:22px;display:flex;align-items:center}
.card-stat .d-flex{width:100%;align-items:center}
.card-stat .d-flex > div:first-child{display:flex;flex-direction:column;justify-content:center}
.card-stat .d-flex > div:first-child h2{margin:0;font-size:34px}
.card-stat .d-flex > div:first-child small{margin-top:6px;color:#6b7280}
.card-stat .icon-box{width:64px;height:64px;border-radius:14px;font-size:22px;flex-shrink:0}
@media (max-width: 992px){
    .stat-card-col{flex:0 0 45%;max-width:45%}
}
@media (max-width: 576px){
    .stat-card-col{flex:0 0 80%;max-width:80%}
}

/* Center table headers and cells for tidy appearance */
.table-box table thead th,
    .table-box table tbody td{
    text-align:center;vertical-align:middle;
}

/* For the review list, use left-aligned content except status */
.table-box .text-start-cell{ text-align:left !important }
.badge-light-blue{ background:#e8f0ff;color:#2563EB;border-radius:999px;padding:.35em .7em }
.kode-link{ color:#2563EB;font-weight:600;text-decoration:none }
.kode-link:hover{ text-decoration:underline }

/* Make status badges centered and compact */
.table-box .badge{display:inline-block;padding:.35em .65em}

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

.table-box{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
margin-top:35px;
}

/* Table header and rows styling to match screenshot */
.table-box{ overflow:hidden }
.table-box table{ border-collapse:separate; border-spacing:0; }
.table-box thead{ background:#eef6ff }
.table-box thead th{
    background:transparent;
    border:none;
    color:#0f172a;
    font-weight:700;
    text-transform:uppercase;
    padding:18px 20px;
}
.table-box thead th:first-child{ border-top-left-radius:12px }
.table-box thead th:last-child{ border-top-right-radius:12px }
.table-box tbody td{ padding:18px 20px; border-top:none; border-bottom:1px solid #f1f5f9 }
.table-box tbody tr:last-child td{ border-bottom:none }

.footer{
color:#6b7280;
padding:14px 0;
}

.footer hr{
border:none;
border-top:1px solid rgba(0,0,0,.08);
margin:10px 0 12px;
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
            <a href="/dashboard-operasional" class="active">
                <i class="fas fa-house"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="/operasional/review-jadwal">
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
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" style="background: none; border: none; color: white; display: flex; align-items: center; gap: 15px; width: 100%; padding: 10px 12px; font-size: 15px; line-height: 1.1; cursor: pointer;">
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

<input
type="text"
class="form-control search"
placeholder="Cari...">

<div class="profile">

<i class="far fa-bell fs-5"></i>

<img src="{{ asset('images/logo.png') }}" alt="Profil">

<span>Operasional</span>

</div>

</div>

<!-- ================= MAIN ================= -->

<div class="main">

<div class="header-card">

<h2 class="title">
Dashboard Operasional
</h2>

<p class="subtitle">
Selamat datang di Sistem Penjadwalan Auditor BSPJI Palembang.
Silakan lakukan review jadwal audit yang dikirim oleh PJI.
</p>

</div>

<!-- ================= LANJUT KE BAGIAN 2 ================= -->
<!-- ================= CARD STATISTIK ================= -->

<div class="stats-row cards-row">

    @php
        $countMenunggu = \App\Models\JadwalAudit::where('status_jadwal', 'Review')->count();
        $countDisetujui = \App\Models\JadwalAudit::whereIn('status_jadwal', ['Aktif', 'Selesai'])->count();
        $countDikembalikan = \App\Models\JadwalAudit::where('status_jadwal', 'Revisi')->count();
        $countTotal = $countMenunggu + $countDisetujui + $countDikembalikan;
    @endphp

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

    <!-- Dikembalikan -->
    <div class="stat-card-col">
        <div class="card-stat">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold text-dark">{{ $countDikembalikan }}</h2>
                    <small class="text-secondary mt-1">
                        Dikembalikan
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

<div class="table-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Jadwal & Riwayat Review
        </h4>

        <a href="/operasional/review-jadwal" class="text-primary fw-semibold">Lihat Semua</a>

    </div>

    <table class="table table-hover align-middle">

        <thead class="table-primary">

            <tr>

                <th class="text-start">PERUSAHAAN</th>

                <th class="text-center">LEMBAGA SERTIFIKASI</th>

                <th class="text-center">TANGGAL AUDIT</th>

                <th class="text-center">STATUS</th>

                <th class="text-center">AKSI</th>

            </tr>

        </thead>

        <tbody>
            @php
                $jadwals = \App\Models\JadwalAudit::with([
                    'audit.perusahaan',
                    'audit.ruangLingkup',
                    'lokasi',
                    'timAudits.auditor',
                    'reviewTeknis'
                ])
                ->orderByRaw("FIELD(status_jadwal, 'Review', 'Revisi', 'Aktif', 'Selesai') ASC")
                ->orderBy('updated_at', 'desc')
                ->take(10)
                ->get();
            @endphp
            @if($jadwals->count() > 0)
                @foreach($jadwals as $jadwal)
                     @php
                         $statusLabel = $jadwal->status_jadwal;
                         $badgeStyle = 'background: #E2E8F0; color: #475569;';

                         if ($jadwal->status_jadwal === 'Review') {
                             $statusLabel = 'Menunggu Review';
                             $badgeStyle = 'background: #FFFBEB; color: #D97706; border: 1px solid #FCD34D;';
                         } elseif ($jadwal->status_jadwal === 'Aktif') {
                             $statusLabel = 'Disetujui';
                             $badgeStyle = 'background: #DEF7EC; color: #03543F; border: 1px solid #A7F3D0;';
                         } elseif ($jadwal->status_jadwal === 'Selesai') {
                             $statusLabel = 'Selesai';
                             $badgeStyle = 'background: #E0F2FE; color: #0369A1; border: 1px solid #BAE6FD;';
                         } elseif ($jadwal->status_jadwal === 'Revisi') {
                             // Check if a new tim audit has been submitted by Operasional
                             // after the last rejection (either by Operasional itself or by Katim PJI)
                             $latestKatimReview = $jadwal->reviewKatimPjis->sortByDesc('created_at')->first();
                             $rev = $jadwal->reviewTeknis->where('status_review', 'Dikembalikan')->sortByDesc('created_at')->first();
                             $lastRejectionTime = $latestKatimReview 
                                 ? $latestKatimReview->created_at 
                                 : ($rev ? $rev->created_at : $jadwal->created_at);

                             $latestTimAudit = $jadwal->timAudits->sortByDesc('created_at')->first();
                             $latestTimAuditTime = $latestTimAudit ? $latestTimAudit->created_at : $jadwal->created_at;

                             $hasBeenSubmitted = $latestTimAuditTime->gt($lastRejectionTime);

                             if ($hasBeenSubmitted) {
                                 $statusLabel = 'Menunggu';
                                 $badgeStyle = 'background: #FEF3C7; color: #92400E; border: 1px solid #FCD34D;';
                             } else {
                                 $statusLabel = 'Dikembalikan';
                                 $badgeStyle = 'background: #FDE8E8; color: #9B1C1C; border: 1px solid #FCA5A5;';
                             }
                         }

                         $leadAuditor = '-';
                         $memberNames = [];
                         foreach ($jadwal->timAudits as $mt) {
                             if ($mt->peran === 'Lead Auditor' && $mt->auditor) {
                                 $leadAuditor = $mt->auditor->nama_auditor;
                             } elseif ($mt->peran === 'Auditor' && $mt->auditor) {
                                 $memberNames[] = $mt->auditor->nama_auditor;
                             }
                         }
                         $anggotaList = implode(', ', $memberNames) ?: '-';
                     @endphp
                     <tr>
                         <td class="text-start text-start-cell"><a href="/operasional/review-jadwal/review?id={{ $jadwal->id_jadwal }}" class="kode-link">{{ $jadwal->audit->perusahaan->nama_perusahaan ?? '-' }}</a></td>
                         <td class="text-center">
                             @foreach(explode(', ', $jadwal->audit->jenis_audit ?? '-') as $jenis)
                                 <span class="badge-light-blue me-1">{{ $jenis }}</span>
                             @endforeach
                         </td>
                         <td class="text-center">{{ $jadwal->tanggal_mulai ? \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d M Y') : '-' }}</td>
                         <td class="text-center"><span class="badge" style="{{ $badgeStyle }} padding: 6px 12px; font-size: 13px; font-weight: 500; border-radius: 6px;">{{ $statusLabel }}</span></td>
                        <td class="text-center">
                            <button class="btn btn-outline-info btn-sm d-inline-flex align-items-center justify-content-center btn-detail" 
                                    style="border-radius: 8px; padding: 6px 10px;"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#detailAuditModal"
                                    data-id="{{ $jadwal->id_jadwal }}"
                                    data-perusahaan="{{ $jadwal->audit->perusahaan->nama_perusahaan ?? '-' }}"
                                    data-jenis-audit="{{ $jadwal->audit->jenis_audit ?? '-' }}"
                                    data-ruang-lingkup="{{ $jadwal->audit->ruang_lingkup ?: ($jadwal->audit->ruangLingkup->nama_ruang_lingkup ?? '-') }}"
                                    data-tanggal-mulai="{{ $jadwal->tanggal_mulai ? \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d F Y') : '-' }}"
                                    data-tanggal-selesai="{{ $jadwal->tanggal_selesai ? \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d F Y') : '-' }}"
                                    data-lead-auditor="{{ $leadAuditor }}"
                                    data-anggota="{{ $anggotaList }}"
                                    data-status="{{ $jadwal->status_jadwal }}"
                                    data-lokasi="{{ $jadwal->lokasi ? $jadwal->lokasi->nama_lokasi : '-' }}"
                                    data-kategori-wilayah="{{ $jadwal->lokasi ? $jadwal->lokasi->kategori_wilayah : '-' }}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center text-secondary py-4">
                        Tidak ada riwayat atau jadwal audit.
                    </td>
                </tr>
            @endif
        </tbody>

    </table>

</div>

<!-- ================= LANJUT BAGIAN 3 ================= -->
<!-- ================= FOOTER ================= -->

</div>
<!-- End Main -->

<div class="footer mt-2 text-center text-muted">

    <hr>

    <p class="mb-0">

        © 2026 Sistem Penjadwalan Auditor BSPJI Palembang

    </p>

</div>

</div>
<!-- End Content -->

<!-- ================= Bootstrap ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ================= Efek Menu Aktif ================= -->

<script>

const menu = document.querySelectorAll(".menu a");

menu.forEach(item => {
    item.addEventListener("click", function () {
        menu.forEach(i => i.classList.remove("active"));
        this.classList.add("active");
    });
});
</script>

<!-- Modal Detail Audit -->
<div class="modal fade" id="detailAuditModal" tabindex="-1" aria-labelledby="detailAuditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 15px 50px rgba(0,0,0,.15);">
            <div class="modal-header" style="border-bottom: none; padding: 24px 24px 10px;">
                <h5 class="modal-title fw-bold text-dark" id="detailAuditModalLabel" style="font-size: 20px;">Detail Data Audit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px; font-size: 14px;">
                <div class="mb-3 d-flex justify-content-between align-items-start">
                    <span class="text-secondary me-3" style="min-width: 120px;">ID Jadwal</span>
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
            <div class="modal-footer" style="border-top: none; padding: 0 24px 24px;">
                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal" style="height: 45px; border-radius: 8px; font-weight: 600; background-color: #F3F4F6; color: #4B5563; border: none; transition: none;">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
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
        if (status === 'Review') {
            statusEl.textContent = 'Menunggu Review';
            statusEl.style.backgroundColor = '#F59E0B';
            statusEl.style.color = '#FFF';
        } else if (status === 'Aktif') {
            statusEl.textContent = 'Disetujui';
            statusEl.style.backgroundColor = '#10B981';
            statusEl.style.color = '#FFF';
        } else if (status === 'Revisi') {
            statusEl.textContent = 'Dikembalikan';
            statusEl.style.backgroundColor = '#EF4444';
            statusEl.style.color = '#FFF';
        } else if (status === 'Selesai') {
            statusEl.textContent = 'Selesai';
            statusEl.style.backgroundColor = '#06B6D4';
            statusEl.style.color = '#FFF';
        } else {
            statusEl.textContent = status;
            statusEl.style.backgroundColor = '#6B7280';
            statusEl.style.color = '#FFF';
        }
    });
});
</script>

</body>

</html>