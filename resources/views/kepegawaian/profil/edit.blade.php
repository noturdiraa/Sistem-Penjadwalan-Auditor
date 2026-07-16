<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    
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
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px 18px;
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
            margin-left: 270px;
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
            margin-bottom: 30px;
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
            height: 48px;
            border-radius: 12px;
        }

        .footer {
            padding: 25px;
            text-align: center;
            color: #777;
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
                <a href="/kepegawaian/profil" class="active">
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
                <h2>Edit Profil</h2>
                <p>Perbarui informasi akun Anda.</p>
            </div>

            <!-- PROFILE CARD -->
            <div class="card-profil">
                <form action="/kepegawaian/profil/update" method="POST" enctype="multipart/form-data">
                    <!-- Unggah Foto Profil -->
                    <div class="d-flex flex-column align-items-center mb-4">
                        <div class="position-relative" style="width: 120px; height: 120px;">
                            <div class="avatar m-0" id="avatarPreview">
                                A
                            </div>
                            <label for="fotoInput" class="btn btn-primary btn-sm position-absolute bottom-0 end-0 rounded-circle p-0 d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; border: 3px solid white; cursor: pointer; transform: translate(5px, 5px);">
                                <i class="fas fa-camera" style="font-size: 14px;"></i>
                            </label>
                            <input type="file" id="fotoInput" name="foto_profil" class="d-none" accept="image/*">
                        </div>
                        <small class="text-muted mt-3 mb-2">Format: JPG, PNG. Maks: 2MB</small>
                        <button type="button" class="btn btn-sm btn-outline-danger" id="btnDeletePhoto" onclick="deleteAvatar(event)" style="display: none; border-radius: 8px; height: 34px; padding: 0 16px;">
                            <i class="far fa-trash-can me-1"></i> Hapus Foto
                        </button>
                    </div>

                    <div class="row">
                        <!-- NIP -->
                        <div class="col-md-6 info">
                            <label>NIP</label>
                            <input type="text" class="form-control" name="nip" value="" placeholder="Masukkan NIP">
                        </div>
                        
                        <!-- Role -->
                        <div class="col-md-6 info">
                            <label>Role</label>
                            <input type="text" class="form-control" name="role" value="" placeholder="Belum diatur" readonly>
                        </div>
                        
                        <!-- Password Baru -->
                        <div class="col-md-6 info">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak diubah">
                        </div>
                        
                        <!-- Konfirmasi Password -->
                        <div class="col-md-6 info">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password Baru">
                        </div>
                    </div>

                    <!-- TOMBOL AKSI -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="/kepegawaian/profil" class="btn btn-secondary px-4" style="border-radius: 12px; height: 48px; display: inline-flex; align-items: center; gap: 8px;">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>

                        <button type="reset" class="btn btn-warning text-white px-4" style="border-radius: 12px; height: 48px; display: inline-flex; align-items: center; gap: 8px;">
                            <i class="fas fa-rotate-left"></i>
                            Reset
                        </button>

                        <button type="submit" class="btn btn-primary px-4" style="border-radius: 12px; height: 48px; display: inline-flex; align-items: center; gap: 8px;">
                            <i class="fas fa-floppy-disk"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
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
        const fotoInput = document.getElementById('fotoInput');
        const avatarPreview = document.getElementById('avatarPreview');

        document.addEventListener('DOMContentLoaded', function() {
            const savedAvatar = localStorage.getItem('kepegawaian_avatar');
            if (savedAvatar) {
                avatarPreview.innerHTML = `<img src="${savedAvatar}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;
                const profileImg = document.querySelector('.profile img');
                if (profileImg) {
                    profileImg.src = savedAvatar;
                }
                const btnDelete = document.getElementById('btnDeletePhoto');
                if (btnDelete) {
                    btnDelete.style.display = 'inline-block';
                }
            }
        });

        fotoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatarData = e.target.result;
                    localStorage.setItem('kepegawaian_avatar', avatarData);
                    avatarPreview.innerHTML = `<img src="${avatarData}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;
                    const profileImg = document.querySelector('.profile img');
                    if (profileImg) {
                        profileImg.src = avatarData;
                    }
                    const btnDelete = document.getElementById('btnDeletePhoto');
                    if (btnDelete) {
                        btnDelete.style.display = 'inline-block';
                    }
                }
                reader.readAsDataURL(file);
            }
        });

        function deleteAvatar(event) {
            event.stopPropagation();
            localStorage.removeItem('kepegawaian_avatar');
            avatarPreview.innerHTML = 'A';
            const profileImg = document.querySelector('.profile img');
            if (profileImg) {
                profileImg.src = "{{ asset('images/logo.png') }}";
            }
            const btnDelete = document.getElementById('btnDeletePhoto');
            if (btnDelete) {
                btnDelete.style.display = 'none';
            }
            fotoInput.value = '';
        }

        // Reset preview saat form di-reset
        document.querySelector('form').addEventListener('reset', function() {
            setTimeout(() => {
                const savedAvatar = localStorage.getItem('kepegawaian_avatar');
                if (savedAvatar) {
                    avatarPreview.innerHTML = `<img src="${savedAvatar}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;
                } else {
                    avatarPreview.innerHTML = 'A';
                }
            }, 50);
        });
    </script>
</body>

</html>