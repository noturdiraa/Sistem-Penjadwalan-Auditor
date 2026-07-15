<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Audit - Kepala Balai</title>

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

        .card-stat {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            transition: .3s;
        }

        /* Calendar Layout Styles */
        .calendar-header-row {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .calendar-header-row div {
            font-size: 14px;
        }

        .calendar-days-row {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px 10px;
        }

        .calendar-day-cell {
            aspect-ratio: 1.2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 12px;
            font-weight: 500;
            color: #1F2937;
            cursor: pointer;
            position: relative;
            background: transparent;
            border: 1px solid transparent;
            font-size: 15px;
            transition: .2s;
        }

        .calendar-day-cell:hover {
            background-color: #F1F5F9;
        }

        .calendar-day-cell.other-month {
            color: #D1D5DB;
            cursor: default;
        }

        .calendar-day-cell.other-month:hover {
            background: transparent;
        }

        .calendar-day-cell.has-audit {
            background-color: #EFF6FF;
            color: #1E40AF;
            font-weight: 600;
        }

        .calendar-day-cell.has-audit::after {
            content: '';
            position: absolute;
            bottom: 6px;
            left: 20%;
            right: 20%;
            height: 3px;
            background-color: #8B5CF6;
            border-radius: 99px;
        }

        .calendar-day-cell.active-selected {
            border-color: #3B82F6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }

        .audit-detail-item {
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 12px;
            text-align: left;
        }

        .audit-detail-item:last-child {
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
                <a href="/kepala-balai/monitoring">
                    <i class="fas fa-chart-line"></i>
                    Monitoring
                </a>
            </li>
            <li>
                <a href="/kepala-balai/kalender-audit" class="active">
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
                <h2>Kalender Audit</h2>
                <p>Jadwal seluruh kegiatan audit berdasarkan tanggal</p>
            </div>

            <!-- ================= CALENDAR WIDGET ================= -->
            <div class="row">
                <!-- Calendar Panel -->
                <div class="col-lg-8 mb-4">
                    <div class="card-stat p-4 h-100">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold text-dark mb-0" id="monthYearTitle" style="font-size: 20px;">Juli 2026</h3>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-circle border d-flex align-items-center justify-content-center" id="prevMonthBtn" style="width: 38px; height: 38px;"><i class="fas fa-chevron-left"></i></button>
                                <button class="btn btn-light rounded-circle border d-flex align-items-center justify-content-center" id="nextMonthBtn" style="width: 38px; height: 38px;"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>

                        <!-- Calendar Grid -->
                        <div class="calendar-grid">
                            <!-- Day Headers -->
                            <div class="calendar-header-row mb-3">
                                <div class="text-center text-secondary fw-semibold">Min</div>
                                <div class="text-center text-secondary fw-semibold">Sen</div>
                                <div class="text-center text-secondary fw-semibold">Sel</div>
                                <div class="text-center text-secondary fw-semibold">Rab</div>
                                <div class="text-center text-secondary fw-semibold">Kam</div>
                                <div class="text-center text-secondary fw-semibold">Jum</div>
                                <div class="text-center text-secondary fw-semibold">Sab</div>
                            </div>

                            <!-- Calendar Days -->
                            <div class="calendar-days-row">
                                <!-- Days will be generated by JS -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Panel -->
                <div class="col-lg-4 mb-4">
                    <div class="card-stat p-4 h-100" id="calendarDetailCard" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
                        <!-- Default Empty State -->
                        <div id="emptyDetailState">
                            <div class="text-secondary mb-3">
                                <i class="far fa-calendar-alt fa-3x opacity-50"></i>
                            </div>
                            <p class="text-secondary fw-semibold mb-0" style="font-size: 14px;">Pilih tanggal yang memiliki jadwal audit untuk melihat detail</p>
                        </div>
                        <!-- Dynamic Content (hidden initially) -->
                        <div id="activeDetailState" class="w-100 text-start d-none">
                            <div class="border-bottom pb-3 mb-3">
                                <h5 class="fw-bold text-dark mb-1" id="detailDateText">-</h5>
                                <span class="badge bg-primary-subtle text-primary" id="detailCountBadge">1 Jadwal Audit</span>
                            </div>
                            <div id="detailListContainer"></div>
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
        // Data Jadwal Audit (Key format: YYYY-MM-DD)
        const audits = {
            "2026-07-03": [
                {
                    perusahaan: "PT Maju Jaya",
                    ruang_lingkup: "LSPRO",
                    waktu: "08:00 - 16:00 WIB",
                    auditor: "Popy Marlina, Andi Saputra"
                }
            ],
            "2026-07-07": [
                {
                    perusahaan: "PT ABC Indonesia",
                    ruang_lingkup: "LSSM",
                    waktu: "08:00 - 16:00 WIB",
                    auditor: "Popy Marlina, Andi Saputra"
                }
            ],
            "2026-07-10": [
                {
                    perusahaan: "PT ABC Indonesia",
                    ruang_lingkup: "LSSM",
                    waktu: "08:00 - 16:00 WIB",
                    auditor: "Popy Marlina, Andi Saputra"
                }
            ],
            "2026-07-14": [
                {
                    perusahaan: "PT ABC Indonesia",
                    ruang_lingkup: "LSSM",
                    waktu: "08:00 - 16:00 WIB",
                    auditor: "Popy Marlina, Andi Saputra"
                }
            ],
            "2026-07-17": [
                {
                    perusahaan: "CV XYZ Palembang",
                    ruang_lingkup: "LSSM",
                    waktu: "08:00 - 16:00 WIB",
                    auditor: "Muhammad Rizki, Andi Saputra"
                }
            ],
            "2026-07-21": [
                {
                    perusahaan: "CV XYZ Palembang",
                    ruang_lingkup: "LSSM",
                    waktu: "08:00 - 16:00 WIB",
                    auditor: "Muhammad Rizki, Andi Saputra"
                }
            ],
            "2026-07-25": [
                {
                    perusahaan: "CV XYZ Palembang",
                    ruang_lingkup: "LSSM",
                    waktu: "08:00 - 16:00 WIB",
                    auditor: "Muhammad Rizki, Andi Saputra"
                }
            ]
        };

        let currentYear = 2026;
        let currentMonth = 6; // Juli (0-indexed)

        const monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        document.addEventListener('DOMContentLoaded', function() {
            renderCalendar();
            
            document.getElementById('prevMonthBtn').addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                renderCalendar();
            });

            document.getElementById('nextMonthBtn').addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                renderCalendar();
            });
        });

        function renderCalendar() {
            document.getElementById('monthYearTitle').innerText = `${monthNames[currentMonth]} ${currentYear}`;

            const grid = document.querySelector('.calendar-days-row');
            grid.innerHTML = '';

            const firstDayIndex = new Date(currentYear, currentMonth, 1).getDay(); // 0 = Sun, 1 = Mon, etc.
            const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();
            const prevTotalDays = new Date(currentYear, currentMonth, 0).getDate();

            let html = '';

            // Render prev month days
            for (let i = firstDayIndex - 1; i >= 0; i--) {
                const prevDay = prevTotalDays - i;
                html += `
                    <div class="calendar-day-cell other-month">
                        ${prevDay}
                    </div>
                `;
            }

            // Render current month days
            for (let day = 1; day <= totalDays; day++) {
                const yyyy = currentYear;
                const mm = String(currentMonth + 1).padStart(2, '0');
                const dd = String(day).padStart(2, '0');
                const dateKey = `${yyyy}-${mm}-${dd}`;

                let classes = 'calendar-day-cell';
                if (audits[dateKey]) {
                    classes += ' has-audit';
                }

                html += `
                    <div class="${classes}" onclick="selectDay(this, '${dateKey}', ${day})">
                        ${day}
                    </div>
                `;
            }

            // Render next month days to complete 42 cells (6 rows * 7 columns)
            const totalCells = firstDayIndex + totalDays;
            const remainingCells = 42 - totalCells;
            for (let i = 1; i <= remainingCells; i++) {
                html += `
                    <div class="calendar-day-cell other-month">
                        ${i}
                    </div>
                `;
            }

            grid.innerHTML = html;
            resetDetailPanel();
        }

        function resetDetailPanel() {
            const emptyState = document.getElementById('emptyDetailState');
            const activeState = document.getElementById('activeDetailState');
            emptyState.classList.remove('d-none');
            activeState.classList.add('d-none');

            const detailCard = document.getElementById('calendarDetailCard');
            detailCard.style.justifyContent = 'center';
            detailCard.style.alignItems = 'center';
        }

        function selectDay(element, dateKey, day) {
            document.querySelectorAll('.calendar-day-cell').forEach(el => {
                el.classList.remove('active-selected');
            });

            element.classList.add('active-selected');

            const emptyState = document.getElementById('emptyDetailState');
            const activeState = document.getElementById('activeDetailState');
            const dateText = document.getElementById('detailDateText');
            const countBadge = document.getElementById('detailCountBadge');
            const container = document.getElementById('detailListContainer');

            if (audits[dateKey]) {
                emptyState.classList.add('d-none');
                activeState.classList.remove('d-none');

                const detailCard = document.getElementById('calendarDetailCard');
                detailCard.style.justifyContent = 'flex-start';
                detailCard.style.alignItems = 'stretch';

                dateText.innerText = `${day} ${monthNames[currentMonth]} ${currentYear}`;
                countBadge.innerText = `${audits[dateKey].length} Jadwal Audit`;

                let html = '';
                audits[dateKey].forEach(a => {
                    html += `
                        <div class="audit-detail-item">
                            <h6 class="fw-bold text-dark mb-2" style="font-size: 15px;">${a.perusahaan}</h6>
                            <div class="mb-2">
                                <span class="badge bg-primary-subtle text-primary" style="font-size: 11px; padding: 4px 8px; border-radius: 6px;">${a.ruang_lingkup}</span>
                            </div>
                            <div class="small text-secondary mb-1">
                                <i class="far fa-clock me-1"></i> ${a.waktu}
                            </div>
                            <div class="small text-secondary">
                                <i class="far fa-user me-1"></i> Auditor: ${a.auditor}
                            </div>
                        </div>
                    `;
                });
                container.innerHTML = html;
            } else {
                resetDetailPanel();
            }
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