<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Kepala Balai</title>

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
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            margin-bottom: 30px;
        }

        .avatar-large-circle {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background-color: #2563EB;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 48px;
            font-weight: bold;
            margin: 0 auto 35px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.2);
        }

        .profile-field-label {
            font-size: 13px;
            font-weight: 600;
            color: #4B5563;
            margin-bottom: 8px;
        }

        .profile-field-value {
            background-color: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 15px;
            color: #1F2937;
            font-weight: 500;
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
                <a href="/kepala-balai/grafik-penugasan">
                    <i class="fas fa-chart-column"></i>
                    Grafik Penugasan
                </a>
            </li>
            <li>
                <a href="/kepala-balai/profil" class="active">
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
                    <h2>Profil Saya</h2>
                    <p>Kelola informasi akun dan keamanan Anda.</p>
                </div>
            </div>

            <!-- ================= PROFIL INFO CARD ================= -->
            <div class="card-stat">
                <!-- Large Avatar Circle -->
                <div class="avatar-large-circle">
                    KB
                </div>

                <!-- Info Fields -->
                <div class="row g-4 mb-4">
                    <!-- NIP -->
                    <div class="col-md-6">
                        <div class="profile-field-label">NIP</div>
                        <div class="profile-field-value" id="nip-field" style="color: #94A3B8; font-style: italic;">Belum diatur</div>
                    </div>

                    <!-- Role -->
                    <div class="col-md-6">
                        <div class="profile-field-label">Role</div>
                        <div class="profile-field-value" id="role-field">Kepala Balai</div>
                    </div>
                </div>

                <!-- Edit Profile Button -->
                <div class="d-flex justify-content-end mt-4">
                    <a href="/kepala-balai/profil/edit" class="btn btn-primary d-flex align-items-center gap-2" style="border-radius: 10px; padding: 10px 20px; font-weight: 500;">
                        <i class="fas fa-user-pen"></i> Edit Profil
                    </a>
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
            // Load Avatar
            const savedAvatar = localStorage.getItem('kepalabalai_avatar');
            if (savedAvatar) {
                const avatarCircle = document.querySelector('.avatar-large-circle');
                if (avatarCircle) {
                    avatarCircle.innerHTML = `<img src="${savedAvatar}" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">`;
                }
                const profileImg = document.querySelector('.profile img');
                if (profileImg) {
                    profileImg.src = savedAvatar;
                }
            }

            // Load NIP
            const savedNip = localStorage.getItem('kepalabalai_nip');
            const nipField = document.getElementById('nip-field');
            if (savedNip && savedNip.trim() !== '') {
                nipField.textContent = savedNip;
                nipField.style.color = '#1F2937';
                nipField.style.fontStyle = 'normal';
            } else {
                nipField.textContent = 'Belum diatur';
                nipField.style.color = '#94A3B8';
                nipField.style.fontStyle = 'italic';
            }

            // Load Role
            let savedRole = localStorage.getItem('kepalabalai_role');
            if (!savedRole) {
                savedRole = 'Kepala Balai';
                localStorage.setItem('kepalabalai_role', savedRole);
            }
            const roleField = document.getElementById('role-field');
            roleField.textContent = savedRole;
        });
    </script>
</body>

</html>
