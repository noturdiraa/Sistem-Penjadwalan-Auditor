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

                    <div class="row">
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
                            <div class="col-md-12 mb-3">
                                <div class="card card-auditor shadow-sm border-0 rounded-4 p-3" style="box-shadow: 0 4px 12px rgba(15, 61, 145, 0.05) !important;">
                                    <div class="row align-items-center">
                                        <!-- Avatar & Info -->
                                        <div class="col-lg-4 col-md-5 d-flex align-items-center gap-3">
                                            <div class="auditor-avatar flex-shrink-0" style="{{ $avatarBg }} width: 50px; height: 50px; border-radius: 12px; font-size: 18px;">
                                                {{ strtoupper(substr($auditor->nama_auditor, 0, 2)) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold text-dark" style="font-size: 15px;">{{ $auditor->nama_auditor }}</h6>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-secondary-subtle text-secondary fs-8" style="padding: 3px 6px;">{{ $auditor->posisi }}</span>
                                                    <span class="badge {{ $badgeColor }}-subtle text-{{ $isBusy ? 'danger' : 'success' }} fs-8" style="padding: 3px 6px;">
                                                        {{ $badgeText }}
                                                    </span>
                                                </div>
                                                <div class="mt-2 text-secondary" style="font-size: 11px; line-height: 1.3;">
                                                    <strong>Kompetensi:</strong>
                                                    @php
                                                        $groupedComp = [];
                                                        foreach ($auditor->detailAuditors as $detail) {
                                                            if ($detail->ruangLingkup && $detail->ruangLingkup->lembaga) {
                                                                $lemb = $detail->ruangLingkup->lembaga->nama_lembaga;
                                                                $scope = $detail->ruangLingkup->nama_ruang_lingkup;
                                                                $groupedComp[$lemb][] = $scope;
                                                            }
                                                        }
                                                    @endphp
                                                    <ul class="mb-0 ps-3 mt-1" style="list-style-type: square;">
                                                        @forelse ($groupedComp as $lembName => $scopes)
                                                            <li><strong class="text-dark">{{ $lembName }}</strong>: {{ implode(', ', $scopes) }}</li>
                                                        @empty
                                                            <li class="text-muted">Tidak ada kompetensi terdaftar</li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Detail Skor Breakdown -->
                                        <div class="col-lg-5 col-md-4 my-3 my-md-0">
                                            <div class="d-flex align-items-center justify-content-around bg-light rounded-3 p-2" style="font-size: 13px;">
                                                <div class="text-center" style="flex: 1;">
                                                    <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700;">Penugasan Lampau</small>
                                                    <span class="fw-bold text-dark fs-6">{{ $auditor->scoring['penugasan'] }}</span> <small class="text-muted">Poin</small>
                                                </div>
                                                <div class="border-start" style="height: 24px;"></div>
                                                <div class="text-center" style="flex: 1;">
                                                    <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700;">Beban Wilayah</small>
                                                    <span class="fw-bold text-dark fs-6">+{{ $auditor->scoring['kategori'] }}</span> <small class="text-muted">Poin</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Actions & Total Skor -->
                                        <div class="col-lg-3 col-md-3 text-md-end d-flex flex-row flex-md-column justify-content-between align-items-center align-items-md-end gap-2">
                                            <div class="mb-md-2 text-md-end">
                                                <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700;">Total Poin</small>
                                                <h4 class="fw-bold text-primary mb-0" style="font-size: 22px;">{{ $auditor->scoring['total'] }} <span style="font-size: 12px; font-weight: 500;" class="text-secondary">Poin</span></h4>
                                            </div>
                                            
                                            <div class="d-flex gap-2">
                                                <!-- Lead Auditor -->
                                                <input type="radio" class="btn-check btn-role-lead" name="lead_auditor_id" id="lead_{{ $auditor->id_auditor }}" value="{{ $auditor->id_auditor }}" autocomplete="off" required {{ $isLeadSelected }}>
                                                <label class="btn btn-outline-primary btn-sm px-3 d-flex align-items-center justify-content-center" for="lead_{{ $auditor->id_auditor }}" style="border-radius: 8px; font-size: 12px; height: 35px;">
                                                    Lead
                                                </label>

                                                <!-- Member Auditor -->
                                                <input type="checkbox" class="btn-check btn-role-member" name="auditor_ids[]" id="member_{{ $auditor->id_auditor }}" value="{{ $auditor->id_auditor }}" autocomplete="off" {{ $isMemberSelected }}>
                                                <label class="btn btn-outline-secondary btn-sm px-3 d-flex align-items-center justify-content-center" for="member_{{ $auditor->id_auditor }}" style="border-radius: 8px; font-size: 12px; height: 35px;">
                                                    Anggota
                                                </label>
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

    <!-- Event Listener logic to handle roles selection and validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const leadRadios = document.querySelectorAll('.btn-role-lead');
            const memberChecks = document.querySelectorAll('.btn-role-member');
            
            leadRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        const auditorId = this.value;
                        const correspondingMemberCheck = document.getElementById('member_' + auditorId);
                        if (correspondingMemberCheck && correspondingMemberCheck.checked) {
                            correspondingMemberCheck.checked = false;
                        }
                    }
                });
            });

            memberChecks.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        const auditorId = this.value;
                        const correspondingLeadRadio = document.getElementById('lead_' + auditorId);
                        if (correspondingLeadRadio && correspondingLeadRadio.checked) {
                            correspondingLeadRadio.checked = false;
                        }
                    }
                });
            });

            const form = document.getElementById('formStoreAudit');
            form.addEventListener('submit', function(e) {
                const leadChecked = document.querySelector('.btn-role-lead:checked');
                const membersChecked = document.querySelectorAll('.btn-role-member:checked');
                
                if (!leadChecked) {
                    alert('Silakan pilih salah satu auditor sebagai Lead Auditor!');
                    e.preventDefault();
                    return;
                }

                if (membersChecked.length === 0) {
                    alert('Silakan pilih minimal satu auditor sebagai Anggota Tim!');
                    e.preventDefault();
                    return;
                }
            });
        });
    </script>
</body>

</html>