<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Jadwal Audit</title>
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

        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
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

        .step-card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 22px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .step-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .step-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #2563EB;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 15px;
        }

        .step-circle.gray {
            background: #F3F4F6;
            color: #9CA3AF;
            border: 1px solid #E5E7EB;
        }

        .step-title {
            font-weight: 500;
            font-size: 15px;
            color: #1F2937;
        }

        .step-title.text-secondary {
            color: #6B7280;
        }

        .step-line {
            width: 100px;
            height: 2px;
            background: #E5E7EB;
        }

        .form-card {
            background: #fff;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-card h3 {
            font-size: 20px;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 20px;
            border-bottom: 1px solid #F3F4F6;
            padding-bottom: 12px;
        }

        .form-label {
            font-size: 15px;
            color: #4B5563;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control,
        .form-select,
        .dropdown-select-btn {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
            font-size: 14px;
            padding: 10px 16px;
            transition: none;
        }

        .form-control:focus,
        .form-select:focus,
        .dropdown-select-btn:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        /* Styling Khas untuk Dropdown Multi-Select */
        .dropdown-select-btn {
            background-color: #fff;
            color: #212529;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .dropdown-select-btn::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }

        .dropdown-menu-custom {
            border-radius: 8px;
            border: 1px solid #E2E8F0;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }

        .dropdown-item-custom {
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .dropdown-item-custom:hover {
            background-color: #F8FAFC;
        }

        textarea.form-control {
            height: 100px;
            resize: none;
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
            transition: none; /* Menghapus transisi */
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
                    <a href="/pji/audit" class="active">
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
                    <a href="/pji/profil">
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
                        <h2 class="title">Buat Jadwal Audit</h2>
                        <p class="subtitle">Isi informasi audit dan generate tim secara otomatis.</p>
                    </div>
                </div>

                <!-- ================= STEP CARD ================= -->
                <div class="step-card">
                    <div class="step-wrapper">
                        <div class="step">
                            <div class="step-circle">1</div>
                            <div class="step-title">Informasi Audit</div>
                        </div>
                        <div class="step-line"></div>
                        <div class="step">
                            <div class="step-circle gray">2</div>
                            <div class="step-title text-secondary">Generate Tim Audit</div>
                        </div>
                    </div>
                </div>

                <!-- Session Alert -->
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-width: 900px; margin: 0 auto 22px auto; border-radius: 12px;">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 900px; margin: 0 auto 22px auto; border-radius: 12px;">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-width: 900px; margin: 0 auto 22px auto; border-radius: 12px;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- ================= FORM CARD ================= -->
                <div class="form-card">
                    <h3>Informasi Dasar Audit</h3>

                    <form action="{{ route('pji.audit.generate') }}" method="POST" id="formCreateAudit">
                        @csrf
                        <input type="hidden" name="kompetensi_json" id="inputKompetensiJson">

                        <div class="row">
                            <!-- Perusahaan yang Diaudit -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Perusahaan yang Diaudit</label>
                                <select class="form-select" name="nama_perusahaan" id="selectCompany" required>
                                    <option value="" disabled selected>Pilih Perusahaan</option>
                                    @foreach(array_keys($companyMap) as $compName)
                                        <option value="{{ $compName }}" {{ old('nama_perusahaan') == $compName ? 'selected' : '' }}>{{ $compName }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Lokasi -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" placeholder="Masukkan detail lokasi audit (contoh: Palembang)" value="{{ old('lokasi') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Tanggal Mulai -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
                            </div>
                            <!-- Tanggal Selesai -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Kategori Wilayah -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Kategori Wilayah</label>
                                <div class="d-flex flex-wrap gap-2" id="kategoriLokasiGroup">
                                    <button type="button" class="btn {{ old('kategori_lokasi') == 'Dalam Kota' ? 'btn-primary' : 'btn-outline-primary' }} btn-sm px-3 location-btn" onclick="selectKategoriLokasi(this, 'Dalam Kota')" style="height: 38px; border-radius: 8px; font-size: 13px; font-weight: 500; transition: none;">Dalam Kota</button>
                                    <button type="button" class="btn {{ old('kategori_lokasi') == 'Pinggiran Kota' ? 'btn-primary' : 'btn-outline-primary' }} btn-sm px-3 location-btn" onclick="selectKategoriLokasi(this, 'Pinggiran Kota')" style="height: 38px; border-radius: 8px; font-size: 13px; font-weight: 500; transition: none;">Pinggiran Kota</button>
                                    <button type="button" class="btn {{ old('kategori_lokasi') == 'Luar Kota' ? 'btn-primary' : 'btn-outline-primary' }} btn-sm px-3 location-btn" onclick="selectKategoriLokasi(this, 'Luar Kota')" style="height: 38px; border-radius: 8px; font-size: 13px; font-weight: 500; transition: none;">Luar Kota</button>
                                    <button type="button" class="btn {{ old('kategori_lokasi') == 'Luar Negeri' ? 'btn-primary' : 'btn-outline-primary' }} btn-sm px-3 location-btn" onclick="selectKategoriLokasi(this, 'Luar Negeri')" style="height: 38px; border-radius: 8px; font-size: 13px; font-weight: 500; transition: none;">Luar Negeri</button>
                                </div>
                                <input type="hidden" name="kategori_lokasi" id="inputKategoriLokasi" value="{{ old('kategori_lokasi') }}">
                            </div>
                        </div>

                        <!-- ================= KOMPETENSI LEMBAGA & RUANG LINGKUP (LAYOUT GAMBAR 2) ================= -->
                        <div class="card p-4 border border-light shadow-sm rounded-4 mb-4" style="background-color: #F8FAFC;">
                            <h5 class="fw-bold mb-3 text-primary" style="font-size: 16px;">
                                <i class="fas fa-landmark me-2"></i>Jenis Audit & Ruang Lingkup
                            </h5>
                            
                            <div class="row">
                                <!-- Pilih Jenis Audit -->
                                <div class="col-md-5 mb-3">
                                    <label class="form-label fw-semibold" style="font-size: 14px;">Pilih Jenis Audit</label>
                                    <select class="form-select" id="selectLembaga" onchange="loadRuangLingkup()">
                                        <option value="" disabled selected>Pilih Jenis Audit</option>
                                        @foreach($lembagas as $l)
                                            <option value="{{ $l->id_lembaga }}">{{ $l->nama_lembaga }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <!-- Pilih Ruang Lingkup -->
                                <div class="col-md-7 mb-3">
                                    <label class="form-label fw-semibold" style="font-size: 14px;">Pilih Ruang Lingkup (Bisa Pilih Lebih dari Satu)</label>
                                    <!-- Search input inside choice box -->
                                    <input type="text" class="form-control form-control-sm mb-2" id="searchRuangLingkup" placeholder="Cari ruang lingkup..." onkeyup="filterChoices()" style="display: none;">
                                    <div class="border rounded p-3 bg-white" id="ruangLingkupContainer" style="max-height: 180px; overflow-y: auto; font-size: 14px;">
                                        <span class="text-muted">Belum ada data ruang lingkup di database.</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-end mt-2">
                                <button type="button" class="btn btn-primary px-4 btn-sm" id="btnTambahKompetensi" onclick="tambahKompetensi()" disabled style="height: 38px; font-size: 14px; border-radius: 8px;">
                                    <i class="fas fa-plus"></i> Tambah Kompetensi
                                </button>
                            </div>

                            <!-- Daftar Kompetensi Terpilih -->
                            <h6 class="fw-bold mt-4 mb-3 text-dark" style="font-size: 15px;">Daftar Kompetensi Terpilih</h6>
                            <div id="daftarKompetensiTerpilih">
                                <div class="text-muted text-center py-3 border rounded-3 bg-white" id="emptyKompetensiText" style="font-size: 14px;">
                                    Belum ada kompetensi yang ditambahkan.
                                </div>
                            </div>
                        </div>
                        <!-- ======================================================================================= -->

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control" placeholder="Masukkan keterangan tambahan jika diperlukan...">{{ old('keterangan') }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="/pji/audit" class="btn btn-outline-secondary px-4">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Selanjutnya
                                <i class="fas fa-arrow-right"></i>
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
    
    <!-- ================= JAVASCRIPT UNTUK DYNAMIC KOMPETENSI & RUANG LINGKUP ================= -->
    <script>
        const companyData = @json($companyMap);
        const dataRuangLingkup = @json($dataRuangLingkup);
        const companyAddresses = @json($companyAddresses);

        document.addEventListener('DOMContentLoaded', function() {
            const selectCompany = document.getElementById('selectCompany');
            const selectLembaga = document.getElementById('selectLembaga');

            const form = document.getElementById('formCreateAudit') || document.querySelector('form[action*="generate"]');
            if (form) {
                form.addEventListener('submit', function(e) {
                    if (Object.keys(listKompetensi).length === 0) {
                        alert('Silakan tambah minimal satu Jenis Audit & Ruang Lingkup!');
                        e.preventDefault();
                        return;
                    }
                    if (!document.getElementById('inputKategoriLokasi').value) {
                        alert('Silakan pilih Kategori Wilayah terlebih dahulu!');
                        e.preventDefault();
                        return;
                    }
                    document.getElementById('inputKompetensiJson').value = JSON.stringify(listKompetensi);
                });
            }

            // Render existing competencies if page reloads on validation error
            renderKompetensiList();

            // Auto fill location input when company changes
            if (selectCompany) {
                selectCompany.addEventListener('change', function() {
                    const compName = this.value;
                    const address = companyAddresses[compName] || '';
                    const inputLokasi = document.querySelector('input[name="lokasi"]');
                    if (inputLokasi) {
                        inputLokasi.value = address;
                    }
                });
            }
        });

        const listKompetensi = @json(old('kompetensi_json') ? json_decode(old('kompetensi_json'), true) : (object)[]);

        function loadRuangLingkup() {
            const select = document.getElementById('selectLembaga');
            const container = document.getElementById('ruangLingkupContainer');
            const searchInput = document.getElementById('searchRuangLingkup');
            const val = select.value;

            if (!val) {
                container.innerHTML = '<span class="text-muted">Silakan pilih lembaga terlebih dahulu.</span>';
                searchInput.style.display = 'none';
                return;
            }

            const items = dataRuangLingkup[val] || [];
            if (items.length === 0) {
                container.innerHTML = '<span class="text-muted">Tidak ada ruang lingkup tersedia.</span>';
                searchInput.style.display = 'none';
                return;
            }

            // Tampilkan kotak pencarian
            searchInput.style.display = 'block';
            searchInput.value = '';

            let html = '';
            items.forEach((item, index) => {
                html += `
                    <div class="form-check mb-2 choice-item">
                        <input class="form-check-input check-lingkup" type="checkbox" value="${item}" id="chk_${index}" onchange="toggleAddButton()">
                        <label class="form-check-label w-100" for="chk_${index}">
                            ${item}
                        </label>
                    </div>
                `;
            });
            container.innerHTML = html;
            toggleAddButton();
        }

        function filterChoices() {
            const query = document.getElementById('searchRuangLingkup').value.toLowerCase();
            const items = document.querySelectorAll('.choice-item');
            items.forEach(item => {
                const label = item.querySelector('label').textContent.toLowerCase();
                if (label.indexOf(query) > -1) {
                    item.style.setProperty('display', 'block', 'important');
                } else {
                    item.style.setProperty('display', 'none', 'important');
                }
            });
        }

        function toggleAddButton() {
            const checks = document.querySelectorAll('.check-lingkup:checked');
            const btn = document.getElementById('btnTambahKompetensi');
            if (checks.length > 0) {
                btn.removeAttribute('disabled');
            } else {
                btn.setAttribute('disabled', 'true');
            }
        }

        function tambahKompetensi() {
            const select = document.getElementById('selectLembaga');
            const lembagaId = select.value;
            const lembagaText = select.options[select.selectedIndex].text;
            
            const checks = document.querySelectorAll('.check-lingkup:checked');
            const scopes = [];
            checks.forEach(cb => scopes.push(cb.value));

            if (scopes.length === 0) return;

            // Buat atau gabungkan ruang lingkup lembaga
            if (!listKompetensi[lembagaId]) {
                listKompetensi[lembagaId] = {
                    name: lembagaText,
                    scopes: []
                };
            }

            scopes.forEach(sc => {
                if (!listKompetensi[lembagaId].scopes.includes(sc)) {
                    listKompetensi[lembagaId].scopes.push(sc);
                }
            });

            // Tampilkan kembali daftar terpilih
            renderKompetensiList();

            // Reset input
            select.value = '';
            loadRuangLingkup();
        }

        function hapusKompetensi(lembagaId) {
            delete listKompetensi[lembagaId];
            renderKompetensiList();
        }

        function renderKompetensiList() {
            const listDiv = document.getElementById('daftarKompetensiTerpilih');
            const keys = Object.keys(listKompetensi);

            if (keys.length === 0) {
                listDiv.innerHTML = `
                    <div class="text-muted text-center py-3 border rounded-3 bg-white" id="emptyKompetensiText" style="font-size: 14px;">
                        Belum ada kompetensi yang ditambahkan.
                    </div>
                `;
                return;
            }

            let html = '';
            keys.forEach(k => {
                const item = listKompetensi[k];
                html += `
                    <div class="card mb-3 p-3 border rounded-3 bg-white kompetensi-card" id="card_${k}" style="box-shadow: 0 4px 12px rgba(15, 61, 145, 0.03);">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="fw-bold text-primary mb-1" style="font-size: 14px;">${item.name}</h6>
                                <small class="text-secondary d-block mt-1" style="font-size: 13px;">
                                    <strong>Ruang Lingkup:</strong> ${item.scopes.join(', ')}
                                </small>
                            </div>
                            <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center" onclick="hapusKompetensi('${k}')" style="width: 32px; height: 32px; border-radius: 8px; border-color: #EF4444; color: #EF4444; background: transparent; transition: none;">
                                <i class="far fa-trash-can" style="font-size: 13px;"></i>
                            </button>
                        </div>
                    </div>
                `;
            });
            listDiv.innerHTML = html;
        }

        function selectKategoriLokasi(btn, value) {
            // Hapus kelas aktif dari semua tombol kategori lokasi
            const buttons = document.querySelectorAll('.location-btn');
            buttons.forEach(b => {
                b.classList.remove('btn-primary');
                b.classList.add('btn-outline-primary');
            });
            
            // Tambahkan kelas aktif pada tombol yang diklik
            btn.classList.remove('btn-outline-primary');
            btn.classList.add('btn-primary');
            
            // Set nilai ke input hidden
            document.getElementById('inputKategoriLokasi').value = value;
        }
    </script>
</body>

</html>