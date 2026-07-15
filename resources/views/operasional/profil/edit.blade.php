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
            position: relative;
        }

        .avatar-wrapper {
            position: relative;
            display: inline-block;
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

        .avatar-upload-btn {
            position: absolute;
            bottom: 4px;
            right: 4px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #2563EB;
            color: white;
            border: 2px solid white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .avatar-upload-btn:hover {
            background: #1d4ed8;
        }

        .card-profil label {
            font-weight: 600;
            font-size: 14px;
            display: block;
            margin-bottom: 8px;
            color: #374151;
        }

        .card-profil .form-control {
            height: 48px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            font-size: 14px;
        }

        .card-profil .form-control:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .btn-action-cancel {
            background: #64748b;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 24px;
            border: none;
            text-decoration: none;
        }

        .btn-action-cancel:hover {
            background: #475569;
            color: white;
        }

        .btn-action-reset {
            background: #eab308;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 24px;
            border: none;
        }

        .btn-action-reset:hover {
            background: #ca8a04;
        }

        .btn-action-submit {
            background: #2563EB;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 24px;
            border: none;
        }

        .btn-action-submit:hover {
            background: #1d4ed8;
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
                <h2 class="title" style="font-size: 26px;">Edit Profil</h2>
                <p class="subtitle" style="font-size: 14px;">Perbarui informasi akun Anda.</p>
            </div>

            <!-- PROFILE CARD -->
            <div class="card-profil">
                <form action="/operasional/profil" method="GET" id="editProfilForm">
                    <input type="file" id="avatarFile" accept="image/*" style="display: none;" onchange="previewAvatar(event)">
                    <div class="avatar-container">
                        <div class="avatar-wrapper" onclick="document.getElementById('avatarFile').click()" style="cursor: pointer;">
                            <div class="avatar-circle">
                                O
                            </div>
                            <div class="avatar-upload-btn">
                                <i class="fas fa-camera"></i>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger mt-2 fw-semibold" id="btnDeletePhoto" onclick="deleteAvatar(event)" style="border-radius: 8px; font-size: 11px; display: none; padding: 4px 12px;">Hapus Foto</button>
                        <small class="text-secondary mt-2 d-block" style="font-size: 12px; font-weight: 500;">Format: JPG, PNG. Maks: 2MB</small>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="inputNip">NIP</label>
                            <input type="text" class="form-control text-dark" id="inputNip" value="" placeholder="Masukkan NIP" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputRole">Role</label>
                            <input type="text" class="form-control bg-light text-secondary" id="inputRole" value="" placeholder="Belum diatur" readonly disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputPassword">Password Baru</label>
                            <input type="password" class="form-control" id="inputPassword" placeholder="Kosongkan jika tidak diubah">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputConfirmPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Ulangi Password Baru">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/operasional/profil" class="btn-action-cancel">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn-action-reset" onclick="resetForm()">
                                <i class="fas fa-rotate-right me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn-action-submit">
                                <i class="fas fa-floppy-disk me-1"></i> Simpan Perubahan
                            </button>
                        </div>
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
                const btnDelete = document.getElementById('btnDeletePhoto');
                if (btnDelete) {
                    btnDelete.style.display = 'inline-block';
                }
            }
        });

        function previewAvatar(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatarData = e.target.result;
                    localStorage.setItem('operasional_avatar', avatarData);
                    const avatarCircle = document.querySelector('.avatar-circle');
                    if (avatarCircle) {
                        avatarCircle.innerHTML = `<img src="${avatarData}" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">`;
                    }
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
        }

        function deleteAvatar(event) {
            event.stopPropagation();
            localStorage.removeItem('operasional_avatar');
            const avatarCircle = document.querySelector('.avatar-circle');
            if (avatarCircle) {
                avatarCircle.innerHTML = 'O';
            }
            const profileImg = document.querySelector('.profile img');
            if (profileImg) {
                profileImg.src = "{{ asset('images/logo.png') }}";
            }
            const btnDelete = document.getElementById('btnDeletePhoto');
            if (btnDelete) {
                btnDelete.style.display = 'none';
            }
            document.getElementById('avatarFile').value = '';
        }

        function resetForm() {
            document.getElementById('inputNip').value = "";
            document.getElementById('inputPassword').value = "";
            document.getElementById('inputConfirmPassword').value = "";
        }

        document.getElementById('editProfilForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Sukses! Perubahan profil Anda berhasil disimpan.');
            window.location.href = '/operasional/profil';
        });
    </script>
</body>

</html>
