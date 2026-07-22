<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Tim Audit</title>
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

        /* ================= STEP PROGRESS ================= */
        .step-card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
        }

        .step-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .step-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #2563EB;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 15px;
        }

        .step-circle.gray {
            background: #F3F4F6;
            color: #9CA3AF;
            border: 1px solid #E5E7EB;
        }

        .step-title {
            font-weight: 500;
            font-size: 15px;
            color: #1F2937;
        }

        .step-title.text-secondary {
            color: #6B7280;
        }

        .step-line {
            width: 100px;
            height: 2px;
            background: #2563EB; /* Biru karena langkah 1 sudah sukses */
        }

        /* ================= AUDIT INFO CARD ================= */
        .audit-info {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
        }

        .audit-info h6 {
            color: #4B5563;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .audit-info p {
            margin: 0;
            color: #1F2937;
            font-weight: 500;
            font-size: 15px;
        }

        /* ================= AUDITOR CARDS ================= */
        .card-auditor {
            background: white;
            border-radius: 14px;
            border: none;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 20px;
        }

        .auditor-avatar {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 22px;
            color: white;
        }

        .bg-avatar-blue { background-color: #2563EB; }
        .bg-avatar-green { background-color: #059669; }
        .bg-avatar-purple { background-color: #7C3AED; }

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
                    <a href="/pji/audit" class="active">
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
                    <i class="far fa-bell bell-icon"></i>
                    <img src="{{ asset('images/logo.png') }}">
                    <span>PJI</span>
                </div>
            </div>

            <div class="main">
                <!-- ================= HEADER CARD ================= -->
                <div class="header-card">
                    <div>
                        <h2 class="title">Buat Jadwal Audit</h2>
                        <p class="subtitle">Isi informasi audit dan generate tim secara otomatis.</p>
                    </div>
                </div>

                <!-- ================= STEP CARD ================= -->
                <div class="step-card">
                    <div class="step-wrapper">
                        <div class="step">
                            <div class="step-circle"><i class="fas fa-check"></i></div>
                            <div class="step-title">Informasi Audit</div>
                        </div>
                        <div class="step-line"></div>
                        <div class="step">
                            <div class="step-circle">2</div>
                            <div class="step-title">Generate Tim Audit</div>
                        </div>
                    </div>
                </div>

                <!-- ================= RINGKASAN ================= -->
                <div class="audit-info">
                    <div class="row">
                        <div class="col-md-3 mb-3 mb-md-0">
                            <h6>Perusahaan</h6>
                            <p>{{ $perusahaan->nama_perusahaan }}</p>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <h6>Jenis Audit & Ruang Lingkup</h6>
                            <p class="mb-0" style="font-size: 14px; line-height: 1.4;">
                                @php
                                    $kompetensiData = json_decode($request->kompetensi_json, true);
                                    $scopesList = [];
                                    if ($kompetensiData && is_array($kompetensiData)) {
                                        foreach ($kompetensiData as $lId => $info) {
                                            $lembName = trim($info['lembaga_name'] ?? '');
                                            if (!empty($info['scopes'])) {
                                                $scopesList[] = "<strong>{$lembName}</strong>: " . implode(', ', $info['scopes']);
                                            }
                                        }
                                    }
                                @endphp
                                {!! implode('<br>', $scopesList) !!}
                            </p>
                        </div>
                        <div class="col-md-2 mb-3 mb-md-0">
                            <h6>Periode Audit</h6>
                            <p>{{ \Carbon\Carbon::parse($request->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($request->tanggal_selesai)->format('d M Y') }}</p>
                        </div>
                        <div class="col-md-3">
                            <h6>Lokasi Audit</h6>
                            <p class="mb-0">{{ $request->lokasi }}</p>
                            <span class="badge bg-primary-subtle text-primary mt-1" style="font-size: 11px; padding: 4px 8px; border-radius: 6px;">
                                {{ $request->kategori_lokasi }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- ================= FORM PENYIMPANAN ================= -->
                <form action="{{ route('pji.audit.store') }}" method="POST" id="formStoreAudit">
                    @csrf
                    <!-- Hidden inputs to carry forward step 1 values -->
                    <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id_perusahaan }}">
                    <input type="hidden" name="tanggal_mulai" value="{{ $request->tanggal_mulai }}">
                    <input type="hidden" name="tanggal_selesai" value="{{ $request->tanggal_selesai }}">
                    <input type="hidden" name="lokasi" value="{{ $request->lokasi }}">
                    <input type="hidden" name="kategori_lokasi" value="{{ $request->kategori_lokasi }}">
                    <input type="hidden" name="kompetensi_json" value="{{ $request->kompetensi_json }}">
                    <input type="hidden" name="keterangan" value="{{ $request->keterangan }}">

                    <!-- ================= TIM AUDIT ================= -->
                    <h3 class="mb-4 fw-bold text-dark d-flex align-items-center gap-2" style="font-size: 20px;">
                        <i class="fas fa-users text-primary"></i>
                        Tim Audit Terpilih (Berdasarkan Beban Kerja/Poin Terkecil)
                        <span class="badge bg-success-subtle text-success fs-7" style="padding: 6px 12px; border-radius: 8px;">
                            <i class="fas fa-magic me-1"></i> Auto-Generate Aktif
                        </span>
                    </h3>

                    @php
                        // Since there are only exactly 3 auditors shown, 
                        // we auto-select the first one as Lead, and the next two as members.
                        $leadIdx = 0;
                        $memberIdx1 = 1;
                        $memberIdx2 = 2;
                    @endphp

                    <div class="row g-4">
                        @forelse ($auditors as $index => $auditor)
                            @php
                                $isLeadSelected = ($index === $leadIdx) ? 'checked' : '';
                                $isMemberSelected = ($index === $memberIdx1 || $index === $memberIdx2) ? 'checked' : '';
                                
                                $overlapRiwayat = $auditor->scoring['overlap_riwayat'];
                                $overlapJadwal = $auditor->scoring['overlap_jadwal'];
                                $isBusy = $overlapRiwayat || $overlapJadwal;
                                
                                $badgeColor = $isBusy ? 'bg-danger' : 'bg-success';
                                $badgeText = $isBusy ? 'Sibuk' : 'Tersedia';
                                
                                // Color avatar based on status
                                $avatarBg = $isBusy ? 'background: #EF4444;' : 'background: #10B981;';
                                if ($index === $leadIdx) {
                                    $avatarBg = 'background: #2563EB;'; // Blue for Lead
                                }
                            @endphp
                            <div class="col-md-4">
                                <div class="card card-auditor shadow-sm border-0 rounded-4 p-4 h-100 d-flex flex-column justify-content-between" style="box-shadow: 0 4px 15px rgba(15, 61, 145, 0.06) !important; min-height: 480px;">
                                    
                                    <!-- Bagian Atas: Profil Auditor -->
                                    <div>
                                        <div class="d-flex align-items-center gap-3 mb-3">
                                            <div class="auditor-avatar flex-shrink-0" style="{{ $avatarBg }} width: 52px; height: 52px; border-radius: 12px; font-weight: 700; font-size: 20px; display: flex; align-items: center; justify-content: center; color: white;">
                                                {{ strtoupper(substr($auditor->nama_auditor, 0, 2)) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold text-dark fs-6" style="line-height: 1.2;">{{ $auditor->nama_auditor }}</h6>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-secondary-subtle text-secondary fs-8" style="padding: 4px 8px;">{{ $auditor->posisi }}</span>
                                                    <span class="badge {{ $badgeColor }}-subtle text-{{ $isBusy ? 'danger' : 'success' }} fs-8" style="padding: 4px 8px;">
                                                        {{ $badgeText }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="text-muted opacity-25">

                                        <!-- Bagian Tengah: Kompetensi Keahlian (Dicocokkan) -->
                                        <div class="mb-4">
                                            <div class="text-secondary fw-semibold mb-2" style="font-size: 13px;">
                                                <i class="fas fa-certificate text-warning me-1"></i> Kompetensi Sesuai Jadwal:
                                            </div>
                                            @php
                                                $groupedComp = [];
                                                foreach ($auditor->detailAuditors as $detail) {
                                                    if ($detail->ruangLingkup && $detail->ruangLingkup->lembaga) {
                                                        $lembId = $detail->ruangLingkup->lembaga->id_lembaga;
                                                        $lembName = $detail->ruangLingkup->lembaga->nama_lembaga;
                                                        $scope = trim($detail->ruangLingkup->nama_ruang_lingkup);
                                                        
                                                        $isLembagaSelected = isset($kompetensiData[$lembId]);
                                                        $isScopeSelected = in_array($scope, $requestedScopes);
                                                        
                                                        if ($isLembagaSelected && $isScopeSelected) {
                                                            $groupedComp[$lembName][] = $scope;
                                                        }
                                                    }
                                                }
                                            @endphp
                                            <div class="bg-light rounded-3 p-3" style="font-size: 12px; min-height: 120px;">
                                                <ul class="mb-0 ps-3" style="list-style-type: square; line-height: 1.5;">
                                                    @forelse ($groupedComp as $lembName => $scopes)
                                                        <li class="mb-2">
                                                            <strong class="text-dark">{{ $lembName }}</strong>
                                                            <div class="text-muted mt-1" style="font-size: 11px;">{{ implode(', ', $scopes) }}</div>
                                                        </li>
                                                    @empty
                                                        <li class="text-muted">Tidak ada kompetensi terdaftar</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bagian Bawah: Skor & Aksi -->
                                    <div>
                                        <!-- Rincian Poin (100 Poin Scale) -->
                                        <div class="bg-light rounded-3 p-3 mb-3" style="font-size: 11px; line-height: 1.4;">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="text-secondary">1. Jabatan:</span>
                                                <strong class="text-dark">{{ $auditor->scoring['jabatan'] }} <span class="text-muted">/15</span></strong>
                                            </div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="text-secondary">2. Kompetensi:</span>
                                                <strong class="text-dark">{{ $auditor->scoring['kompetensi'] }} <span class="text-muted">/35</span></strong>
                                            </div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="text-secondary">3. Ketersediaan:</span>
                                                <strong class="text-dark">{{ $auditor->scoring['ketersediaan'] }} <span class="text-muted">/25</span></strong>
                                            </div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="text-secondary">4. Riwayat Audit:</span>
                                                <strong class="text-dark">{{ $auditor->scoring['riwayat'] }} <span class="text-muted">/15</span></strong>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-secondary">5. Beban Kerja:</span>
                                                <strong class="text-dark">{{ $auditor->scoring['beban'] }} <span class="text-muted">/10</span></strong>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div>
                                                <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px;">Total Skor</small>
                                                <h4 class="fw-bold text-primary mb-0" style="font-size: 22px;">{{ $auditor->scoring['total'] }} <span style="font-size: 12px; font-weight: 500;" class="text-secondary">/100 Poin</span></h4>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                @if($index === $leadIdx)
                                                    <!-- Hidden Lead input to submit -->
                                                    <input type="hidden" name="lead_auditor_id" value="{{ $auditor->id_auditor }}">
                                                    <span class="badge bg-primary text-white px-3 py-2 fs-7 rounded-3" style="font-weight: 600;">
                                                        <i class="fas fa-crown me-1 text-warning"></i> Lead
                                                    </span>
                                                @else
                                                    <!-- Hidden Member inputs to submit -->
                                                    <input type="hidden" name="auditor_ids[]" value="{{ $auditor->id_auditor }}">
                                                    <span class="badge bg-secondary text-white px-3 py-2 fs-7 rounded-3" style="font-weight: 600;">
                                                        Anggota
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="card shadow-sm border-0 rounded-4 text-center py-5 text-secondary" style="font-size: 15px; background: white;">
                                    <i class="fas fa-info-circle fa-2x mb-3 text-secondary"></i>
                                    <p class="mb-0 fw-medium">Tidak ada auditor yang terdaftar di database.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- ================= TOMBOL ================= -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="/pji/audit/create" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-paper-plane"></i>
                            Simpan & Kirim Review
                        </button>
                    </div>
                </form>
            </div>

            <div class="footer text-center py-4">
                <hr>
                <p class="mb-0 text-secondary">
                    © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- No client-side selection validation needed as Lead and Anggota roles are auto-assigned and static -->
</body>

</html>