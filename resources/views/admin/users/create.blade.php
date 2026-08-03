<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User - Admin</title>
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

        /* ================= FORM BOX ================= */
        .form-box {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .05);
            margin-bottom: 30px;
        }

        .form-title {
            font-weight: 700;
            color: #1E293B;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 13.5px;
            color: #64748B;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            font-size: 13.5px;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border: 1px solid #CBD5E1;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14.5px;
            transition: .2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        .btn-submit {
            height: 46px;
            border-radius: 10px;
            font-weight: 600;
            padding: 0 25px;
        }

        .btn-cancel {
            height: 46px;
            border-radius: 10px;
            font-weight: 600;
            padding: 0 25px;
            background-color: #E2E8F0;
            color: #475569;
            border: none;
            transition: .2s;
        }

        .btn-cancel:hover {
            background-color: #CBD5E1;
            color: #334155;
        }

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

        .toggle-password i {
            transition: color 0.2s, transform 0.2s;
        }

        .toggle-password:hover i {
            color: #2563EB;
            transform: scale(1.15);
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
                <a href="{{ route('dashboard.admin') }}">
                    <i class="fas fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="active">
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

        <!-- FORM CONTAINER -->
        <div class="form-box">
            <h3 class="form-title">Tambah User</h3>
            <p class="form-subtitle">SISTEM PENJADWALAN AUDITOR BSPJI PALEMBANG</p>

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf


                <!-- Username -->
                <div class="mb-4 text-start">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username unik..." required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4 text-start">
                    <label for="password" class="form-label">Password</label>
                    <div class="position-relative">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password..." required style="padding-right: 45px;">
                        <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent text-secondary toggle-password" type="button" data-target="password" style="z-index: 10;">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-4 text-start">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <div class="position-relative">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password..." required style="padding-right: 45px;">
                        <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent text-secondary toggle-password" type="button" data-target="password_confirmation" style="z-index: 10;">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <!-- Role aktif -->
                <div class="mb-5 text-start">
                    <label for="role" class="form-label">Role Aktif</label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                        <option value="" disabled selected>Pilih salah satu role aktif...</option>
                        <option value="Admin" {{ old('role') === 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Kepegawaian" {{ old('role') === 'Kepegawaian' ? 'selected' : '' }}>Kepegawaian</option>
                        <option value="PJI" {{ old('role') === 'PJI' ? 'selected' : '' }}>PJI</option>
                        <option value="Kepala Balai" {{ old('role') === 'Kepala Balai' ? 'selected' : '' }}>Kepala Balai</option>
                        <option value="Operasional" {{ old('role') === 'Operasional' ? 'selected' : '' }}>Operasional</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="d-flex gap-3 justify-content-start">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-cancel d-inline-flex align-items-center gap-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-submit px-4">
                        <i class="fas fa-circle-check me-2"></i> Simpan User
                    </button>
                </div>

            </form>
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
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });
        });
    </script>
</body>

</html>
