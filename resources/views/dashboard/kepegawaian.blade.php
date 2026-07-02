@extends('layouts.app')

@section('title', 'Dashboard Kepegawaian')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Dashboard Kepegawaian</h2>
            <p class="text-muted mb-0">
                Selamat datang di Sistem Penjadwalan Auditor BSPJI Palembang.
            </p>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                        style="width:60px;height:60px;">
                        <i class="fas fa-users fa-lg"></i>
                    </div>

                    <div class="ms-3">
                        <small class="text-muted">Total Auditor</small>
                        <h3 class="fw-bold mb-0">28</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center"
                        style="width:60px;height:60px;">
                        <i class="fas fa-user-check fa-lg"></i>
                    </div>

                    <div class="ms-3">
                        <small class="text-muted">Auditor Aktif</small>
                        <h3 class="fw-bold mb-0">25</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-warning text-white rounded-circle d-flex justify-content-center align-items-center"
                        style="width:60px;height:60px;">
                        <i class="fas fa-award fa-lg"></i>
                    </div>

                    <div class="ms-3">
                        <small class="text-muted">Kompetensi</small>
                        <h3 class="fw-bold mb-0">15</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-danger text-white rounded-circle d-flex justify-content-center align-items-center"
                        style="width:60px;height:60px;">
                        <i class="fas fa-user-clock fa-lg"></i>
                    </div>

                    <div class="ms-3">
                        <small class="text-muted">Auditor Cuti</small>
                        <h3 class="fw-bold mb-0">3</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Data Auditor -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-header bg-white border-0 py-3 d-flex justify-content-between">

            <h5 class="fw-bold mb-0">
                Data Auditor
            </h5>

            <button class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Auditor
            </button>

        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                <tr>
                    <th>No</th>
                    <th>Nama Auditor</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Kompetensi</th>
                    <th>Status</th>
                </tr>

                </thead>

                <tbody>

                <tr>
                    <td>1</td>
                    <td>Andi Saputra</td>
                    <td>19870001</td>
                    <td>Auditor Madya</td>
                    <td>ISO 9001</td>
                    <td><span class="badge bg-success">Aktif</span></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Budi Santoso</td>
                    <td>19880002</td>
                    <td>Auditor Muda</td>
                    <td>ISO 17025</td>
                    <td><span class="badge bg-success">Aktif</span></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Citra Lestari</td>
                    <td>19900003</td>
                    <td>Auditor</td>
                    <td>ISO 22000</td>
                    <td><span class="badge bg-warning">Cuti</span></td>
                </tr>

                </tbody>

            </table>

        </div>

    </div>

    <!-- Kompetensi & Aktivitas -->
    <div class="row">

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">
                    <h5 class="fw-bold mb-0">Kompetensi Auditor</h5>
                </div>

                <div class="card-body">

                    <p>ISO 9001</p>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" style="width:80%">80%</div>
                    </div>

                    <p>ISO 17025</p>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-success" style="width:60%">60%</div>
                    </div>

                    <p>ISO 22000</p>
                    <div class="progress">
                        <div class="progress-bar bg-warning" style="width:40%">40%</div>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">
                    <h5 class="fw-bold mb-0">Aktivitas Terbaru</h5>
                </div>

                <div class="card-body">

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            ✅ Auditor Andi berhasil ditambahkan
                        </li>

                        <li class="list-group-item">
                            ✅ Kompetensi Auditor diperbarui
                        </li>

                        <li class="list-group-item">
                            ✅ Data Auditor berhasil diubah
                        </li>

                        <li class="list-group-item">
                            ✅ Auditor memasuki masa cuti
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection