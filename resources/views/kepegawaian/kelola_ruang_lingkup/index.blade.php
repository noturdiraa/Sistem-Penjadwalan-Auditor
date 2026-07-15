<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Ruang Lingkup</title>
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
            background: white;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
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

        .form-control,
        .form-select {
            height: 48px;
            border-radius: 12px;
        }

        .table thead {
            background: #EEF4FF;
        }

        .table th {
            padding: 18px;
            font-weight: 600;
            color: #555;
            white-space: nowrap;
        }

        .table td {
            padding: 18px;
            vertical-align: middle;
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
                <a href="/kepegawaian/ruang-lingkup" class="active">
                    <i class="fas fa-circle-nodes"></i>
                    Kelola Ruang Lingkup
                </a>
            </li>
            <li>
                <a href="/kepegawaian/profil">
                    <i class="fas fa-user"></i>
                    Profil
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; display: flex; align-items: center; gap: 15px; width: 100%; padding: 14px 18px; font-size: 15px; line-height: 1.1;">
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
            <div></div>
            <div class="right-menu">
                <i class="far fa-bell"></i>
                <div class="profile">
                    <img src="{{ asset('images/logo.png') }}">
                    <span>Kepegawaian</span>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="page-header">
                <h2>Kelola Ruang Lingkup</h2>
                <p>Manajemen data bidang / komoditas ruang lingkup sertifikasi pada BSPJI Palembang.</p>
            </div>

            <div class="row">
                <!-- Form Tambah Ruang Lingkup -->
                <div class="col-lg-5 mb-4">
                    <div class="card p-4 border-0 shadow-sm rounded-4 bg-white">
                        <h5 class="fw-bold mb-3 text-primary" style="font-size: 16px;">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Ruang Lingkup
                        </h5>
                        <form action="#" method="POST" id="formRuangLingkup">
                            <div class="mb-3">
                                <label class="form-label fw-semibold" style="font-size: 14px;">Pilih Lembaga</label>
                                <select class="form-select" id="selectLembaga" required>
                                    <option value="" disabled selected>Pilih Lembaga...</option>
                                    <option value="LSPRO">LSPRO</option>
                                    <option value="LSSM">LSSM</option>
                                    <option value="LSSML">LSSML</option>
                                    <option value="LSIH">LSIH</option>
                                    <option value="LSSMKP">LSSMKP</option>
                                    <option value="LPH">LPH</option>
                                    <option value="LSHACCP">LSHACCP</option>
                                    <option value="LSSMK3">LSSMK3</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold" style="font-size: 14px;">Nama Ruang Lingkup</label>
                                <input type="text" class="form-control" id="inputRuangLingkup" placeholder="Masukkan nama ruang lingkup (contoh: Air Mineral)" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" style="border-radius: 12px; height: 48px; font-weight: 600;">
                                <i class="fas fa-floppy-disk me-1"></i> Simpan Ruang Lingkup
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Daftar Ruang Lingkup -->
                <div class="col-lg-7 mb-4">
                    <div class="card p-4 border-0 shadow-sm rounded-4 bg-white" style="min-height: 250px;">
                        <h5 class="fw-bold mb-3 text-dark" style="font-size: 16px;">
                            <i class="fas fa-circle-nodes me-2"></i>Daftar Ruang Lingkup
                        </h5>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Ruang Lingkup</th>
                                        <th>Lembaga</th>
                                        <th width="100" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="ruangLingkupTableBody">
                                    <tr>
                                        <td colspan="3" class="text-center py-5 text-secondary" style="font-size: 14px;">
                                            <i class="fas fa-info-circle fa-2x mb-3 d-block text-secondary"></i>
                                            <span>Belum ada data ruang lingkup.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
        document.getElementById('formRuangLingkup').addEventListener('submit', function(e) {
            e.preventDefault();
            const selectLembaga = document.getElementById('selectLembaga');
            const inputRuang = document.getElementById('inputRuangLingkup');
            
            const valLembaga = selectLembaga.value;
            const valRuang = inputRuang.value.trim();

            if (!valLembaga || !valRuang) return;

            const tbody = document.getElementById('ruangLingkupTableBody');
            
            // Hapus baris empty state jika ada
            const emptyRow = tbody.querySelector('td[colspan="3"]');
            if (emptyRow) {
                tbody.innerHTML = '';
            }

            // Tambahkan baris baru
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${valRuang}</strong></td>
                <td><span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2" style="border-radius: 8px;">${valLembaga}</span></td>
                <td class="text-center">
                    <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center mx-auto" onclick="this.closest('tr').remove(); checkEmptyTable();" style="width: 32px; height: 32px; border-radius: 8px; border-color: #EF4444; color: #EF4444; background: transparent; transition: none;">
                        <i class="far fa-trash-can" style="font-size: 13px;"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(tr);
            
            // Reset input
            inputRuang.value = '';
            selectLembaga.value = '';
        });

        function checkEmptyTable() {
            const tbody = document.getElementById('ruangLingkupTableBody');
            if (tbody.children.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="3" class="text-center py-5 text-secondary" style="font-size: 14px;">
                            <i class="fas fa-info-circle fa-2x mb-3 d-block text-secondary"></i>
                            <span>Belum ada data ruang lingkup.</span>
                        </td>
                    </tr>
                `;
            }
        }
    </script>
</body>

</html>
