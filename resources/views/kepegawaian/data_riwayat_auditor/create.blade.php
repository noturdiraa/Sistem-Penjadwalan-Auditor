<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Riwayat Auditor</title>
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

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 290px;
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

        /* CONTENT */
        .content {
            margin-left: 290px;
            min-height: 100vh;
        }

        .navbar-custom {
            background: white;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0,0,0,.05);
        }

        .right-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .right-menu i {
            font-size: 20px;
            color: #555;
            cursor: pointer;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile span {
            font-weight: 600;
            color: #333;
        }

        .main {
            padding: 35px;
        }

        /* FORM BOX */
        .form-box {
            background: white;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            border: 1px solid #eef2f6;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control, .form-select {
            height: 48px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 10px 16px;
            font-size: 14px;
            transition: .2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        textarea.form-control {
            height: auto;
        }

        .btn-submit {
            background: #2563EB;
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
            transition: .2s;
        }

        .btn-submit:hover {
            background: #1d4ed8;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border: 1px solid #cbd5e1;
            transition: .2s;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
            color: #334155;
        }

        .footer {
            padding: 25px;
            text-align: center;
            color: #64748b;
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
            <img src="{{ asset('images/logo.png') }}" alt="Logo BSPJI">
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
                    Kelola Jenis Audit
                </a>
            </li>
            <li>
                <a href="/kepegawaian/ruang-lingkup">
                    <i class="fas fa-circle-nodes"></i>
                    Kelola Ruang Lingkup
                </a>
            </li>
            <li>
                <a href="/kepegawaian/riwayat-auditor" class="active">
                    <i class="fas fa-clock-rotate-left"></i>
                    Riwayat Auditor
                </a>
            </li>
            <li>
                <a href="/kepegawaian/profil">
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
            <!-- Header Title -->
            <div class="mb-4">
                <h2 class="fw-bold text-dark">Tambah Riwayat Penugasan</h2>
                <p class="text-secondary mb-0">Silakan lengkapi form di bawah ini untuk menambahkan riwayat penugasan auditor baru.</p>
            </div>

            <!-- Form Box -->
            <div class="form-box">
                <form action="{{ route('kepegawaian.riwayatauditor.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Auditor -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Pilih Auditor</label>
                            <select name="id_auditor" class="form-select @error('id_auditor') is-invalid @enderror" required>
                                <option value="" selected disabled>-- Pilih Auditor --</option>
                                @foreach($auditors as $auditor)
                                    <option value="{{ $auditor->id_auditor }}" {{ old('id_auditor') == $auditor->id_auditor ? 'selected' : '' }}>
                                        {{ $auditor->nama_auditor }} (NIP: {{ $auditor->nip }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_auditor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Audit Perusahaan -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Pilih Audit Perusahaan</label>
                            <select name="id_audit" class="form-select @error('id_audit') is-invalid @enderror" required>
                                <option value="" selected disabled>-- Pilih Audit --</option>
                                @foreach($audits as $audit)
                                    <option value="{{ $audit->id_audit }}" {{ old('id_audit') == $audit->id_audit ? 'selected' : '' }}>
                                        {{ $audit->perusahaan->nama_perusahaan ?? 'Perusahaan' }} - {{ $audit->jenis_audit }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_audit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jadwal Audit -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Pilih Jadwal Audit</label>
                            <select name="id_jadwal" class="form-select @error('id_jadwal') is-invalid @enderror" required>
                                <option value="" selected disabled>-- Pilih Jadwal --</option>
                                @foreach($jadwals as $jadwal)
                                    <option value="{{ $jadwal->id_jadwal }}" {{ old('id_jadwal') == $jadwal->id_jadwal ? 'selected' : '' }}>
                                        {{ $jadwal->audit->perusahaan->nama_perusahaan ?? 'Perusahaan' }} (Mulai: {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d M Y') }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_jadwal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Peran Auditor -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Peran Auditor</label>
                            <select name="peran_auditor" class="form-select @error('peran_auditor') is-invalid @enderror" required>
                                <option value="Auditor" {{ old('peran_auditor') == 'Auditor' ? 'selected' : '' }}>Auditor</option>
                                <option value="Lead Auditor" {{ old('peran_auditor') == 'Lead Auditor' ? 'selected' : '' }}>Lead Auditor</option>
                            </select>
                            @error('peran_auditor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Mulai -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tanggal Mulai Penugasan</label>
                            <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai') }}" required>
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Selesai -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tanggal Selesai Penugasan (Opsional)</label>
                            <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai') }}">
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Penugasan -->
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Status Penugasan</label>
                            <select name="status_penugasan" class="form-select @error('status_penugasan') is-invalid @enderror" required>
                                <option value="Berlangsung" {{ old('status_penugasan') == 'Berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                <option value="Selesai" {{ old('status_penugasan') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Dibatalkan" {{ old('status_penugasan') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            @error('status_penugasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Keterangan -->
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Keterangan / Catatan</label>
                            <textarea name="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan keterangan tambahan jika ada...">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-end gap-3 mt-3">
                        <a href="{{ route('kepegawaian.riwayatauditor.index') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-submit">Simpan Riwayat</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <hr style="border-color: #E2E8F0;">
            <p>© 2026 Sistem Penjadwalan Auditor BSPJI Palembang</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
