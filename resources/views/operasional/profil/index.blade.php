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

        html {
            overflow-y: scroll;
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
    width: 270px;
    height: 100vh;
    background: #0F3D91;
    color: white;
    padding: 14px 18px;
    overflow-y: auto;
    z-index: 1000;
}

.sidebar::-webkit-scrollbar {
    display: none;
}

.sidebar {
    -ms-overflow-style: none;
    scrollbar-width: none;
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
    font-size: 20px;
}

.logo p {
    font-size: 13px;
    opacity: .8;
    margin: 5px 0 0 0;
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

.menu li i {
    width: 20px;
    text-align: center;
    font-size: 16px;
}

        /* ================= CONTENT ================= */
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
            object-fit: cover;
        }

        .main {
            padding: 35px;
        }

        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, .06);
            margin-bottom: 22px;
        }

        .header-card .title {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .header-card .subtitle {
            color: #6b7280;
            font-size: 15px;
            margin: 0;
        }

        .card-profil {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 24px rgba(15, 61, 145, .04);
            border: 1px solid #eef2f6;
        }

        .avatar-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 35px;
        }

        .avatar-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #2563EB;
            color: white;
            font-size: 54px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.15);
        }

        .card-profil label {
            font-weight: 600;
            font-size: 14px;
            display: block;
            margin-bottom: 8px;
            color: #374151;
        }

        .card-profil .form-control {
            background: #f8fafc;
            height: 48px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            color: #64748b;
            font-weight: 500;
        }

        .footer {
            color: #6b7280;
            padding: 14px 0;
            text-align: center;
        }

        .footer hr {
            border: none;
            border-top: 1px solid rgba(0, 0, 0, .08);
            margin: 10px 0 12px;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo BSPJI">
            <h4>BSPJI</h4>
            <p>Operasional</p>
        </div>

        <ul class="menu">
            <li>
                <a href="/dashboard-operasional">
                    <i class="fas fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/operasional/review-jadwal">
                    <i class="fas fa-calendar-check"></i>
                    Review Jadwal Audit
                </a>
            </li>
            <li>
                <a href="/operasional/input-auditor">
                    <i class="fas fa-user-plus"></i>
                    Input Auditor Manual
                </a>
            </li>
            <li>
                <a href="/operasional/riwayat-review">
                    <i class="fas fa-clock-rotate-left"></i>
                    Riwayat Review
                </a>
            </li>

        <li>
            <a href="/operasional/kalender-audit">
                <i class="fas fa-calendar-days"></i>
                Kalender Audit
            </a>
        </li>
            <li>
                <a href="/operasional/profil" class="active">
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

    <!-- CONTENT -->
    <div class="content">
        <div class="navbar-custom">
            <!-- Search bar on left of navbar -->
            <input type="text" class="form-control search" placeholder="Cari...">
            
            <div class="right-menu d-flex align-items-center gap-3">
                <i class="far fa-bell fs-5 cursor-pointer"></i>
                <div class="profile">
                    <img src="{{ asset('images/logo.png') }}">
                    <span>Operasional</span>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="header-card">
                <h2 class="title" style="font-size: 26px;">Profil Saya</h2>
                <p class="subtitle" style="font-size: 14px;">Kelola informasi akun dan keamanan Anda.</p>
            </div>

            <!-- PROFILE CARD -->
            <div class="card-profil">
                <div class="avatar-container">
                    <div class="avatar-circle">
                        O
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label>NIP</label>
                        <input type="text" class="form-control" value="" placeholder="Belum diatur" readonly disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Role</label>
                        <input type="text" class="form-control" value="" placeholder="Belum diatur" readonly disabled>
                    </div>
                </div>

                <div class="text-end">
                    <a href="/operasional/profil/edit" class="btn btn-primary px-4 py-2 fw-semibold" style="border-radius: 10px;">
                        <i class="far fa-pen-to-square me-1"></i> Edit Profil
                    </a>
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
            const savedAvatar = localStorage.getItem('operasional_avatar');
            if (savedAvatar) {
                const avatarCircle = document.querySelector('.avatar-circle');
                if (avatarCircle) {
                    avatarCircle.innerHTML = `<img src="${savedAvatar}" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">`;
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
