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
                        <p class="subtitle">Hasil perhitungan poin rekomendasi tim auditor secara otomatis.</p>
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
                        <div class="step" style="opacity: 1;">
                            <div class="step-circle bg-primary text-white">2</div>
                            <div class="step-title fw-bold text-primary">Generate Tim Audit</div>
                        </div>
                    </div>
                </div>

                <!-- ================= RINGKASAN ================= -->
                <div class="audit-info mb-4" style="background: white; border-radius: 14px; padding: 20px; box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);">
                    <div class="row text-center text-md-start">
                        <div class="col-md-4 mb-3 mb-md-0 border-end">
                            <h6 class="text-secondary fw-semibold mb-1" style="font-size: 12px; text-uppercase: true;">Perusahaan</h6>
                            <p class="fw-bold text-dark mb-0" style="font-size: 15px;">{{ $perusahaan->nama_perusahaan }}</p>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0 border-end">
                            <h6 class="text-secondary fw-semibold mb-1" style="font-size: 12px; text-uppercase: true;">Ruang Lingkup & Lembaga</h6>
                            <p class="fw-bold text-dark mb-0" style="font-size: 15px;">{{ implode(', ', $requestedScopes) ?: 'Lembaga Umum' }}</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-secondary fw-semibold mb-1" style="font-size: 12px; text-uppercase: true;">Periode & Lokasi</h6>
                            <p class="fw-bold text-dark mb-0" style="font-size: 14px;">
                                {{ \Carbon\Carbon::parse($request->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($request->tanggal_selesai)->format('d M Y') }}
                                <span class="d-block text-secondary mt-1 fw-medium" style="font-size: 12px;">📍 {{ $request->lokasi }} ({{ $request->kategori_lokasi }})</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ================= TIM AUDIT FORM ================= -->
                <form action="{{ route('pji.audit.store') }}" method="POST" id="formStoreAudit">
                    @csrf
                    <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id_perusahaan }}">
                    <input type="hidden" name="lokasi" value="{{ $request->lokasi }}">
                    <input type="hidden" name="kategori_lokasi" value="{{ $request->kategori_lokasi }}">
                    <input type="hidden" name="tanggal_mulai" value="{{ $request->tanggal_mulai }}">
                    <input type="hidden" name="tanggal_selesai" value="{{ $request->tanggal_selesai }}">
                    <input type="hidden" name="kompetensi_json" value="{{ $request->kompetensi_json }}">
                    <input type="hidden" name="keterangan" value="{{ $request->keterangan }}">

                    <h3 class="mb-4 fw-bold text-dark d-flex align-items-center gap-2" style="font-size: 20px;">
                        <i class="fas fa-users text-primary"></i>
                        Rekomendasi Auditor Terurut (Poin Tertinggi)
                        <span class="badge bg-primary text-white fs-7" style="padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                            Formula Aktif
                        </span>
                    </h3>

                    <div class="row">
                        @forelse($auditors as $index => $auditor)
                            @php
                                $sc = $auditor->scoring;
                                $avatarBgs = ['bg-avatar-blue', 'bg-avatar-green', 'bg-avatar-purple'];
                                $avatarBg = $avatarBgs[$index % 3];

                                // Auto-select top 1 as Lead and top 2 & 3 as Members by default
                                $isLeadSelected = ($index === 0) ? 'checked' : '';
                                $isMemberSelected = ($index === 1 || $index === 2) ? 'checked' : '';
                            @endphp
                            <div class="col-md-12 mb-3">
                                <div class="card card-auditor shadow-sm p-4 border border-light" style="border-radius: 14px; background: white;">
                                    <div class="row align-items-center">
                                        <!-- Profile Info -->
                                        <div class="col-lg-3 col-md-4 d-flex align-items-center gap-3">
                                            <div class="auditor-avatar {{ $avatarBg }}">
                                                {{ strtoupper(substr($auditor->nama_auditor, 0, 1)) }}
                                            </div>
                                            <div>
                                                <h5 class="fw-bold text-dark mb-1" style="font-size: 16px;">{{ $auditor->nama_auditor }}</h5>
                                                <span class="badge bg-light text-primary border border-primary" style="font-size: 11px; padding: 4px 8px; border-radius: 6px;">
                                                    {{ $auditor->posisi }} ({{ $auditor->jenis_auditor }})
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- Score breakdown -->
                                        <div class="col-lg-6 col-md-5 my-3 my-md-0">
                                            <div class="d-flex flex-wrap gap-2 justify-content-between mb-2">
                                                <div class="text-center" style="flex: 1; min-width: 60px;">
                                                    <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px;">Jabatan</small>
                                                    <span class="fw-bold text-dark fs-6">{{ $sc['jabatan'] }}</span><small class="text-muted" style="font-size: 10px;">/15</small>
                                                </div>
                                                <div class="text-center" style="flex: 1; min-width: 60px;">
                                                    <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px;">Kompetensi</small>
                                                    <span class="fw-bold text-dark fs-6">{{ $sc['kompetensi'] }}</span><small class="text-muted" style="font-size: 10px;">/35</small>
                                                </div>
                                                <div class="text-center" style="flex: 1; min-width: 60px;">
                                                    <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px;">Ketersediaan</small>
                                                    <span class="fw-bold text-dark fs-6">{{ $sc['ketersediaan'] }}</span><small class="text-muted" style="font-size: 10px;">/25</small>
                                                </div>
                                                <div class="text-center" style="flex: 1; min-width: 60px;">
                                                    <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px;">Riwayat</small>
                                                    <span class="fw-bold text-dark fs-6">{{ $sc['riwayat'] }}</span><small class="text-muted" style="font-size: 10px;">/15</small>
                                                </div>
                                                <div class="text-center" style="flex: 1; min-width: 60px;">
                                                    <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px;">Beban Kerja</small>
                                                    <span class="fw-bold text-dark fs-6">{{ $sc['beban'] }}</span><small class="text-muted" style="font-size: 10px;">/10</small>
                                                </div>
                                            </div>
                                            
                                            <div class="progress" style="height: 6px; border-radius: 3px; background-color: #E2E8F0;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $sc['total'] }}%; border-radius: 3px;" aria-valuenow="{{ $sc['total'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="col-lg-3 col-md-3 text-md-end d-flex flex-row flex-md-column justify-content-between align-items-center align-items-md-end gap-2">
                                            <div class="mb-md-2">
                                                <small class="text-secondary d-block text-uppercase" style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px;">Total Skor</small>
                                                <h4 class="fw-bold text-success mb-0" style="font-size: 24px;">{{ $sc['total'] }} <span style="font-size: 13px; font-weight: 500;" class="text-secondary">/100</span></h4>
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
