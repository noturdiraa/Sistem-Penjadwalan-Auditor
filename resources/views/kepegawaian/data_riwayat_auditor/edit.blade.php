<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Riwayat Auditor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tom Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    
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
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            text-decoration: none;
            color: white;
            transition: .3s;
            white-space: nowrap;
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

        .main {
            padding: 35px;
        }

        /* HEADER CARD */
        .header-card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border-radius: 12px;
            padding: 18px 22px;
            box-shadow: 0 6px 18px rgba(15, 61, 145, 0.06);
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-card .title {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 6px 0;
        }

        .header-card .subtitle {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
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

        .form-control, .form-select, .ts-wrapper {
            border-radius: 10px !important;
            border: 1px solid #cbd5e1 !important;
            font-size: 14px !important;
            transition: .2s;
        }

        .form-control {
            height: 48px;
            padding: 10px 16px;
        }

        .form-control:focus, .form-select:focus, .ts-wrapper.focus {
            border-color: #2563EB !important;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1) !important;
        }

        .ts-wrapper .ts-control {
            padding: 10px 16px !important;
            min-height: 48px !important;
            border-radius: 10px !important;
        }

        textarea.form-control {
            height: auto;
        }

        .input-group-text {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: #64748b;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group .form-control {
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 10px !important;
            border-bottom-right-radius: 10px !important;
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
            <!-- Header Card -->
            <div class="header-card">
                <div>
                    <h2 class="title">Edit Riwayat Penugasan</h2>
                    <p class="subtitle">Silakan perbarui form di bawah ini untuk mengubah data riwayat penugasan auditor.</p>
                </div>
            </div>

            <!-- Form Box -->
            <div class="form-box">
                <form action="{{ route('kepegawaian.riwayatauditor.update', $riwayat->id_riwayat) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Auditor -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Auditor</label>
                            <select name="id_auditor" id="id_auditor" required>
                                @foreach($auditors as $auditor)
                                    <option value="{{ $auditor->id_auditor }}" {{ (old('id_auditor', $riwayat->id_auditor) == $auditor->id_auditor) ? 'selected' : '' }}>
                                        {{ $auditor->nama_auditor }} (NIP: {{ $auditor->nip }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_auditor')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nama Perusahaan -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Nama Perusahaan</label>
                            <select name="id_perusahaan" id="id_perusahaan" required>
                                @foreach($perusahaans as $p)
                                    <option value="{{ $p->id_perusahaan }}" {{ (old('id_perusahaan', $riwayat->audit->id_perusahaan ?? '') == $p->id_perusahaan) ? 'selected' : '' }}>
                                        {{ $p->nama_perusahaan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_perusahaan')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jenis Lembaga -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Jenis Lembaga</label>
                            <select name="id_lembaga" id="id_lembaga" required>
                                @foreach($lembagas as $l)
                                    <option value="{{ $l->id_lembaga }}" {{ (old('id_lembaga', $riwayat->audit->ruangLingkup->id_lembaga ?? '') == $l->id_lembaga) ? 'selected' : '' }}>
                                        {{ $l->nama_lembaga }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_lembaga')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jenis Audit -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Jenis Audit</label>
                            <select name="jenis_audit" id="jenis_audit" required>
                                <option value="" disabled>Cari / Pilih Jenis Audit...</option>
                                @php
                                    $currentVal = old('jenis_audit', $riwayat->audit->jenis_audit ?? '');
                                    $hasCurrent = false;
                                @endphp
                                @foreach($jenisAudits as $ja)
                                    @if($ja == $currentVal)
                                        @php $hasCurrent = true; @endphp
                                    @endif
                                    <option value="{{ $ja }}" {{ $currentVal == $ja ? 'selected' : '' }}>{{ $ja }}</option>
                                @endforeach
                                @if(!$hasCurrent && $currentVal)
                                    <option value="{{ $currentVal }}" selected>{{ $currentVal }}</option>
                                @endif
                            </select>
                            @error('jenis_audit')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tim Audit (Multiselect) -->
                        @php
                            $selectedTeamIds = $riwayat->jadwalAudit ? $riwayat->jadwalAudit->timAudits->pluck('id_auditor')->toArray() : [];
                        @endphp
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Tim Audit (Lainnya)</label>
                            <select name="tim_audit[]" id="tim_audit" multiple placeholder="Pilih anggota tim audit...">
                                @foreach($auditors as $auditor)
                                    <option value="{{ $auditor->id_auditor }}" {{ in_array($auditor->id_auditor, $selectedTeamIds) ? 'selected' : '' }}>
                                        {{ $auditor->nama_auditor }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tim_audit')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Mulai -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tanggal Audit Mulai</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', $riwayat->tanggal_mulai) }}" required>
                            </div>
                            @error('tanggal_mulai')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Selesai -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tanggal Audit Selesai</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai', $riwayat->tanggal_selesai) }}">
                            </div>
                            @error('tanggal_selesai')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Peran Auditor -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Peran Auditor</label>
                            <select name="peran_auditor" class="form-select @error('peran_auditor') is-invalid @enderror" required style="height: 48px; border-radius: 10px;">
                                <option value="Auditor" {{ (old('peran_auditor', $riwayat->peran_auditor) == 'Auditor') ? 'selected' : '' }}>Auditor</option>
                                <option value="Lead Auditor" {{ (old('peran_auditor', $riwayat->peran_auditor) == 'Lead Auditor') ? 'selected' : '' }}>Lead Auditor</option>
                            </select>
                            @error('peran_auditor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Penugasan -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Status Penugasan</label>
                            <select name="status_penugasan" class="form-select @error('status_penugasan') is-invalid @enderror" required style="height: 48px; border-radius: 10px;">
                                <option value="Berlangsung" {{ (old('status_penugasan', $riwayat->status_penugasan) == 'Berlangsung') ? 'selected' : '' }}>Berlangsung</option>
                                <option value="Selesai" {{ (old('status_penugasan', $riwayat->status_penugasan) == 'Selesai') ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status_penugasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Keterangan -->
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Keterangan / Catatan</label>
                            <textarea name="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan keterangan tambahan jika ada...">{{ old('keterangan', $riwayat->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-end gap-3 mt-3">
                        <a href="{{ route('kepegawaian.riwayatauditor.index') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-submit">Simpan Perubahan</button>
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
    
    <!-- Tom Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect('#id_auditor', { create: false });
            new TomSelect('#id_perusahaan', { create: false });
            new TomSelect('#id_lembaga', { create: false });
            new TomSelect('#jenis_audit', { create: true });
            new TomSelect('#tim_audit', { create: false, plugins: ['remove_button'] });
        });
    </script>
</body>

</html>
