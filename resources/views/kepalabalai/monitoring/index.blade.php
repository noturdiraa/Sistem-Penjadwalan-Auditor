<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Audit - Kepala Balai</title>

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

        .search {
            width: 350px;
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

        .card-stat {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            transition: .3s;
            min-height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-stat:hover {
            transform: translateY(-3px);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: white;
        }

        .bg-green {
            background: #10B981;
        }

        .bg-orange {
            background: #F59E0B;
        }

        .table-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            margin-top: 25px;
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
            box-shadow: none;
        }

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
                <h2>Monitoring Audit</h2>
                <p>Pantau perkembangan audit yang sedang berjalan dan yang telah selesai secara real-time</p>
            </div>

            <!-- ================= CARD STATISTIK ================= -->
            <div class="row">
                <!-- Audit Berjalan -->
                <div class="col-lg-6 mb-4">
                    <div class="card-stat p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="fw-bold mb-1" style="font-size: 32px;">2</h2>
                                <span class="text-secondary" style="font-size: 14px;">Audit Berjalan</span>
                            </div>
                            <div class="icon-box bg-orange">
                                <i class="fas fa-spinner"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Audit Selesai -->
                <div class="col-lg-6 mb-4">
                    <div class="card-stat p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="fw-bold mb-1" style="font-size: 32px;">1</h2>
                                <span class="text-secondary" style="font-size: 14px;">Audit Selesai</span>
                            </div>
                            <div class="icon-box bg-green">
                                <i class="fas fa-circle-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= TABLE CARD ================= -->
            <div class="table-card">
                <!-- Tabs Filter -->
                <div class="d-flex gap-2 mb-4 border-bottom pb-3">
                    <button class="btn btn-primary px-4 py-2 filter-tab active" onclick="filterCategory('berjalan')" id="tabBerjalan" style="border-radius: 8px; font-size: 14px;">
                        <i class="fas fa-spinner me-2"></i>Audit Berjalan (2)
                    </button>
                    <button class="btn btn-outline-secondary px-4 py-2 filter-tab" onclick="filterCategory('selesai')" id="tabSelesai" style="border-radius: 8px; font-size: 14px; border-color: #E2E8F0; color: #4B5563;">
                        <i class="fas fa-circle-check me-2"></i>Audit Selesai (1)
                    </button>
                </div>

                <!-- Search Input -->
                <div class="mb-4">
                    <input type="text" class="form-control table-search-input" onkeyup="searchTable()" placeholder="🔍 Cari nama perusahaan atau ketua tim...">
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Perusahaan</th>
                                <th>Ruang Lingkup</th>
                                <th>Periode</th>
                                <th>Ketua Tim</th>
                                <th>Status</th>
                                <th width="100" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="monitoringTableBody">
                            <!-- Will be rendered dynamically via JavaScript -->
                        </tbody>
                    </table>
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
        // Data Monitoring Audit
        const monitoringData = [
            {
                perusahaan: "PT ABC Indonesia",
                ruang_lingkup: "LSSM",
                periode: "25 Jun 2026 – 30 Jun 2026",
                ketua_tim: "Popy Marlina",
                status: "berjalan"
            },
            {
                perusahaan: "CV XYZ Palembang",
                ruang_lingkup: "LSSM",
                periode: "28 Jun 2026 – 02 Jul 2026",
                ketua_tim: "Muhammad Rizki",
                status: "berjalan"
            },
            {
                perusahaan: "PT Maju Jaya",
                ruang_lingkup: "LSPRO",
                periode: "15 Jun 2026 – 20 Jun 2026",
                ketua_tim: "Popy Marlina",
                status: "selesai"
            }
        ];

        let currentCategory = "berjalan";

        document.addEventListener('DOMContentLoaded', function() {
            renderTable();
        });

        function filterCategory(category) {
            currentCategory = category;
            
            const tabBerjalan = document.getElementById('tabBerjalan');
            const tabSelesai = document.getElementById('tabSelesai');
            
            if (category === 'berjalan') {
                tabBerjalan.className = 'btn btn-primary px-4 py-2 filter-tab active';
                tabSelesai.className = 'btn btn-outline-secondary px-4 py-2 filter-tab';
                // Reset styling to look secondary
                tabSelesai.style.color = '#4B5563';
                tabSelesai.style.borderColor = '#E2E8F0';
                tabSelesai.style.backgroundColor = 'transparent';
            } else {
                tabSelesai.className = 'btn btn-primary px-4 py-2 filter-tab active';
                tabBerjalan.className = 'btn btn-outline-secondary px-4 py-2 filter-tab';
                // Reset styling to look secondary
                tabBerjalan.style.color = '#4B5563';
                tabBerjalan.style.borderColor = '#E2E8F0';
                tabBerjalan.style.backgroundColor = 'transparent';
            }
            
            renderTable();
        }

        function renderTable() {
            const tbody = document.getElementById('monitoringTableBody');
            const searchVal = document.querySelector(".table-search-input").value.toLowerCase().trim();

            const filtered = monitoringData.filter(item => {
                const matchCategory = item.status === currentCategory;
                const matchSearch = item.perusahaan.toLowerCase().includes(searchVal) || item.ketua_tim.toLowerCase().includes(searchVal);
                return matchCategory && matchSearch;
            });

            if (filtered.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-5 text-secondary" style="font-size: 14px;">
                            <i class="fas fa-info-circle fa-2x mb-3 d-block text-secondary"></i>
                            <span>Tidak ada data monitoring ditemukan.</span>
                        </td>
                    </tr>
                `;
                return;
            }

            let html = '';
            filtered.forEach(item => {
                // Generate initials for avatar
                const initials = item.ketua_tim.split(' ').map(n => n[0]).join('');

                let statusBadge = '';
                if (item.status === 'berjalan') {
                    statusBadge = '<span class="badge bg-warning-subtle text-warning" style="padding: 6px 12px; border-radius: 8px; font-weight: 600;">Audit Berjalan</span>';
                } else {
                    statusBadge = '<span class="badge bg-success-subtle text-success" style="padding: 6px 12px; border-radius: 8px; font-weight: 600;">Audit Selesai</span>';
                }

                html += `
                    <tr>
                        <td class="fw-semibold">${item.perusahaan}</td>
                        <td>
                            <span class="badge bg-primary-subtle text-primary" style="padding: 6px 12px; border-radius: 8px;">
                                ${item.ruang_lingkup}
                            </span>
                        </td>
                        <td>
                            <i class="far fa-calendar-alt text-secondary me-2"></i>${item.periode}
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar bg-avatar-blue d-inline-flex justify-content-center align-items-center rounded-circle text-white fw-bold" style="width: 32px; height: 32px; font-size: 12px; background-color: #3b82f6;">
                                    ${initials}
                                </div>
                                <span>${item.ketua_tim}</span>
                            </div>
                        </td>
                        <td>${statusBadge}</td>
                        <td class="text-center">
                            <a href="/kepala-balai/monitoring/detail" class="btn btn-outline-primary p-0 d-flex align-items-center justify-content-center mx-auto" style="width: 32px; height: 32px; border-radius: 8px;" title="Lihat Detail">
                                <i class="far fa-eye" style="font-size: 14px;"></i>
                            </a>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        function searchTable() {
            renderTable();
        }
    </script>
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
