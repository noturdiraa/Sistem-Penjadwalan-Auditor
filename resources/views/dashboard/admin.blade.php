<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
            margin-bottom: 25px;
        }

        .logo img {
            width: 70px;
            margin-bottom: 10px;
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
            padding: 12px 14px;
            font-size: 15px;
            transition: .3s;
        }

        .menu li a:hover,
        .menu li a.active {
            background: #2563EB;
        }

        /* ================= CONTENT ================= */
        .content {
            margin-left: 270px;
            padding: 30px;
            min-height: 100vh;
        }

        /* ================= NAVBAR ================= */
        .navbar-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 15px 25px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
            margin-bottom: 30px;
        }

        .navbar-custom .search {
            width: 300px;
            border-radius: 20px;
            border: 1px solid #E2E8F0;
            padding: 8px 15px;
            font-size: 14px;
            background-color: #F8FAFC;
        }

        .navbar-custom .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-custom .profile img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .navbar-custom .profile span {
            font-weight: 600;
            font-size: 14px;
            color: #334155;
        }

        /* ================= HEADER CARD ================= */
        .header-card {
            background: linear-gradient(135deg, #0F3D91 0%, #1E40AF 100%);
            color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(15, 61, 145, 0.15);
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .header-card h2 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .header-card p {
            font-size: 14px;
            opacity: .9;
            margin-bottom: 0;
            max-width: 600px;
        }

        /* ================= STATS CARDS ================= */
        .card-stat {
            background: white;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .05);
            transition: .3s;
            border: none;
            height: 100%;
        }

        .card-stat:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: white;
        }

        .bg-blue { background: #2563EB; }
        .bg-green { background: #10B981; }
        .bg-orange { background: #F59E0B; }
        .bg-red { background: #EF4444; }
        .bg-purple { background: #8B5CF6; }

        /* ================= PANELS ================= */
        .panel-box {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .05);
            margin-bottom: 30px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .panel-header h4 {
            font-weight: 700;
            color: #1E293B;
            margin: 0;
        }

        .table-custom th {
            font-weight: 600;
            color: #64748B;
            border-bottom: 2px solid #F1F5F9;
            padding: 12px 16px;
            font-size: 13px;
        }

        .table-custom td {
            padding: 16px;
            border-bottom: 1px solid #F1F5F9;
            color: #334155;
            font-size: 14px;
        }

        .table-custom tr:last-child td {
            border-bottom: none;
        }

        .badge-role {
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 8px;
        }

        .role-admin { background: #DBEAFE; color: #1D4ED8; }
        .role-kepegawaian { background: #FEE2E2; color: #9B1C1C; }
        .role-pji { background: #FEF3C7; color: #D97706; }
        .role-kepala { background: #E0F2FE; color: #0369A1; }
        .role-operasional { background: #D1FAE5; color: #065F46; }

        .footer {
            color: #6b7280;
            padding: 14px 0;
            text-align: center;
        }

        .footer hr {
            border: none;
            border-top: 1px solid rgba(0,0,0,.08);
            margin: 10px 0 12px;
        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR ================= -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo BSPJI">
            <h4>BSPJI</h4>
            <p>Administrator</p>
        </div>

        <ul class="menu">
            <li>
                <a href="{{ route('dashboard.admin') }}" class="active">
                    <i class="fas fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users-cog"></i>
                    Manajemen User
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; display: flex; align-items: center; gap: 15px; width: 100%; padding: 12px 14px; font-size: 15px; line-height: 1.1; text-align: left;">
                        <i class="fas fa-right-from-bracket"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- ================= CONTENT ================= -->
    <div class="content">
        <!-- NAVBAR -->
        <div class="navbar-custom">
            <input type="text" class="form-control search" placeholder="Cari...">
            <div class="profile">
                <img src="{{ asset('images/logo.png') }}" alt="Admin Profile">
                <span>Administrator</span>
            </div>
        </div>

        <!-- HEADER CARD -->
        <div class="header-card">
            <h2>Selamat Datang, Admin!</h2>
            <p>Kelola akun pengguna, atur hak akses, dan pantau aktivitas pengguna di Sistem Penjadwalan Auditor BSPJI Palembang.</p>
        </div>

        <!-- STATS CARDS -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card-stat">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1 text-dark">{{ $totalUsers }}</h3>
                            <small class="text-secondary">Total Pengguna</small>
                        </div>
                        <div class="icon-box bg-blue">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            @php
                $roles = ['Admin', 'Kepegawaian', 'PJI', 'Kepala Balai', 'Operasional'];
                $bgColors = ['bg-purple', 'bg-red', 'bg-orange', 'bg-blue', 'bg-green'];
                $icons = ['fa-user-shield', 'fa-user-tie', 'fa-file-signature', 'fa-user-check', 'fa-cogs'];
            @endphp

            @foreach($roles as $index => $roleName)
                @php
                    $count = $usersPerRole->firstWhere('role', $roleName)->count ?? 0;
                    if ($roleName === 'Kepala Balai') {
                        // DB check case insensitivity
                        $count = $usersPerRole->filter(fn($u) => strtolower($u->role) === 'kepala balai')->first()->count ?? 0;
                    }
                @endphp
                <div class="col-md-3">
                    <div class="card-stat">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1 text-dark">{{ $count }}</h3>
                                <small class="text-secondary">User {{ $roleName }}</small>
                            </div>
                            <div class="icon-box {{ $bgColors[$index] }}">
                                <i class="fas {{ $icons[$index] }}"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- LATEST USERS PANEL -->
        <div class="panel-box">
            <div class="panel-header">
                <h4>Pengguna Terdaftar</h4>
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm px-3" style="border-radius: 8px;">Kelola Semua User</a>
            </div>
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-start">Username</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $latestUsers = \App\Models\User::orderBy('created_at', 'desc')->take(5)->get();
                        @endphp
                        @if($latestUsers->count() > 0)
                            @foreach($latestUsers as $user)
                                @php
                                    $roleClass = 'role-admin';
                                    $roleText = $user->role;
                                    $lowRole = strtolower($user->role);
                                    if ($lowRole === 'kepegawaian') {
                                        $roleClass = 'role-kepegawaian';
                                    } elseif ($lowRole === 'pji') {
                                        $roleClass = 'role-pji';
                                    } elseif ($lowRole === 'kepala balai') {
                                        $roleClass = 'role-kepala';
                                        $roleText = 'Kepala Balai';
                                    } elseif ($lowRole === 'operasional') {
                                        $roleClass = 'role-operasional';
                                    }
                                @endphp
                                <tr>
                                    <td class="text-start fw-semibold">{{ $user->username }}</td>
                                    <td class="text-center">
                                        <span class="badge-role {{ $roleClass }}">{{ $roleText }}</span>
                                    </td>
                                    <td class="text-center text-secondary">{{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-4">Belum ada user yang terdaftar.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer mt-4">
            <hr>
            <p class="mb-0">
                © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
