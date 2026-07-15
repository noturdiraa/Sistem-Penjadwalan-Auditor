<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Penugasan - Kepala Balai</title>

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
            margin-bottom: 30px;
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
                <a href="/kepala-balai/kalender-audit">
                    <i class="fas fa-calendar-days"></i>
                    Kalender Audit
                </a>
            </li>
            <li>
                <a href="/kepala-balai/grafik-penugasan" class="active">
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
                <div>
                    <h2>Grafik Penugasan</h2>
                    <p>Analisis visual keberangkatan, durasi hari, dan sebaran lokasi penugasan auditor</p>
                </div>
            </div>

            <!-- ================= CHARTS ROW 1 ================= -->
            <div class="row">
                <!-- Card 1: Grafik Keberangkatan Penugasan -->
                <div class="col-lg-6 mb-4">
                    <div class="card-stat h-100">
                        <h4 class="fw-bold text-dark mb-4" style="font-size: 16px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                            <span>Grafik Keberangkatan Penugasan</span>
                            <span class="badge bg-light text-secondary border" style="font-size: 11px; font-weight: 500; padding: 4px 8px; border-radius: 6px;">H1 2026</span>
                        </h4>
                        <div style="position: relative; height: 350px; width: 100%;">
                            <canvas id="keberangkatanChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Grafik Jumlah Hari -->
                <div class="col-lg-6 mb-4">
                    <div class="card-stat h-100">
                        <h4 class="fw-bold text-dark mb-4" style="font-size: 16px; display: flex; align-items: center; height: 26px;">
                            <span>Grafik Jumlah Hari Penugasan</span>
                        </h4>
                        <div style="position: relative; height: 350px; width: 100%;">
                            <canvas id="jumlahHariChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= CHARTS ROW 2 ================= -->
            <div class="row">
                <!-- Card 3: Grafik Lokasi Penugasan -->
                <div class="col-12 mb-4">
                    <div class="card-stat">
                        <h4 class="fw-bold text-dark mb-4" style="font-size: 18px;">Grafik Lokasi Penugasan</h4>
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div style="position: relative; height: 300px; width: 100%;">
                                    <canvas id="lokasiChart"></canvas>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle" style="font-size: 14px;">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Lokasi Penugasan</th>
                                                <th class="text-center">Jumlah Audit</th>
                                                <th class="text-center">Persentase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="fas fa-circle text-primary me-2" style="font-size: 10px;"></i> Dalam Kota (Palembang)</td>
                                                <td class="text-center fw-semibold">18</td>
                                                <td class="text-center text-primary fw-bold">60%</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fas fa-circle text-success me-2" style="font-size: 10px;"></i> Luar Kota (Sumsel)</td>
                                                <td class="text-center fw-semibold">9</td>
                                                <td class="text-center text-success fw-bold">30%</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fas fa-circle text-warning me-2" style="font-size: 10px;"></i> Luar Provinsi</td>
                                                <td class="text-center fw-semibold">3</td>
                                                <td class="text-center text-warning fw-bold">10%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // 1. Grafik Keberangkatan Penugasan (Horizontal Bar)
            const ctxKeberangkatan = document.getElementById('keberangkatanChart').getContext('2d');
            new Chart(ctxKeberangkatan, {
                type: 'bar',
                data: {
                    labels: ['Andi S.', 'Popy M.', 'M. Rizki', 'Rina A.', 'Budi S.', 'Yunita A.', 'Sari D.', 'Wahyu H.'],
                    datasets: [{
                        label: 'Jumlah Keberangkatan',
                        data: [22, 21, 21, 19, 19, 18, 17, 15],
                        backgroundColor: '#3B82F6',
                        borderRadius: 8,
                        barThickness: 16
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            bottom: 15
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6B7280',
                                font: {
                                    family: 'Poppins'
                                }
                            }
                        },
                        y: {
                            grid: {
                                color: '#F3F4F6'
                            },
                            ticks: {
                                color: '#1F2937',
                                font: {
                                    family: 'Poppins',
                                    weight: '500'
                                }
                            }
                        }
                    }
                }
            });

            // 2. Grafik Jumlah Hari Penugasan (Smooth Area Chart)
            const ctxJumlahHari = document.getElementById('jumlahHariChart').getContext('2d');
            const gradientBg = ctxJumlahHari.createLinearGradient(0, 0, 0, 300);
            gradientBg.addColorStop(0, 'rgba(59, 130, 246, 0.4)');
            gradientBg.addColorStop(1, 'rgba(59, 130, 246, 0.0)');

            new Chart(ctxJumlahHari, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    datasets: [
                        {
                            label: 'Jumlah Hari Kerja',
                            data: [42, 38, 48, 45, 52, 49],
                            borderColor: '#3B82F6',
                            backgroundColor: gradientBg,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 5,
                            pointBackgroundColor: '#3B82F6',
                            pointBorderColor: '#FFFFFF',
                            pointBorderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            bottom: 15
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6B7280',
                                font: {
                                    family: 'Poppins'
                                }
                            }
                        },
                        y: {
                            min: 0,
                            ticks: {
                                color: '#6B7280',
                                font: {
                                    family: 'Poppins'
                                }
                            },
                            grid: {
                                color: '#F3F4F6'
                            }
                        }
                    }
                }
            });

            // 3. Grafik Lokasi Penugasan (Doughnut Chart)
            const ctxLokasi = document.getElementById('lokasiChart').getContext('2d');
            new Chart(ctxLokasi, {
                type: 'doughnut',
                data: {
                    labels: ['Dalam Kota', 'Luar Kota', 'Luar Provinsi'],
                    datasets: [{
                        data: [60, 30, 10],
                        backgroundColor: ['#3B82F6', '#10B981', '#F59E0B'],
                        borderWidth: 2,
                        borderColor: '#FFFFFF'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
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
