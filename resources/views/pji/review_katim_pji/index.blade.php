<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Katim PJI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f4f7fc; /* Warna background disamakan dengan Dashboard PJI */
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 270px;
            height: 100vh;
            background: #0F3D91; /* Warna background disamakan dengan Dashboard PJI (#0F3D91) */
            color: white;
            padding: 14px 18px; /* Padding disamakan dengan Dashboard PJI */
            overflow-y: auto; /* Aktifkan scroll di samping sidebar jika menu melebihi tinggi layar */
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

        .logo {
            text-align: center;
            margin-bottom: 18px; /* Margin-bottom disamakan */
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
            padding: 0; /* Padding disamakan dengan Dashboard PJI (0) agar menu tidak menciut ke tengah */
        }

        .menu li {
            margin-bottom: 10px; /* Margin-bottom disamakan */
        }

        .menu li a {
            display: flex;
            align-items: center;
            gap: 15px;
            border-radius: 12px;
            color: white;
            text-decoration: none;
            white-space: normal;
            padding: 10px 12px; /* Padding menu disamakan */
            font-size: 15px;
            line-height: 1.1;
            transition: none; /* Menghapus transisi agar menu tetap diam dan tidak bergerak saat diklik/hover */
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
            height: 80px; /* Tinggi navbar disamakan dengan Dashboard PJI (80px) */
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05); /* Shadow disamakan */
        }

        .search {
            width: 350px; /* Lebar kotak cari disamakan dengan Dashboard PJI (350px) */
            transition: none; /* Menghapus transisi */
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px; /* Jarak profil disamakan persis (15px) */
        }

        .profile .bell-icon {
            color: #1F2937;
            font-size: 20px;
            cursor: pointer;
        }

        .profile img {
            width: 45px; /* Ukuran logo disamakan persis (45px) */
            height: 45px;
            border-radius: 50%; /* Logo dibuat bulat tanpa border & background wrap sesuai Dashboard PJI */
            object-fit: contain;
        }

        .profile span {
            font-size: 15px;
            font-weight: 500;
            color: #1F2937;
        }

        .main {
            padding: 35px;
            flex-grow: 1;
        }

        /* ================= HEADER CARD ================= */
        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-card .title {
            font-size: 30px;
            font-weight: 700;
            color: #1F2937;
            margin: 0 0 6px 0;
        }

        .header-card .subtitle {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
        }

        /* ================= FILTERS & SECTIONS ================= */
        .filter-row {
            margin-bottom: 22px;
        }

        .table-search-input,
        .status-filter-select {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
            font-size: 14px;
            padding: 10px 16px;
            transition: none;
        }

        .table-search-input:focus,
        .status-filter-select:focus {
            border-color: #2563EB;
            outline: none;
            box-shadow: none;
        }

        /* ================= AUDIT CARD ================= */
        .audit-card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
        }

        .audit-card .card-title-code {
            font-size: 18px;
            font-weight: 700;
            color: #1F2937;
        }

        .audit-info-row {
            display: flex;
            gap: 25px;
            color: #6B7280;
            font-size: 14px;
            margin-top: 15px;
        }

        .audit-info-row span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn {
            height: 45px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: none;
        }

        .btn-primary {
            background-color: #2563EB;
            border-color: #2563EB;
        }

        .btn-primary:hover {
            background-color: #1D4ED8;
            border-color: #1D4ED8;
        }

        .btn-outline-danger {
            border-color: #EF4444;
            color: #EF4444;
        }

        .btn-outline-danger:hover {
            background-color: #EF4444;
            color: white;
            border-color: #EF4444;
        }

        .footer hr {
            border-color: #E5E7EB;
            opacity: 1;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="content-wrapper">
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
                    <a href="/pji/review-katim" class="active">
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
                    <i class="far fa-bell bell-icon"></i>
                    <img src="{{ asset('images/logo.png') }}">
                    <span>PJI</span>
                </div>
            </div>

            <div class="main">
                <!-- ================= HEADER CARD ================= -->
                <div class="header-card">
                    <div>
                        <h2 class="title">Review Katim PJI</h2>
                        <p class="subtitle">Setujui atau kembalikan jadwal audit yang telah diverifikasi Teknis</p>
                    </div>
                </div>

                <!-- ================= FILTER ROW ================= -->
                <div class="row filter-row align-items-center">
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control table-search-input" placeholder="🔍 Cari ID / Perusahaan...">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select status-filter-select">
                            <option selected>Semua Status</option>
                            <option>Menunggu Persetujuan</option>
                            <option>Disetujui</option>
                            <option>Ditolak</option>
                        </select>
                    </div>
                </div>

                <!-- ================= MAIN AUDIT CARD (1 Dummy Data) ================= -->
                <div class="audit-card">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <span class="card-title-code">AUD-2026-001</span> <!-- Badges removed per request -->
                            <h4 class="fw-bold text-dark mt-2 mb-1" style="font-size: 20px;">PT ABC Indonesia</h4>
                            <div class="audit-info-row">
                                <span><i class="far fa-building"></i> Sertifikasi</span>
                                <span><i class="fas fa-location-dot"></i> Palembang</span>
                                <span><i class="far fa-user"></i> Popy Marlina</span>
                                <span><i class="far fa-calendar"></i> 25 Jun – 27 Jun 2026</span>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#reviewModal">
                            <i class="far fa-eye me-1"></i> Review
                        </button>
                    </div>
                </div>

            </div>

            <div class="footer text-center py-4">
                <hr>
                <p class="mb-0 text-secondary">
                    © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
                </p>
            </div>
        </div>
    </div>

    <!-- ================= REVIEW MODAL ================= -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <div class="modal-header" style="border-bottom: 1px solid #F3F4F6; padding: 20px 24px;">
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-1" id="reviewModalLabel" style="font-size: 20px;">Review Jadwal Audit — AUD-2026-001</h5>
                        <small class="text-secondary" style="font-size: 14px;">PT ABC Indonesia</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="transition: none;"></button>
                </div>
                <div class="modal-body" style="padding: 24px;">
                    <!-- Blue Summary Header -->
                    <div class="p-3 mb-4 rounded-3" style="background-color: #EFF6FF; border: 1px solid #BFDBFE; font-size: 14px;">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-primary" style="font-weight: 500;">ID Audit:</span>
                            <strong class="text-primary">AUD-2026-001</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-primary" style="font-weight: 500;">Perusahaan:</span>
                            <strong class="text-primary">PT ABC Indonesia</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-primary" style="font-weight: 500;">Ruang Lingkup:</span>
                            <strong class="text-primary">Sertifikasi</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-primary" style="font-weight: 500;">Lokasi:</span>
                            <strong class="text-primary">Palembang</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-primary" style="font-weight: 500;">Ketua Tim:</span>
                            <strong class="text-primary">Popy Marlina</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-primary" style="font-weight: 500;">Tanggal:</span>
                            <strong class="text-primary">25 Jun – 27 Jun 2026</strong>
                        </div>
                    </div>

                    <!-- Review Textarea -->
                    <div class="mb-0">
                        <label class="form-label fw-semibold text-dark mb-2" style="font-size: 14px;">Catatan Review / Alasan Pengembalian</label>
                        <textarea class="form-control" placeholder="Masukkan catatan atau alasan jika jadwal dikembalikan..." style="height: 100px; border-radius: 8px; font-size: 14px; resize: none;"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between" style="border-top: none; padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-danger px-4" style="height: 45px; border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-undo"></i> Kembalikan
                    </button>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="height: 45px; border-radius: 8px; font-weight: 600; background-color: #F3F4F6; color: #4B5563; border: none; transition: none;">
                            Batal
                        </button>
                        <button type="button" class="btn btn-primary px-4" style="height: 45px; border-radius: 8px; font-weight: 600;">
                            Setujui
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ================= SEARCH =================
        const search = document.querySelector(".table-search-input");
        const cards = document.querySelectorAll(".audit-card");

        search.addEventListener("keyup", function(){
            let keyword = this.value.toLowerCase();
            cards.forEach(function(card){
                card.style.display = card.innerText.toLowerCase().includes(keyword)
                    ? ""
                    : "none";
            });
        });
    </script>
</body>

</html>