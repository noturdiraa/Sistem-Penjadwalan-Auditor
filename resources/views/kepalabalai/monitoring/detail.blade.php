<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Monitoring - Kepala Balai</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Font -->
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

        .menu li a:hover,
        .menu li a.active {
            background: #2563EB;
        }

        .content {
            margin-left: 270px;
            min-height: 100vh;
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

        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
            white-space: nowrap;
        }

        .profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }

        .main {
            padding: 35px;
        }

        .header-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            margin-bottom: 30px;
        }

        .header-card h2 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .header-card p {
            margin: 0;
            color: #777;
        }

        .btn-outline-secondary {
            border-color: #E2E8F0;
            color: #4B5563;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-outline-secondary:hover {
            background-color: #F3F4F6;
            color: #1F2937;
        }

        .detail-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            margin-bottom: 30px;
        }

        /* Info Item Styles */
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .info-item i {
            font-size: 20px;
            color: #9CA3AF;
            margin-top: 4px;
            width: 24px;
            text-align: center;
        }

        .info-item-label {
            font-size: 13px;
            color: #6B7280;
            margin-bottom: 2px;
        }

        .info-item-value {
            font-size: 15px;
            font-weight: 600;
            color: #1F2937;
        }

        /* Progress Styles */
        .progress-bar-custom {
            height: 10px;
            background-color: #F1F5F9;
            border-radius: 999px;
            overflow: hidden;
            width: 100%;
        }

        .progress-bar-fill {
            height: 100%;
            background-color: #2563EB;
            border-radius: 999px;
        }

        /* Member Card Styles */
        .member-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }

        .bg-avatar-blue { background-color: #3B82F6; }
        .bg-avatar-purple { background-color: #8B5CF6; }
        .bg-avatar-green { background-color: #10B981; }

        .member-item {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .member-item:last-child {
            margin-bottom: 0;
        }

        .footer {
            padding: 15px;
            text-align: center;
            color: #777;
        }

        .footer hr {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR ================= -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}">
            <h4>BSPJI</h4>
            <p>Kepala Balai</p>
        </div>

        <ul class="menu">
            <li>
                <a href="/dashboard-kepala-balai">
                    <i class="fas fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/kepala-balai/monitoring" class="active">
                    <i class="fas fa-chart-line"></i>
                    Monitoring
                </a>
            </li>
            <li>
                <a href="/kepala-balai/kalender-audit">
                    <i class="fas fa-calendar-days"></i>
                    Kalender Audit
                </a>
            </li>
            <li>
                <a href="/kepala-balai/grafik-penugasan">
                    <i class="fas fa-chart-column"></i>
                    Grafik Penugasan
                </a>
            </li>
            <li>
                <a href="/kepala-balai/profil">
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
            <div class="search-box-container" style="position: relative; width: 320px;">
                <input type="text" class="form-control" placeholder="Cari..." style="height: 38px; border-radius: 20px; padding-left: 35px; font-size: 14px; border: 1px solid #E2E8F0; background-color: #F8FAFC;">
                <i class="fas fa-search text-secondary" style="position: absolute; left: 12px; top: 12px; font-size: 14px;"></i>
            </div>

            <div class="profile">
                <i class="far fa-bell fs-5 me-3" style="cursor: pointer; color: #6B7280;"></i>
                <img src="{{ asset('images/logo.png') }}">
                <strong>Kepala Balai</strong>
            </div>
        </div>

        <div class="main">
            <!-- ================= HEADER CARD ================= -->
            <div class="header-card">
                <div>
                    <h2>Detail Monitoring Audit</h2>
                    <p>Informasi lengkap pelaksanaan audit</p>
                </div>
            </div>

            <!-- ================= INFORMASI AUDIT CARD ================= -->
            <div class="detail-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold text-dark mb-0" style="font-size: 18px;">Informasi Audit</h4>
                    <span class="badge" style="background-color: #FEF3C7; color: #D97706; font-weight: 600; padding: 6px 16px; border-radius: 20px; font-size: 13px;">Berlangsung</span>
                </div>

                <div class="row gy-4">
                    <!-- Perusahaan -->
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="far fa-building"></i>
                            <div>
                                <div class="info-item-label">Perusahaan</div>
                                <div class="info-item-value">PT ABC Indonesia</div>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <div class="info-item-label">Lokasi</div>
                                <div class="info-item-value">Palembang</div>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Audit -->
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="fas fa-clipboard-list"></i>
                            <div>
                                <div class="info-item-label">Jenis Audit</div>
                                <div class="info-item-value">LSSM</div>
                            </div>
                        </div>
                    </div>

                    <!-- Kategori Wilayah -->
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="fas fa-map-pin"></i>
                            <div>
                                <div class="info-item-label">Kategori Wilayah</div>
                                <div class="info-item-value">Dalam Kota</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="far fa-calendar-check"></i>
                            <div>
                                <div class="info-item-label">Tanggal Mulai</div>
                                <div class="info-item-value">25 Juni 2026</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="far fa-calendar-times"></i>
                            <div>
                                <div class="info-item-label">Tanggal Selesai</div>
                                <div class="info-item-value">30 Juni 2026</div>
                            </div>
                        </div>
                    </div>

                    <!-- Ruang Lingkup -->
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="fas fa-tags"></i>
                            <div>
                                <div class="info-item-label">Ruang Lingkup</div>
                                <div class="info-item-value">Karet dan produk plastik (14)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= TIM AUDIT CARD ================= -->
            <div class="detail-card">
                <h4 class="fw-bold text-dark mb-4" style="font-size: 18px;"><i class="far fa-user me-2 text-primary"></i>Tim Audit</h4>

                <!-- Ketua Tim Section -->
                <div class="mb-4">
                    <h5 class="text-secondary fw-semibold mb-3" style="font-size: 14px;">Ketua Tim</h5>
                    <div class="member-item">
                        <div class="d-flex align-items-center gap-3">
                            <div class="member-avatar bg-avatar-blue">PM</div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1" style="font-size: 15px;">Popy Marlina</h6>
                                <span class="badge bg-purple-subtle text-purple" style="font-size: 10px; padding: 3px 8px; border-radius: 6px;">Lead Auditor</span>
                            </div>
                        </div>
                        <div class="text-end text-secondary" style="font-size: 13px;">
                            <div><i class="fas fa-certificate me-1"></i> Kompetensi: LSPRO, LSSM, LSSML</div>
                        </div>
                    </div>
                </div>

                <!-- Anggota Tim Section -->
                <div>
                    <h5 class="text-secondary fw-semibold mb-3" style="font-size: 14px;">Anggota Tim</h5>
                    
                    <div class="member-item">
                        <div class="d-flex align-items-center gap-3">
                            <div class="member-avatar bg-avatar-purple">AS</div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1" style="font-size: 15px;">Andi Saputra</h6>
                                <span class="badge bg-secondary-subtle text-secondary" style="font-size: 10px; padding: 3px 8px; border-radius: 6px;">Auditor 1</span>
                            </div>
                        </div>
                        <div class="text-end text-secondary" style="font-size: 13px;">
                            <div><i class="fas fa-certificate me-1"></i> Kompetensi: LSPRO, LSSM</div>
                        </div>
                    </div>

                    <div class="member-item mt-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="member-avatar bg-avatar-green">MR</div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1" style="font-size: 15px;">Muhammad Rizki</h6>
                                <span class="badge bg-secondary-subtle text-secondary" style="font-size: 10px; padding: 3px 8px; border-radius: 6px;">Auditor 2</span>
                            </div>
                        </div>
                        <div class="text-end text-secondary" style="font-size: 13px;">
                            <div><i class="fas fa-certificate me-1"></i> Kompetensi: LSSM, LSMK3</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= RIWAYAT PERUBAHAN CARD ================= -->
            <div class="detail-card mt-4">
                <h4 class="fw-bold text-dark mb-4" style="font-size: 18px;"><i class="fas fa-history me-2 text-primary"></i>Riwayat Perubahan Tim</h4>
                
                <div class="timeline-container">
                    <!-- History Item 1 -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center text-white" style="width: 32px; height: 32px; font-size: 14px;">
                                <i class="fas fa-user-sync"></i>
                            </div>
                            <div class="bg-secondary opacity-25" style="width: 2px; flex-grow: 1; min-height: 40px;"></div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 15px;">Perubahan Auditor 2</h6>
                                <span class="badge bg-light text-secondary border" style="font-size: 11px;">24 Juni 2026</span>
                            </div>
                            <div class="text-secondary" style="font-size: 13px;">
                                Mengganti <strong class="text-dark">Rina Wijaya</strong> dengan <strong class="text-dark">Muhammad Rizki</strong>
                            </div>
                            <small class="text-muted d-block mt-1" style="font-size: 12px; font-style: italic;">
                                Alasan: Penyesuaian jadwal karena auditor lama bentrok dengan kegiatan sertifikasi lain.
                            </small>
                        </div>
                    </div>

                    <!-- History Item 2 -->
                    <div class="d-flex gap-3">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center text-white" style="width: 32px; height: 32px; font-size: 14px;">
                                <i class="fas fa-user-tie"></i>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                <h6 class="fw-bold text-dark mb-0" style="font-size: 15px;">Perubahan Ketua Tim (Lead Auditor)</h6>
                                <span class="badge bg-light text-secondary border" style="font-size: 11px;">22 Juni 2026</span>
                            </div>
                            <div class="text-secondary" style="font-size: 13px;">
                                Mengganti <strong class="text-dark">Ahmad Syarif</strong> dengan <strong class="text-dark">Popy Marlina</strong>
                            </div>
                            <small class="text-muted d-block mt-1" style="font-size: 12px; font-style: italic;">
                                Alasan: Ketua Tim lama mendapat penugasan khusus mendadak dari kepala balai.
                            </small>
                        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const savedAvatar = localStorage.getItem('kepalabalai_avatar');
            if (savedAvatar) {
                const profileImg = document.querySelector('.profile img');
                if (profileImg) {
                    profileImg.src = savedAvatar;
                }
            }
        });
    </script>
</body>

</html>
