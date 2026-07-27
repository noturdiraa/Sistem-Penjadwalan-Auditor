@php
    $id = request()->query('id');
    $jadwal = \App\Models\JadwalAudit::with(['audit.perusahaan', 'audit.ruangLingkup', 'lokasi', 'timAudits.auditor'])->findOrFail($id);
@endphp
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

body {
    background: #f4f7fc;
    overflow-x: hidden;
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
    transition: none;
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

/* ================= CONTENT ================= */
.content {
    margin-left: 270px;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.navbar-custom {
    height: 80px;
    background: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 35px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
}

.search {
    width: 350px;
    transition: none;
}

.profile {
    display: flex;
    align-items: center;
    gap: 15px;
}

.profile .bell-icon {
    color: #1F2937;
    font-size: 20px;
    cursor: pointer;
}

.profile img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    object-fit: contain;
}

.profile span {
    font-size: 15px;
    font-weight: 500;
    color: #1F2937;
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
            <a href="/pji/audit">
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
            <a href="/pji/review-katim" class="active">
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

<!-- CONTENT -->
<div class="content">
    <div class="navbar-custom">
        <input type="text" class="form-control search" placeholder="Cari...">

        <div class="profile">
            <i class="far fa-bell bell-icon"></i>
            <img src="{{ asset('images/logo.png') }}">
            <span>PJI</span>
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
                <p>AUD-{{ $jadwal->id_jadwal }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-item">
                <label>Status</label>
                @if($jadwal->status_jadwal === 'Aktif' || $jadwal->status_jadwal === 'Selesai')
                    <span class="badge bg-success text-white">Disetujui</span>
                @else
                    <span class="badge bg-warning text-dark">Menunggu Review Katim</span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-item">
                <label>Perusahaan</label>
                <p>{{ $jadwal->audit->perusahaan->nama_perusahaan ?? '-' }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-item">
                <label>Ruang Lingkup</label>
                <p>{{ $jadwal->audit->ruangLingkup->nama_ruang_lingkup ?? '-' }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-item">
                <label>Tanggal Audit</label>
                <p>{{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d F Y') }} - {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d F Y') }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-item">
                <label>Lokasi Audit</label>
                <p>{{ $jadwal->lokasi->nama_lokasi ?? '-' }} ({{ $jadwal->lokasi->kategori_wilayah ?? '-' }})</p>
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
        @forelse($jadwal->timAudits as $t)
            @php
                $initial = strtoupper(substr($t->auditor->nama_auditor ?? 'AU', 0, 2));
                $bgClass = $t->peran === 'Lead Auditor' ? 'bg-primary' : 'bg-secondary';
                $badgeClass = $t->peran === 'Lead Auditor' ? 'bg-primary' : 'bg-secondary';
                
                // Ruang lingkup / Lembaga list
                $compLembagas = $t->auditor->detailAuditors->map(fn($d) => $d->ruangLingkup->lembaga->nama_lembaga ?? '')->filter()->unique()->implode(', ') ?: '-';
            @endphp
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body text-center">
                        <div class="text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3 {{ $bgClass }}"
                            style="width:80px;height:80px;font-size:30px;font-weight:bold;">
                            {{ $initial }}
                        </div>
                        <h4>{{ $t->auditor->nama_auditor ?? '-' }}</h4>
                        <span class="badge {{ $badgeClass }}">
                            {{ $t->peran }}
                        </span>
                        <hr>
                        <p class="mb-1">
                            <strong>Jenis Audit</strong>
                        </p>
                        <p>{{ $compLembagas }}</p>
                        <p class="mb-1">
                            <strong>Status Sertifikat</strong>
                        </p>
                        <span class="badge bg-success">
                            {{ $t->auditor->status ?? 'Aktif' }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-secondary">
                <p>Belum ada tim audit yang ditugaskan.</p>
            </div>
        @endforelse
    </div>

</div>

<form action="{{ route('pji.reviewkatim.submit', $jadwal->id_jadwal) }}" method="POST" id="formReviewKatim">
    @csrf
    <input type="hidden" name="status" id="reviewStatus" value="setuju">

    <!-- ================= CATATAN PENGEMBALIAN ================= -->
    <div class="card-box">
        <h3 class="info-title">
            <i class="fa-solid fa-clipboard text-danger me-2"></i>
            Catatan Review
        </h3>
        <div class="mb-3">
            <label class="form-label fw-semibold">
                Catatan Review / Alasan Jadwal Audit Dikembalikan
            </label>
            <textarea
                class="form-control"
                name="catatan"
                rows="6"
                placeholder="Tuliskan catatan review di sini..."></textarea>
        </div>
    </div>

    <!-- ================= TOMBOL ================= -->
    <div class="d-flex justify-content-between mt-4 mb-5">
        <a href="/pji/review-katim" class="btn btn-outline-secondary btn-lg px-5" style="border-radius: 12px;">
            <i class="fa-solid fa-arrow-left me-2"></i>
            Kembali
        </a>
        <div class="d-flex gap-2">
            <button type="button" onclick="submitReview('tolak')" class="btn btn-danger btn-lg px-5" style="border-radius: 12px;">
                <i class="fa-solid fa-rotate-left me-2"></i>
                Kembalikan
            </button>
            <button type="button" onclick="submitReview('setuju')" class="btn btn-primary btn-lg px-5" style="border-radius: 12px;">
                <i class="fa-solid fa-circle-check me-2"></i>
                Setujui
            </button>
        </div>
    </div>
</form>

<script>
    function submitReview(status) {
        document.getElementById('reviewStatus').value = status;
        document.getElementById('formReviewKatim').submit();
    }
</script>

</div>
<!-- End Main -->

</div>
<!-- End Content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>