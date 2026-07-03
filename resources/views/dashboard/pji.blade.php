<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard PJI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f7fc;
overflow-x:hidden;
}

.sidebar{

position:fixed;

left:0;

top:0;

width:270px;

height:100vh;

background:#0F3D91;

color:white;

padding:14px 18px;

/* jangan tampilkan scroll bar; teks akan membungkus jika perlu */
overflow-y:visible;

}

.logo{

text-align:center;

margin-bottom:18px;

}

.logo img{

width:70px;

margin-bottom:8px;

}

.logo h4{

font-weight:700;

margin:0;

}

.logo p{

font-size:13px;

opacity:.8;

}

.menu{

list-style:none;

padding:0;

}

.menu li{

margin-bottom:10px;

}

.menu li a{

display:flex;

align-items:center;

gap:15px;

padding:14px 18px;

border-radius:12px;

color:white;

text-decoration:none;

transition:.3s;

}

.menu li a{
    white-space:normal;
    padding:10px 12px;
    font-size:15px;
    line-height:1.1;
}

/* sembunyikan scrollbar pada browser berbasis WebKit jika masih muncul */
.sidebar::-webkit-scrollbar{display:none}
.sidebar{-ms-overflow-style:none;scrollbar-width:none}

/* Pastikan kolom kartu statistik memiliki tinggi yang sama */
.row > .col-lg-3{display:flex}
.row > .col-lg-3 > .card-stat{flex:1}

.menu li a:hover,
.menu li a.active{

background:#2563EB;

}

.content{

margin-left:270px;

min-height:100vh;

}

.navbar-custom{

height:80px;

background:white;

display:flex;

justify-content:space-between;

align-items:center;

padding:0 35px;

box-shadow:0 5px 15px rgba(0,0,0,.05);

}

.search{

width:350px;

}

.profile{

display:flex;

align-items:center;

gap:15px;

}

.profile img{

width:45px;

height:45px;

border-radius:50%;

}

.main{

padding:35px;

}
/* Statistik card adjustments */
.card-stat{
background:white;
border-radius:18px;
padding:18px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
transition:.3s;
border:none;
min-height:100px;
}

.card-stat .d-flex > div{
    max-width:calc(100% - 80px);
}

.card-stat h2{
    font-size:28px;
}

.card-stat small{
    display:block;
}

.icon-box{
width:60px;
height:60px;
border-radius:14px;
display:flex;
justify-content:center;
align-items:center;
font-size:22px;
color:white;
}

/* Footer inside content only */
.footer{color:#6b7280;padding:14px 0}
.footer hr{border:none;border-top:1px solid rgba(0,0,0,.8);margin:10px 0 12px;width:100%}

.main h2{

font-weight:700;

}

.main p{

color:#777;

margin-bottom:30px;

}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">

<img src="{{ asset('images/logo.png') }}">

<h4>BSPJI</h4>

<p>PJI</p>

</div>

<ul class="menu">

<li><a href="#" class="active"><i class="fas fa-house"></i>Dashboard</a></li>

<li><a href="#"><i class="fas fa-building"></i>Kelola Perusahaan</a></li>

<li><a href="#"><i class="fas fa-file-signature"></i>Kelola Audit</a></li>

<li><a href="#"><i class="fas fa-calendar-days"></i>Jadwal Audit</a></li>

<li><a href="#"><i class="fas fa-users"></i>Tim Audit</a></li>

<!-- Naikkan menu Profil agar terlihat tanpa harus scroll -->
<li><a href="#"><i class="fas fa-clipboard-check"></i>Review Katim PJI</a></li>

<li><a href="#"><i class="fas fa-user"></i>Profil</a></li>

<li><a href="#"><i class="fas fa-right-from-bracket"></i>Logout</a></li>

</ul>

</div>

<div class="content">

<div class="navbar-custom">

<input
type="text"
class="form-control search"
placeholder="Cari...">

<div class="profile">

<i class="far fa-bell fs-5"></i>

<img src="{{ asset('images/logo.png') }}">

<strong>Admin PJI</strong>

</div>

</div>

<div class="main">

<div class="header-card">
    <h2 class="title">Dashboard PJI</h2>
    <p class="subtitle">Selamat datang di Sistem Penjadwalan Auditor BSPJI Palembang.</p>
</div>

<!-- Card Statistik akan dilanjutkan pada Bagian 2 -->
<style>

.card-stat{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
transition:.3s;
border:none;
}

.card-stat:hover{
transform:translateY(-6px);
}

.icon-box{
width:70px;
height:70px;
border-radius:18px;
display:flex;
justify-content:center;
align-items:center;
font-size:28px;
color:white;
}

.bg-blue{background:#2563EB;}
.bg-green{background:#10B981;}
.bg-orange{background:#F59E0B;}
.bg-red{background:#EF4444;}

.table-box{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
margin-top:35px;
}

.chart-box{
background:white;
border-radius:20px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,.08);
margin-top:35px;
}

/* Header / banner */
.header-card{
    background: linear-gradient(180deg, #ffffff, #fbfdff);
    border-radius:14px;
    padding:20px 24px;
    box-shadow:0 6px 18px rgba(15,61,145,0.06);
    margin-bottom:22px;
    display:flex;
    flex-direction:column;
}

.header-card .title{
    font-size:30px;
    font-weight:700;
    margin:0 0 6px 0;
}

.header-card .subtitle{
    margin:0;
    color:#6b7280;
    font-size:15px;
}

</style>

<div class="row">

    <div class="col-lg-3 mb-4">

        <div class="card-stat">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-secondary">
                        Total Perusahaan
                    </small>

                </div>

                <div class="icon-box bg-blue">

                    <i class="fas fa-building"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 mb-4">

        <div class="card-stat">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-secondary">
                        Jadwal Audit
                    </small>

                </div>

                <div class="icon-box bg-green">

                    <i class="fas fa-calendar-days"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 mb-4">

        <div class="card-stat">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-secondary">
                        Menunggu Review
                    </small>

                </div>

                <div class="icon-box bg-orange">

                    <i class="fas fa-clock"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 mb-4">

        <div class="card-stat">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-secondary">
                        Audit Aktif
                    </small>

                </div>

                <div class="icon-box bg-red">

                    <i class="fas fa-clipboard-check"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="table-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Jadwal Audit Terbaru
        </h4>

        <button class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Tambah Jadwal

        </button>

    </div>

    <table class="table table-hover align-middle">

        <thead class="table-primary">

            <tr>

                <th>No</th>

                <th>Perusahaan</th>

                <th>Tanggal</th>

                <th>Ketua Tim</th>

                <th>Status</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>

</div>

<div class="chart-box">

    <h4 class="fw-bold mb-4">

        Statistik Audit Bulan Ini

    </h4>

    <canvas id="auditChart" height="100"></canvas>

</div>
</div>
<!-- End Main -->

    <!-- Footer -->
    <div class="footer mt-2 text-center text-muted">
        <hr>
        <p class="mb-0">
            © 2026 Sistem Penjadwalan Auditor BSPJI Palembang
        </p>
    </div>

</div>
<!-- End Content -->

<!-- ================= Chart JS ================= -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('auditChart');

    options:{

        responsive:true,

        plugins:{

            legend:{
                display:false
            }

        },

        scales:{

            y:{

                beginAtZero:true,

                ticks:{
                    stepSize:2
                }

            }

        }

    }

});

</script>


<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

// Efek menu aktif

const menu = document.querySelectorAll(".menu a");

menu.forEach(item=>{

    item.addEventListener("click",function(){

        menu.forEach(i=>i.classList.remove("active"));

        this.classList.add("active");

    });

});

</script>

</body>

</html>