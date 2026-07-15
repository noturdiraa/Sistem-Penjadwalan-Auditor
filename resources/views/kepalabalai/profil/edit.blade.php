<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Kepala Balai</title>

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

        .avatar-edit-container {
            position: relative;
            width: 130px;
            height: 130px;
            margin: 0 auto 10px;
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
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.2);
        }

        .avatar-upload-badge {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background-color: #2563EB;
            border: 2px solid white;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .profile-field-label {
            font-size: 13px;
            font-weight: 600;
            color: #4B5563;
            margin-bottom: 8px;
        }

        .form-control-custom {
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 15px;
            color: #1F2937;
            font-weight: 500;
            background-color: white;
        }

        .form-control-custom:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .form-control-custom:disabled {
            background-color: #F8FAFC;
            color: #6B7280;
            cursor: not-allowed;
        }

        .btn-custom {
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 10px;
            font-size: 15px;
        }

        .btn-kembali {
            background-color: #64748B;
            color: white;
            border: none;
        }

        .btn-kembali:hover {
            background-color: #475569;
            color: white;
        }

        .btn-reset {
            background-color: #EAB308;
            color: white;
            border: none;
        }

        .btn-reset:hover {
            background-color: #CA8A04;
            color: white;
        }

        .btn-simpan {
            background-color: #2563EB;
            color: white;
            border: none;
        }

        .btn-simpan:hover {
            background-color: #1D4ED8;
            color: white;
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
                    <h2>Profil Saya</h2>
                    <p>Kelola informasi akun dan keamanan Anda.</p>
                </div>
            </div>

            <!-- ================= PROFIL INFO CARD ================= -->
            <div class="card-stat">
                <form action="/kepala-balai/profil" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Avatar Upload Section -->
                    <div class="text-center mb-4">
                        <div class="avatar-edit-container">
                            <div class="avatar-large-circle" id="avatar-preview">
                                KB
                            </div>
                            <label for="avatar-file-input" class="avatar-upload-badge">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" id="avatar-file-input" name="avatar" style="display: none;" accept="image/*">
                        </div>
                        <p class="text-secondary mb-0" style="font-size: 12px;">Format: JPG, PNG. Maks: 2MB</p>
                        
                        <!-- Hapus Foto Button -->
                        <div id="delete-avatar-btn-container" style="display: none;">
                            <button type="button" id="btn-delete-avatar" class="btn btn-sm btn-link text-danger mt-2" style="font-size: 13px; text-decoration: none;">
                                <i class="fas fa-trash-can"></i> Hapus Foto
                            </button>
                        </div>
                        <input type="hidden" name="delete_avatar" id="delete-avatar-input" value="0">
                    </div>

                    <!-- Input Fields -->
                    <div class="row g-4 mb-4">
                        <!-- NIP -->
                        <div class="col-md-6">
                            <div class="profile-field-label">NIP</div>
                            <input type="text" class="form-control form-control-custom" name="nip" value="" placeholder="Masukkan NIP">
                        </div>

                        <!-- Role -->
                        <div class="col-md-6">
                            <div class="profile-field-label">Role</div>
                            <input type="text" class="form-control form-control-custom" name="role" value="" placeholder="Masukkan Role">
                        </div>

                        <!-- Password Baru -->
                        <div class="col-md-6">
                            <div class="profile-field-label">Password Baru</div>
                            <input type="password" class="form-control form-control-custom" name="password" placeholder="Kosongkan jika tidak diubah">
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="col-md-6">
                            <div class="profile-field-label">Konfirmasi Password</div>
                            <input type="password" class="form-control form-control-custom" name="password_confirmation" placeholder="Ulangi Password Baru">
                        </div>
                    </div>

                    <!-- Form Buttons -->
                    <div class="row mt-4 align-items-center">
                        <div class="col-6">
                            <a href="/kepala-balai/profil" class="btn btn-custom btn-kembali d-inline-flex align-items-center gap-2">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="col-6 text-end">
                            <button type="reset" class="btn btn-custom btn-reset me-2">
                                <i class="fas fa-rotate-right"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-custom btn-simpan">
                                <i class="fas fa-floppy-disk"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
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
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('avatar-file-input');
            const previewDiv = document.getElementById('avatar-preview');
            const deleteBtnContainer = document.getElementById('delete-avatar-btn-container');
            const deleteInput = document.getElementById('delete-avatar-input');
            const btnDelete = document.getElementById('btn-delete-avatar');

            // Default initials
            const defaultInitials = 'KB';
            let tempAvatarData = null;

            // Load Avatar
            const savedAvatar = localStorage.getItem('kepalabalai_avatar');
            if (savedAvatar) {
                previewDiv.innerHTML = '<img src="' + savedAvatar + '" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">';
                deleteBtnContainer.style.display = 'block';
                const profileImg = document.querySelector('.profile img');
                if (profileImg) {
                    profileImg.src = savedAvatar;
                }
            }

            // Load NIP
            const savedNip = localStorage.getItem('kepalabalai_nip');
            if (savedNip) {
                document.querySelector('input[name="nip"]').value = savedNip;
            }

            // Load Role
            let savedRole = localStorage.getItem('kepalabalai_role');
            if (!savedRole) {
                savedRole = 'Kepala Balai';
                localStorage.setItem('kepalabalai_role', savedRole);
            }
            document.querySelector('input[name="role"]').value = savedRole;

            fileInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const avatarData = e.target.result;
                        previewDiv.innerHTML = '<img src="' + avatarData + '" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">';
                        deleteBtnContainer.style.display = 'block';
                        deleteInput.value = '0';
                        tempAvatarData = avatarData;
                    };
                    reader.readAsDataURL(file);
                }
            });

            btnDelete.addEventListener('click', function () {
                // Clear file input
                fileInput.value = '';
                // Set initials
                previewDiv.innerHTML = defaultInitials;
                // Hide delete button
                deleteBtnContainer.style.display = 'none';
                // Set delete avatar input to 1
                deleteInput.value = '1';
                tempAvatarData = null;
            });

            // Form Submit Handler
            const form = document.querySelector('form');
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Save NIP
                const nipValue = document.querySelector('input[name="nip"]').value;
                localStorage.setItem('kepalabalai_nip', nipValue);

                // Save Role
                const roleValue = document.querySelector('input[name="role"]').value;
                localStorage.setItem('kepalabalai_role', roleValue);

                // Save Avatar if a new file was read or delete it if deleted
                if (deleteInput.value === '1') {
                    localStorage.removeItem('kepalabalai_avatar');
                } else if (tempAvatarData) {
                    localStorage.setItem('kepalabalai_avatar', tempAvatarData);
                }

                alert('Sukses! Perubahan profil Anda berhasil disimpan.');
                window.location.href = '/kepala-balai/profil';
            });

            // Form Reset Handler
            document.querySelector('button[type="reset"]').addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector('input[name="nip"]').value = '';
                document.querySelector('input[name="role"]').value = 'Kepala Balai';
                document.querySelector('input[name="password"]').value = '';
                document.querySelector('input[name="password_confirmation"]').value = '';
            });
        });
    </script>
</body>

</html>