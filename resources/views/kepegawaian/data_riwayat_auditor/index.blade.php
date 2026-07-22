<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Auditor - Kepegawaian</title>
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

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 290px;
            height: 100vh;
            background: #0F3D91;
            padding: 18px;
            color: white;
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo img {
            width: 70px;
            margin-bottom: 10px;
        }

        .logo h4 {
            font-weight: 700;
            margin: 0;
        }

        .logo p {
            font-size: 14px;
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
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            text-decoration: none;
            color: white;
            transition: .3s;
        }

        .menu li a:hover,
        .menu li a.active {
            background: #2563EB;
        }

        /* CONTENT */
        .content {
            margin-left: 290px;
            min-height: 100vh;
        }

        .navbar-custom {
            background: white;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0,0,0,.05);
        }

        .search-box {
            width: 350px;
        }

        .right-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .right-menu i {
            font-size: 20px;
            color: #555;
            cursor: pointer;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile span {
            font-weight: 600;
            color: #333;
        }

        .main {
            padding: 35px;
        }

        /* HEADER CARD */
        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, .06);
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-card .title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .header-card .subtitle {
            color: #6b7280;
            font-size: 14px;
            margin: 0;
        }

        .btn-add {
            background: #2563EB;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
            transition: .2s;
        }

        .btn-add:hover {
            background: #1d4ed8;
            color: white;
        }

        /* STATS CARD */
        .card-stat {
            background: white;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            border: 1px solid #eef2f6;
            margin-bottom: 25px;
        }

        .card-stat h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .icon-box {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-blue-light { background: #eff6ff; color: #2563eb; }
        .bg-green-light { background: #f0fdf4; color: #16a34a; }
        .bg-orange-light { background: #fff7ed; color: #ea580c; }

        /* TABLE */
        .table-box {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            border: 1px solid #eef2f6;
        }

        .table thead th {
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
            border-bottom: 2px solid #edf2f7;
            padding: 16px;
        }

        .table tbody td {
            padding: 16px;
            border-bottom: 1px solid #edf2f7;
            color: #334155;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .bg-light-blue { background: #e0f2fe; color: #0369a1; }
        .bg-light-green { background: #dcfce7; color: #15803d; }
        .bg-light-red { background: #fee2e2; color: #b91c1c; }

        .btn-action {
            font-size: 16px;
            margin-right: 8px;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .text-blue { color: #2563EB; }
        .text-orange { color: #F59E0B; }
        .text-red { color: #EF4444; }

        .footer {
            padding: 25px;
            text-align: center;
            color: #64748b;
        }
    
        .search-box input, .search-box .form-control {
            border-radius: 30px !important;
            height: 45px !important;
            padding: 10px 18px !important;
        }
        .profile {
            display: flex;
            align-items: center;
            gap: 10px !important;
        }
        .profile img {
            width: 45px !important;
            height: 45px !important;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile span {
            font-weight: 500 !important;
            color: #333;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo BSPJI">
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
                <a href="/kepegawaian/auditor">
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
                <a href="/kepegawaian/riwayat-auditor" class="active">
                    <i class="fas fa-clock-rotate-left"></i>
                    Riwayat Auditor
                </a>
            </li>
            <li>
                <a href="/kepegawaian/profil">
                    <i class="fas fa-user"></i>
                    Profil
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; display: flex; align-items: center; gap: 12px; width: 100%; padding: 12px 14px; font-size: 15px; line-height: 1.1; cursor: pointer;">
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
            <div class="search-box">
                <input type="text" class="form-control" id="searchTable" placeholder="Cari riwayat...">
            </div>

            <div class="right-menu">
                <i class="far fa-bell"></i>
                <div class="profile">
                    <img src="{{ asset('images/logo.png') }}">
                    <span>Kepegawaian</span>
                </div>
            </div>
        </div>

        <div class="main">
            <!-- Header Card -->
            <div class="header-card">
                <div>
                    <h2 class="title">Riwayat Penugasan Auditor</h2>
                    <p class="subtitle">Manajemen data riwayat audit dan peran masing-masing auditor</p>
                </div>
                <a href="{{ route('kepegawaian.riwayatauditor.create') }}" class="btn-add">
                    <i class="fas fa-plus"></i>
                    Tambah Riwayat
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                    <i class="fas fa-circle-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Stats Row -->
            @php
                $totalRiwayat = $riwayats->count();
                $berlangsung = $riwayats->where('status_penugasan', 'Berlangsung')->count();
                $selesai = $riwayats->where('status_penugasan', 'Selesai')->count();
            @endphp
            <div class="row mb-2">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card-stat d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="text-dark">{{ $totalRiwayat }}</h3>
                            <small class="text-secondary">Total Riwayat Penugasan</small>
                        </div>
                        <div class="icon-box bg-blue-light">
                            <i class="fas fa-clipboard-list fa-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card-stat d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="text-dark">{{ $berlangsung }}</h3>
                            <small class="text-secondary">Penugasan Berlangsung</small>
                        </div>
                        <div class="icon-box bg-orange-light">
                            <i class="fas fa-spinner fa-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card-stat d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="text-dark">{{ $selesai }}</h3>
                            <small class="text-secondary">Penugasan Selesai</small>
                        </div>
                        <div class="icon-box bg-green-light">
                            <i class="fas fa-circle-check fa-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-box">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 35%">Auditor</th>
                                <th style="width: 35%">Audit Perusahaan</th>
                                <th style="width: 15%">Peran</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayats as $index => $riwayat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-3" style="background: #2563EB; color: white; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px;">
                                                {{ strtoupper(substr($riwayat->auditor->nama_auditor ?? 'A', 0, 1)) }}
                                            </div>
                                            <div>
                                                <strong>{{ $riwayat->auditor->nama_auditor ?? '-' }}</strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $riwayat->perusahaan->nama_perusahaan ?? $riwayat->audit->perusahaan->nama_perusahaan ?? '-' }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-light-blue">{{ $riwayat->peran_auditor }}</span>
                                    </td>
                                    <td>
                                        <span class="badge-status {{ $riwayat->status_penugasan == 'Selesai' ? 'bg-light-green' : ($riwayat->status_penugasan == 'Dibatalkan' ? 'bg-light-red' : 'bg-light-blue') }}">
                                            {{ $riwayat->status_penugasan }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn-action btn-detail" 
                                                style="border: none; background: none; padding: 0;"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#detailModal"
                                                data-auditor="{{ $riwayat->auditor->nama_auditor ?? '-' }}"
                                                data-nip="{{ $riwayat->auditor->nip ?? '-' }}"
                                                data-perusahaan="{{ $riwayat->perusahaan->nama_perusahaan ?? $riwayat->audit->perusahaan->nama_perusahaan ?? '-' }}"
                                                data-lembaga="{{ $riwayat->lembaga->nama_lembaga ?? $riwayat->perusahaan->status_jasa ?? $riwayat->audit->ruangLingkup->lembaga->nama_lembaga ?? '-' }}"
                                                data-jenis-audit="{{ $riwayat->jenis_audit ?? $riwayat->audit->jenis_audit ?? '-' }}"
                                                data-peran="{{ $riwayat->peran_auditor }}"
                                                data-tanggal-mulai="{{ \Carbon\Carbon::parse($riwayat->tanggal_mulai)->format('d M Y') }}"
                                                data-tanggal-selesai="{{ $riwayat->tanggal_selesai ? \Carbon\Carbon::parse($riwayat->tanggal_selesai)->format('d M Y') : '-' }}"
                                                data-status="{{ $riwayat->status_penugasan }}"
                                                data-keterangan="{{ $riwayat->keterangan ?? '-' }}"
                                                data-tim="@php
                                                    if ($riwayat->tim_audit_lainnya) {
                                                        echo $riwayat->tim_audit_lainnya;
                                                    } else {
                                                        $teamNames = [];
                                                        if ($riwayat->jadwalAudit) {
                                                            foreach ($riwayat->jadwalAudit->timAudits as $t) {
                                                                if ($t->auditor && $t->id_auditor != $riwayat->id_auditor) {
                                                                    $teamNames[] = $t->auditor->nama_auditor . ' (NIP: ' . ($t->auditor->nip ?: '-') . ')';
                                                                }
                                                            }
                                                        }
                                                        echo count($teamNames) > 0 ? implode(' | ', $teamNames) : 'Tidak ada anggota tim lain';
                                                    }
                                                @endphp">
                                            <i class="fas fa-eye text-blue" title="Detail"></i>
                                        </button>
                                        <a href="{{ route('kepegawaian.riwayatauditor.edit', $riwayat->id_riwayat) }}" class="btn-action">
                                            <i class="fas fa-pen text-orange" title="Edit"></i>
                                        </a>
                                        <form action="{{ route('kepegawaian.riwayatauditor.destroy', $riwayat->id_riwayat) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data riwayat ini?');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action">
                                                <i class="fas fa-trash text-red" title="Hapus"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <div class="mb-3">
                                            <i class="fas fa-clock-rotate-left fa-3x text-secondary opacity-50"></i>
                                        </div>
                                        <h5 class="fw-semibold text-dark mb-1">Belum Ada Data Riwayat</h5>
                                        <p class="small text-muted mb-0">Silakan klik tombol <strong>Tambah Riwayat</strong> untuk memasukkan data baru.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ================= DETAIL MODAL ================= -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                    <div class="modal-header" style="border-bottom: 1px solid #F3F4F6; padding: 20px 24px;">
                        <h5 class="modal-title fw-bold text-dark" id="detailModalLabel"><i class="fas fa-circle-info text-blue me-2"></i>Detail Riwayat Penugasan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="transition: none;"></button>
                    </div>
                    <div class="modal-body" style="padding: 24px; font-size: 14px;">
                        <div class="row">
                            <!-- Left Side Info -->
                            <div class="col-md-6 border-end">
                                <div class="mb-4">
                                    <h6 class="fw-bold text-secondary mb-3"><i class="fas fa-user-tie me-2"></i>DATA AUDITOR</h6>
                                    <div class="mb-2">Nama: <strong class="text-dark" id="modalAuditorName">-</strong></div>
                                    <div class="mb-2">NIP: <strong class="text-dark" id="modalAuditorNip">-</strong></div>
                                    <div class="mb-2">Peran: <span class="badge bg-light-blue" id="modalAuditorPeran">-</span></div>
                                </div>
                                <div class="mb-4">
                                    <h6 class="fw-bold text-secondary mb-3"><i class="fas fa-building me-2"></i>DETAIL AUDIT & PERUSAHAAN</h6>
                                    <div class="mb-2">Perusahaan: <strong class="text-dark" id="modalPerusahaanName">-</strong></div>
                                    <div class="mb-2">Lembaga: <strong class="text-dark" id="modalLembagaName">-</strong></div>
                                    <div class="mb-2">Jenis Audit: <strong class="text-dark" id="modalJenisAudit">-</strong></div>
                                </div>
                            </div>

                            <!-- Right Side Info -->
                            <div class="col-md-6 ps-md-4">
                                <div class="mb-4">
                                    <h6 class="fw-bold text-secondary mb-3"><i class="fas fa-calendar-days me-2"></i>TANGGAL & STATUS</h6>
                                    <div class="mb-2">Tanggal Mulai: <strong class="text-dark" id="modalTanggalMulai">-</strong></div>
                                    <div class="mb-2">Tanggal Selesai: <strong class="text-dark" id="modalTanggalSelesai">-</strong></div>
                                    <div class="mb-2">Status Penugasan: <span class="badge-status bg-light-green" id="modalStatus">-</span></div>
                                </div>
                                <div class="mb-4">
                                    <h6 class="fw-bold text-secondary mb-3"><i class="fas fa-users-gear me-2"></i>TIM AUDIT LAINNYA</h6>
                                    <div id="modalTimAudit" class="text-dark fw-semibold" style="line-height: 1.6;">-</div>
                                </div>
                            </div>

                            <!-- Bottom Keterangan -->
                            <div class="col-12 border-top pt-3 mt-2">
                                <h6 class="fw-bold text-secondary mb-2"><i class="fas fa-comments me-2"></i>KETERANGAN / CATATAN</h6>
                                <p class="text-dark mb-0 bg-light p-3 rounded-3" id="modalKeterangan" style="min-height: 60px;">-</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: none; padding: 0 24px 24px;">
                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal" style="height: 45px; border-radius: 8px; font-weight: 600; background-color: #F3F4F6; color: #4B5563; border: none; transition: none;">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <hr style="border-color: #E2E8F0;">
            <p>© 2026 Sistem Penjadwalan Auditor BSPJI Palembang</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple search functionality
        document.getElementById('searchTable').addEventListener('keyup', function() {
            const keyword = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                if (row.innerText.toLowerCase().includes(keyword)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Handle detail modal popup
        const detailModal = document.getElementById('detailModal');
        detailModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            
            // Get data attributes
            const auditor = button.getAttribute('data-auditor');
            const nip = button.getAttribute('data-nip');
            const perusahaan = button.getAttribute('data-perusahaan');
            const lembaga = button.getAttribute('data-lembaga');
            const jenisAudit = button.getAttribute('data-jenis-audit');
            const peran = button.getAttribute('data-peran');
            const tanggalMulai = button.getAttribute('data-tanggal-mulai');
            const tanggalSelesai = button.getAttribute('data-tanggal-selesai');
            const status = button.getAttribute('data-status');
            const keterangan = button.getAttribute('data-keterangan');
            const tim = button.getAttribute('data-tim');

            // Populate Modal
            document.getElementById('modalAuditorName').innerText = auditor;
            document.getElementById('modalAuditorNip').innerText = nip;
            document.getElementById('modalAuditorPeran').innerText = peran;
            document.getElementById('modalPerusahaanName').innerText = perusahaan;
            document.getElementById('modalLembagaName').innerText = lembaga;
            document.getElementById('modalJenisAudit').innerText = jenisAudit;
            document.getElementById('modalTanggalMulai').innerText = tanggalMulai;
            document.getElementById('modalTanggalSelesai').innerText = tanggalSelesai;
            document.getElementById('modalKeterangan').innerText = keterangan;

            const statusEl = document.getElementById('modalStatus');
            statusEl.innerText = status;
            statusEl.className = 'badge-status ' + (status === 'Selesai' ? 'bg-light-green' : 'bg-light-blue');

            // Parse tim list
            const timEl = document.getElementById('modalTimAudit');
            timEl.innerHTML = '';
            const members = tim.split(' | ');
            if (members.length > 0 && members[0] !== 'Tidak ada anggota tim lain') {
                const ul = document.createElement('ul');
                ul.style.paddingLeft = '20px';
                ul.style.margin = '0';
                members.forEach(m => {
                    const li = document.createElement('li');
                    li.innerText = m;
                    ul.appendChild(li);
                });
                timEl.appendChild(ul);
            } else {
                timEl.innerText = 'Tidak ada anggota tim lain';
            }
        });
    </script>
</body>

</html>
