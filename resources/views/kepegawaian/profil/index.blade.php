<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    
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
            width: 290px;
            height: 100vh;
            background: #0F3D91;
            padding: 18px;
            color: white;
            z-index: 1000;
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

        /* ================= CONTENT ================= */
        .content {
            margin-left: 290px;
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
            z-index: 999;
        }

        .search-box {
            width: 350px;
        }

        .search-box input {
            border-radius: 30px;
            height: 45px;
            padding: 10px 18px;
        }

        .right-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .right-menu i {
            font-size: 20px;
            cursor: pointer;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .main {
            padding: 35px;
        }

        .page-header {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .06);
            margin-bottom: 25px;
        }

        .page-header h2 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .page-header p {
            margin: 0;
            color: #6b7280;
        }

        /* ================= CARD PROFIL ================= */
        .card-profil {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .06);
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #2563EB;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 45px;
            font-weight: bold;
            color: white;
            margin: auto;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 18px;
        }

        .info label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #4b5563;
        }

        .info .form-control {
            background: #f8f9fa;
            height: 48px;
            border-radius: 12px;
        }

        .footer {
            padding: 25px;
            text-align: center;
            color: #777;
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
            <img src="{{ asset('images/logo.png') }}">
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
            <a href="/kepegawaian/riwayat-auditor">
                <i class="fas fa-clock-rotate-left"></i>
                Riwayat Auditor
            </a>
        </li>
            <li>
                <a href="/kepegawaian/profil" class="active">
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
        <!-- NAVBAR -->
        <div class="navbar-custom">
            <div class="search-box">
                <input type="text" class="form-control" placeholder="Cari...">
            </div>
            <div class="right-menu">
                <i class="far fa-bell"></i>
                <div class="profile">
                    <img src="{{ asset('images/logo.png') }}">
                    <span>Kepegawaian</span>
                </div>
            </div>
        </div>

        <!-- MAIN -->
        <div class="main">
            <!-- HEADER -->
            <div class="page-header">
                <h2>Profil Saya</h2>
                <p>Kelola informasi akun dan keamanan Anda.</p>
            </div>

            <!-- PROFILE CARD -->
            <div class="card-profil">
                <div class="avatar">
                    A
                </div>

                <div class="row">
                    <div class="col-md-6 info">
                        <label>NIP</label>
                        <input type="text" class="form-control" value="" placeholder="Belum diatur" readonly>
                    </div>
                    <div class="col-md-6 info">
                        <label>Role</label>
                        <input type="text" class="form-control" value="" placeholder="Belum diatur" readonly>
                    </div>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <hr>
            <p class="mb-0">
                © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const savedAvatar = localStorage.getItem('kepegawaian_avatar');
            if (savedAvatar) {
                const avatarCircle = document.querySelector('.avatar');
                if (avatarCircle) {
                    avatarCircle.innerHTML = `<img src="${savedAvatar}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;
                }
                const profileImg = document.querySelector('.profile img');
                if (profileImg) {
                    profileImg.src = savedAvatar;
                }
            }
        });
    </script>
</body>

</html>