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
            background: #f4f7fc; /* Warna background disamakan dengan Dashboard PJI */
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 270px;
            height: 100vh;
            background: #0F3D91; /* Warna background disamakan dengan Dashboard PJI (#0F3D91) */
            color: white;
            padding: 14px 18px; /* Padding disamakan dengan Dashboard PJI */
            overflow-y: auto; /* Aktifkan scroll di samping sidebar jika menu melebihi tinggi layar */
            z-index: 1000;
        }

        /* Styling scrollbar untuk sidebar agar terlihat minimalis dan modern */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        .logo {
            text-align: center;
            margin-bottom: 18px; /* Margin-bottom disamakan */
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
            padding: 0; /* Padding disamakan dengan Dashboard PJI (0) agar menu tidak menciut ke tengah */
        }

        .menu li {
            margin-bottom: 10px; /* Margin-bottom disamakan */
        }

        .menu li a {
            display: flex;
            align-items: center;
            gap: 15px;
            border-radius: 12px;
            color: white;
            text-decoration: none;
            white-space: normal;
            padding: 10px 12px; /* Padding menu disamakan */
            font-size: 15px;
            line-height: 1.1;
            transition: none; /* Menghapus transisi agar menu tetap diam dan tidak bergerak saat diklik/hover */
        }

        .menu li a i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .menu li a:hover,
        .menu li a.active {
            background: #2563EB;
        }

        /* ================= CONTENT ================= */
        .content {
            margin-left: 270px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            height: 80px; /* Tinggi navbar disamakan dengan Dashboard PJI (80px) */
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05); /* Shadow disamakan */
        }

        .search {
            width: 350px; /* Lebar kotak cari disamakan dengan Dashboard PJI (350px) */
            transition: none; /* Menghapus transisi */
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px; /* Jarak profil disamakan persis (15px) */
        }

        .profile .bell-icon {
            color: #1F2937;
            font-size: 20px;
            cursor: pointer;
        }

        .profile img {
            width: 45px; /* Ukuran logo disamakan persis (45px) */
            height: 45px;
            border-radius: 50%; /* Logo dibuat bulat tanpa border & background wrap sesuai Dashboard PJI */
            object-fit: contain;
        }

        .profile span {
            font-size: 15px;
            font-weight: 500;
            color: #1F2937;
        }

        .main {
            padding: 35px;
            flex-grow: 1;
        }

        /* ================= HEADER CARD ================= */
        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-card .title {
            font-size: 30px;
            font-weight: 700;
            color: #1F2937;
            margin: 0 0 6px 0;
        }

        .header-card .subtitle {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
        }

        /* ================= CARD PROFIL ================= */
        .card-profil {
            background: white;
            border-radius: 14px;
            padding: 35px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
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
            color: #4B5563;
            font-size: 15px;
        }

        .info .form-control {
            height: 48px;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
            font-size: 14px;
            padding: 10px 16px;
            color: #1F2937;
            transition: none;
        }

        .info .form-control:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        .btn {
            height: 45px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: none;
        }

        .btn-primary {
            background-color: #2563EB;
            border-color: #2563EB;
        }

        .btn-primary:hover {
            background-color: #1D4ED8;
            border-color: #1D4ED8;
        }

        .footer hr {
            border-color: #E5E7EB;
            opacity: 1;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="content-wrapper">
        <!-- ================= SIDEBAR ================= -->
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}">
                <h4>BSPJI</h4>
                <p>PJI</p>
            </div>

            <ul class="menu">
                <li>
                    <a href="/dashboard-pji">
                        <i class="fas fa-house"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/pji/perusahaan">
                        <i class="fas fa-building"></i>
                        Kelola Perusahaan
                    </a>
                </li>
                <li>
                    <a href="/pji/audit">
                        <i class="fas fa-file-signature"></i>
                        Kelola Audit
                    </a>
                </li>
                <li>
                    <a href="/pji/tim-audit">
                        <i class="fas fa-users"></i>
                        Tim Audit
                    </a>
                </li>
                <li>
                    <a href="/pji/review-katim">
                        <i class="fas fa-clipboard-check"></i>
                        Review Katim PJI
                    </a>
                </li>
                <li>
                    <a href="/pji/profil" class="active">
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
                <input type="text" class="form-control search" placeholder="Cari...">

                <div class="profile">
                    <i class="far fa-bell bell-icon"></i>
                    <img src="{{ asset('images/logo.png') }}">
                    <span>PJI</span>
                </div>
            </div>

            <div class="main">
                <!-- ================= HEADER CARD ================= -->
                <div class="header-card">
                    <div>
                        <h2 class="title">Edit Profil</h2>
                        <p class="subtitle">Perbarui informasi akun Anda.</p>
                    </div>
                </div>

                <!-- ================= PROFILE CARD ================= -->
                <div class="card-profil">
                    <form action="/pji/profil/update" method="POST" enctype="multipart/form-data">
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
                            <a href="/pji/profil" class="btn btn-secondary px-4">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>

                            <button type="reset" class="btn btn-warning text-white px-4">
                                <i class="fas fa-rotate-left"></i>
                                Reset
                            </button>

                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-floppy-disk"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
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
        const fotoInput = document.getElementById('fotoInput');
        const avatarPreview = document.getElementById('avatarPreview');

        document.addEventListener('DOMContentLoaded', function() {
            const savedAvatar = localStorage.getItem('pji_avatar');
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
                    localStorage.setItem('pji_avatar', avatarData);
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
            localStorage.removeItem('pji_avatar');
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
                const savedAvatar = localStorage.getItem('pji_avatar');
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