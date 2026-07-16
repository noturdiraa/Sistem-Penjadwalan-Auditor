<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Perusahaan</title>
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

        /* ================= CARDS & TYPOGRAPHY ================= */
        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff); /* Background gradient disamakan */
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-card .title {
            font-size: 30px; /* Ukuran tulisan judul disamakan dengan Dashboard PJI (30px) */
            font-weight: 700;
            color: #1F2937;
            margin: 0 0 6px 0;
        }

        .header-card .subtitle {
            margin: 0;
            color: #6b7280;
            font-size: 15px; /* Ukuran deskripsi disamakan */
        }

        .btn-primary {
            background-color: #2563EB;
            border-color: #2563EB;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: none; /* Menghapus transisi */
        }

        .btn-primary:hover {
            background-color: #1D4ED8;
            border-color: #1D4ED8;
        }

        .table-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            padding: 25px;
        }

        .table-search-input {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
            font-size: 14px;
            padding: 10px 18px;
            transition: none;
        }

        .table-search-input:focus {
            border-color: #2563EB;
            outline: none;
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

        .badge {
            font-weight: 600;
            font-size: 12px;
            border-radius: 8px;
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

        .btn-outline-danger {
            border-color: #E5E7EB;
            color: #EF4444;
            border-radius: 8px;
            padding: 6px 10px;
            transition: none;
        }

        .btn-outline-danger:hover {
            background-color: #EF4444;
            border-color: #EF4444;
            color: #fff;
        }

        .footer hr {
            border-color: #E5E7EB;
            opacity: 1;
            margin-bottom: 20px;
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
                <a href="/pji/perusahaan" class="active">
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
                <a href="/pji/review-katim">
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
            <!-- ================= HEADER CARD ================= -->
            <div class="header-card">
                <div>
                    <h2 class="title">Kelola Perusahaan</h2>
                    <p class="subtitle">Manajemen data perusahaan yang diaudit</p>
                </div>
                <a href="/pji/perusahaan/create" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Perusahaan
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                    <i class="fas fa-circle-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- ================= TABLE CARD ================= -->
            <div class="table-card">
                <!-- ================= SEARCH ================= -->
                <div class="mb-4">
                    <input type="text" class="form-control table-search-input" placeholder="🔍 Cari perusahaan...">
                </div>

                <!-- ================= TABEL ================= -->
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Status Jasa</th>
                                <th>Ruang Lingkup</th>
                                <th>Bidang Usaha</th>
                                <th>Skala</th>
                                <th>Telepon / HP</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($perusahaans as $p)
                                <tr>
                                    <td><strong>{{ $p->nama_perusahaan }}</strong></td>
                                    <td>{{ $p->status_jasa ?? '-' }}</td>
                                    <td>{{ $p->ruang_lingkup ?? '-' }}</td>
                                    <td>{{ $p->bidang_usaha ?? '-' }}</td>
                                    <td>{{ $p->skala ?? '-' }}</td>
                                    <td>{{ $p->no_telepon ?? '-' }}</td>
                                    <td>{{ $p->email ?? '-' }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('pji.perusahaan.edit', $p->id_perusahaan) }}" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center justify-content-center">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form action="{{ route('pji.perusahaan.destroy', $p->id_perusahaan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?');" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm d-inline-flex align-items-center justify-content-center">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">Belum ada data perusahaan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ================= MENU ACTIVE =================
        const menu = document.querySelectorAll(".menu a");
        menu.forEach(item => {
            item.addEventListener("click", function () {
                menu.forEach(i => i.classList.remove("active"));
                this.classList.add("active");
            });
        });

        // ================= SEARCH TABLE =================
        const search = document.querySelector(".table-search-input");

        search.addEventListener("keyup", function () {
            let value = this.value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");
            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(value) ?
                    "" :
                    "none";
            });
        });
    </script>
</body>

</html>