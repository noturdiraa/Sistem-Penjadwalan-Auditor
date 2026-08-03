<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapan Audit Selesai - BSPJI Palembang</title>
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
        }

        .navbar-custom {
            position: sticky;
            top: 0;
            background: white;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            z-index: 999;
        }

        .navbar-custom .search {
            width: 350px;
            transition: none;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
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

        .main {
            padding: 35px;
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

        /* ================= STATISTIK ================= */
        .statistik {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 4px solid #0F3D91;
        }

        .stat-card.secondary-border {
            border-left: 4px solid #2563EB;
        }

        .stat-card h6 {
            color: #6B7280;
            font-size: 14px;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .stat-card h2 {
            color: #1F2937;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }

        .stat-card .icon-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #EFF6FF;
            color: #0F3D91;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        /* ================= TABLE CARD ================= */
        .table-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            padding: 24px;
        }

        .table-custom {
            margin: 0;
        }

        .table-custom th {
            background: #F9FAFB;
            color: #4B5563;
            font-weight: 600;
            font-size: 14px;
            padding: 14px 16px;
            border-bottom: 2px solid #E5E7EB;
        }

        .table-custom td {
            padding: 16px;
            vertical-align: middle;
            font-size: 14px;
            color: #374151;
            border-bottom: 1px solid #F3F4F6;
        }

        /* ================= PRINT ELEMENTS ================= */
        .print-header {
            display: none;
        }

        /* ================= MEDIA PRINT ================= */
        @media print {
            body {
                background: white;
                color: black;
            }

            .sidebar,
            .navbar-custom,
            .header-card,
            .filters-section,
            .no-print {
                display: none !important;
            }

            .content {
                margin-left: 0 !important;
                padding: 0 !important;
            }

            .main {
                padding: 0 !important;
            }

            .statistik {
                grid-template-columns: repeat(2, 1fr) !important;
                margin-bottom: 30px !important;
                gap: 15px !important;
            }

            .stat-card {
                box-shadow: none !important;
                border: 1px solid #D1D5DB !important;
                border-left: 4px solid #0F3D91 !important;
                padding: 15px !important;
            }

            .table-card {
                box-shadow: none !important;
                padding: 0 !important;
            }

            .table-custom th {
                background: #F3F4F6 !important;
                border-bottom: 2px solid #9CA3AF !important;
                color: black !important;
            }

            .table-custom td {
                border-bottom: 1px solid #D1D5DB !important;
            }

            /* Show official report header */
            .print-header {
                display: block !important;
                margin-bottom: 30px;
                border-bottom: 3px double black;
                padding-bottom: 15px;
            }

            .print-header-top {
                display: flex;
                align-items: center;
                gap: 20px;
                justify-content: center;
                margin-bottom: 10px;
            }

            .print-header-top img {
                width: 75px;
                height: auto;
            }

            .print-header-text {
                text-align: center;
            }

            .print-header-text h3 {
                margin: 0;
                font-weight: 700;
                font-size: 20px;
                text-transform: uppercase;
            }

            .print-header-text h4 {
                margin: 5px 0 0 0;
                font-weight: 600;
                font-size: 16px;
                text-transform: uppercase;
            }

            .print-header-text h5 {
                margin: 5px 0 0 0;
                font-weight: 600;
                font-size: 15px;
                text-transform: uppercase;
            }

            .print-header-text p {
                margin: 5px 0 0 0;
                font-size: 12px;
                color: #374151;
            }

            .print-title {
                text-align: center;
                margin-bottom: 25px;
            }

            .print-title h5 {
                margin: 0;
                font-weight: 700;
                font-size: 16px;
                text-decoration: underline;
                text-transform: uppercase;
            }

            .print-title p {
                margin: 5px 0 0 0;
                font-size: 13px;
            }
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
                <a href="/pji/review-katim">
                    <i class="fas fa-clipboard-check"></i>
                    Review Katim PJI
                </a>
            </li>
            <li>
                <a href="/pji/rekapan-audit" class="active">
                    <i class="fas fa-file-invoice"></i>
                    Rekapan Audit
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
        <div class="navbar-custom">
            <div></div> <!-- Spacer -->
            <div class="profile">
                <img src="{{ asset('images/logo.png') }}">
                <span>PJI</span>
            </div>
        </div>

        <div class="main">

            <!-- ================= PRINT HEADER (OFFICIAL) ================= -->
            @php
                $indoMonths = [
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                    '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                    '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                    '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                ];
                $periodeStr = $bulan === 'all' ? 'Tahun ' . $tahun : $indoMonths[$bulan] . ' ' . $tahun;
            @endphp
            <div class="print-header">
                <div class="print-header-top">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    <div class="print-header-text">
                        <h3>KEMENTERIAN PERINDUSTRIAN REPUBLIK INDONESIA</h3>
                        <h4>Badan Standardisasi dan Kebijakan Jasa Industri</h4>
                        <h5>BALAI STANDARDISASI DAN PELAYANAN JASA INDUSTRI PALEMBANG</h5>
                        <p>Jl. Jend. Basuki Rahmat No. 6 Palembang 30127 · Telp. (0711) 412586</p>
                    </div>
                </div>
                <div class="print-title">
                    <h5>LAPORAN REKAPITULASI PELAKSANAAN AUDIT</h5>
                    <p>Periode: <strong>{{ $periodeStr }}</strong></p>
                </div>
            </div>

            <!-- ================= HEADER CARD ================= -->
            <div class="header-card">
                <div>
                    <h2 class="title">Rekapan Audit</h2>
                    <p class="subtitle">Rekapitulasi pelaksanaan audit yang telah berstatus selesai.</p>
                </div>
            </div>

            <!-- ================= FILTERS SECTION ================= -->
            <div class="card p-4 border-0 shadow-sm rounded-4 mb-4 filters-section" style="background: white;">
                <form action="{{ route('pji.rekapan.index') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-secondary small">Filter Bulan</label>
                        <select name="bulan" class="form-select">
                            <option value="all" {{ $bulan === 'all' ? 'selected' : '' }}>Semua Bulan</option>
                            @foreach($indoMonths as $mNum => $mName)
                                <option value="{{ $mNum }}" {{ $bulan === $mNum ? 'selected' : '' }}>{{ $mName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-secondary small">Filter Tahun</label>
                        <select name="tahun" class="form-select">
                            @for($y = date('Y') - 5; $y <= date('Y') + 5; $y++)
                                <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-50" style="background: #0F3D91; border-color: #0F3D91;">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                        <button type="button" class="btn btn-outline-danger w-50" onclick="window.print()">
                            <i class="fas fa-file-pdf me-2"></i>Cetak PDF
                        </button>
                    </div>
                </form>
            </div>

            <!-- ================= STATISTIK BOX ================= -->
            <div class="statistik">
                <div class="stat-card">
                    <div>
                        <h6>Total Audit Selesai</h6>
                        <h2>{{ $jadwalAudits->count() }} Audit</h2>
                    </div>
                    <div class="icon-circle">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                </div>
                <div class="stat-card secondary-border">
                    <div>
                        <h6>Total Hari Perjalanan Dinas</h6>
                        <h2>{{ $totalHari }} Hari</h2>
                    </div>
                    <div class="icon-circle" style="background: #EEF2FF; color: #2563EB;">
                        <i class="fas fa-route"></i>
                    </div>
                </div>
            </div>

            <!-- ================= TABLE CARD ================= -->
            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th>No. Audit</th>
                                <th>Nama Perusahaan</th>
                                <th>Lembaga / Jenis Audit</th>
                                <th>Nama Tim Auditor</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Kategori Wilayah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwalAudits as $j)
                                @php
                                    $lead = $j->timAudits->firstWhere('peran', 'Lead Auditor');
                                    $leadName = $lead ? ($lead->auditor->nama_auditor ?? '-') : '-';
                                    
                                    $members = $j->timAudits->filter(fn($t) => $t->peran !== 'Lead Auditor')->map(fn($t) => $t->auditor->nama_auditor ?? '')->filter()->all();
                                    $membersStr = count($members) > 0 ? implode(', ', $members) : '-';
                                @endphp
                                <tr>
                                    <td class="fw-bold" style="color: #0F3D91;">AUD-{{ $j->id_jadwal }}</td>
                                    <td>{{ $j->audit->perusahaan->nama_perusahaan ?? '-' }}</td>
                                    <td>{{ $j->audit->jenis_audit ?? '-' }}</td>
                                    <td>
                                        <div><strong>Lead:</strong> {{ $leadName }}</div>
                                        <div class="text-secondary" style="font-size: 12px; margin-top: 3px;"><strong>Anggota:</strong> {{ $membersStr }}</div>
                                    </td>
                                    <td>
                                        {{ $j->tanggal_mulai ? \Carbon\Carbon::parse($j->tanggal_mulai)->format('d M Y') : '-' }} s.d.
                                        {{ $j->tanggal_selesai ? \Carbon\Carbon::parse($j->tanggal_selesai)->format('d M Y') : '-' }}
                                    </td>
                                    <td>
                                        <span class="badge {{ $j->lokasi && $j->lokasi->kategori_wilayah === 'Luar Negeri' ? 'bg-danger-subtle text-danger' : 'bg-primary-subtle text-primary' }}" style="font-size: 11px; padding: 4px 8px;">
                                            {{ $j->lokasi->kategori_wilayah ?? 'Dalam Kota' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <div class="mb-2">
                                            <i class="fas fa-folder-open fa-3x text-secondary opacity-50"></i>
                                        </div>
                                        <span>Tidak ada rekapan audit selesai untuk periode ini.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
