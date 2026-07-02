<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistem Penjadwalan Auditor BSPJI</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            overflow:hidden; /* hilangkan scrollbar vertikal di desktop */
            background:url('{{ asset("images/bspji.jpg") }}') center center/cover no-repeat;
            position:relative;
        }

        body::before{
            content:'';
            position:absolute;
            inset:0;
            background:rgba(7,32,72,.55);
            backdrop-filter:blur(2px);
        }

        .wrapper{
            position:relative;
            z-index:2;
            width:100%;
            height:100vh;
            display:flex;
            align-items:center; /* center vertically */
            justify-content:space-between;
            padding:60px 70px; /* lebih compact sehingga tidak memicu scroll */
            gap:20px;
            box-sizing:border-box;
        }

        /* =======================
              BAGIAN KIRI
        ======================= */

        .left-content{
            width:56%;
            color:#fff;
        }

        .left-content h1{
            font-size:48px; /* compact heading */
            font-weight:800;
            line-height:1.04;
            margin-bottom:18px;
        }

        .left-content p{
            width:75%;
            font-size:18px;
            line-height:1.6;
            color:#f3f3f3;
            margin-bottom:28px;
        }

        .fitur{
            display:flex;
            gap:25px;
        }

        .login-card{

            .fitur{
                display:flex;
                gap:20px;
            }

            .fitur-card{

                width:190px;
                height:150px;

                background:rgba(255,255,255,.12);

                backdrop-filter:blur(10px);

                border:1px solid rgba(255,255,255,.18);

                border-radius:18px;

                display:flex;
                flex-direction:column;

                justify-content:center;

                align-items:center;

                transition:.4s;

                color:white;

                text-align:center;
            }
            align-items:center;

            transition:.4s;

            color:white;

            text-align:center;
        }

        .fitur-card:hover{

            transform:translateY(-8px);

            background:rgba(255,255,255,.20);

        }

        .fitur-card i{

            font-size:40px;

            margin-bottom:18px;

            color:#fff;

        }

        .fitur-card h5{

            font-size:23px;

            margin-bottom:8px;

            font-weight:600;

        }

        .fitur-card p{

            width:85%;

            font-size:14px;

            line-height:1.5;

            margin:0;

            color:#ededed;

        }

        /* =======================
              BAGIAN LOGIN
        ======================= */

        .login-section{

            width:430px;

            display:flex;

            justify-content:center;

        }

        .login-card{

            width:100%;

            background:rgba(255,255,255,.18);

            backdrop-filter:blur(18px);

            border:1px solid rgba(255,255,255,.22);

            border-radius:32px; /* sedikit lebih membulat */

            padding:35px 35px 45px; /* tambah ruang bawah */

            box-shadow:0 25px 45px rgba(0,0,0,.22);

        }

        .logo{

            width:64px;

            display:block;

            margin:auto;

            margin-bottom:10px;

        }

        .login-title{

            text-align:center;

            color:#ffffff;

            font-size:28px;

            font-weight:800;

            margin-bottom:6px;

            letter-spacing:.6px;

        }

        .subtitle{

            text-align:center;

            color:rgba(243,243,243,.95);

            margin-bottom:12px;

            font-size:14px;

        }

        .input-group-text{
            background:rgba(255,255,255,.96);
            border-right:none;
            border-radius:12px 0 0 12px;
            border:1px solid rgba(0,0,0,.06);
            color:#333;
        }

        .form-control{

            height:44px; /* shorter input */

            border-left:none;

            border-radius:0 12px 12px 0;

            font-size:15px;

            box-shadow:0 6px 18px rgba(13,110,253,.04) inset;

            background:rgba(255,255,255,.98);

            padding-left:14px;

        }

        .form-control:focus{

            box-shadow:0 8px 24px rgba(13,110,253,.12);

            border-color:rgba(13,110,253,.9);

            outline:none;

        }

        .password-btn{

            display:inline-flex;
            align-items:center;
            justify-content:center;
            height:44px; /* match input height */
            width:48px;
            padding:0;
            margin:0;
            border:1px solid rgba(0,0,0,.06);
            border-left:none;
            background:rgba(255,255,255,.98);
            border-radius:0 12px 12px 0;
            color:#333;
            cursor:pointer;
            transition:background .12s ease, transform .08s ease;
        }

        .password-btn:active{ transform:translateY(1px); }

        .password-btn:focus{ outline:2px solid rgba(13,110,253,.12); outline-offset:2px; }


        .btn-login{

            height:44px; /* shorter button */

            border-radius:12px;

            font-size:15px;

            font-weight:700;

            background:linear-gradient(90deg,#2b8cff,#0d6efd);

            border:none;

            color:#fff;

            box-shadow:0 8px 24px rgba(13,110,253,.14);

            transition:transform .18s ease, box-shadow .18s ease, opacity .18s ease;

        }

        .btn-login:hover{

            transform:translateY(-3px);

            box-shadow:0 18px 40px rgba(13,110,253,.22);

        }

        .footer-text{

            text-align:center;

            margin-top:25px;

            color:white;

            font-size:14px;

        }

    </style>

</head>

<body>

<div class="wrapper">

    <!-- ================= KIRI ================= -->

    <div class="left-content">

        <h1>
            Sistem Penjadwalan <br>
            Auditor BSPJI <br>
            Palembang
        </h1>

        <p>
            Sistem informasi penjadwalan auditor yang modern,
            cepat, terintegrasi, dan memudahkan proses audit
            di BSPJI Palembang.
        </p>

        <div class="fitur">

            <div class="fitur-card">
                <i class="fas fa-calendar-days"></i>
                <h5>Penjadwalan</h5>
                <p>Kelola jadwal audit dengan mudah.</p>
            </div>

            <div class="fitur-card">
                <i class="fas fa-users"></i>
                <h5>Data Auditor</h5>
                <p>Manajemen auditor lebih cepat.</p>
            </div>

            <div class="fitur-card">
                <i class="fas fa-chart-column"></i>
                <h5>Laporan</h5>
                <p>Laporan audit secara realtime.</p>
            </div>

        </div>

    </div>

    <!-- ================= LOGIN ================= -->

    <div class="login-section">

        <div class="login-card">

            <img src="{{ asset('images/logo.png') }}" class="logo">

            <h2 class="login-title">
                LOGIN
            </h2>

            <p class="subtitle">
                Selamat Datang di Sistem Penjadwalan Auditor
            </p>

            <form>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>

                        <input
                            type="email"
                            class="form-control"
                            placeholder="Masukkan Email">

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>

                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            placeholder="Masukkan Password">

                        <button
                            type="button"
                            class="password-btn"
                            aria-label="Toggle password visibility"
                            title="Tampilkan / Sembunyikan password"
                            onclick="lihatPassword()">

                            <i id="eye" class="fas fa-eye"></i>

                        </button>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox">

                        <label class="form-check-label">

                            Ingat Saya

                        </label>

                    </div>

                    <a href="#" class="text-decoration-none">

                        Lupa Password?

                    </a>

                </div>

                <button
                    class="btn btn-primary btn-login w-100">

                    <i class="fas fa-right-to-bracket me-2"></i>

                    Login

                </button>

            </form>

            <div class="footer-text">

                © 2026 BSPJI Palembang

            </div>

        </div>

    </div>

</div>
<script>

    function lihatPassword(){

        let password = document.getElementById("password");
        let eye = document.getElementById("eye");

        if(password.type === "password"){

            password.type = "text";

            eye.classList.remove("fa-eye");

            eye.classList.add("fa-eye-slash");

        }else{

            password.type = "password";

            eye.classList.remove("fa-eye-slash");

            eye.classList.add("fa-eye");

        }

    }

</script>

<style>

    /* ===========================
            ANIMASI
    =========================== */

    .left-content{

        animation:slideLeft 1s ease;

    }

    .login-card{

        animation:slideRight 1s ease;

    }

    @keyframes slideLeft{

        from{

            opacity:0;

            transform:translateX(-70px);

        }

        to{

            opacity:1;

            transform:translateX(0);

        }

    }

    @keyframes slideRight{

        from{

            opacity:0;

            transform:translateX(70px);

        }

        to{

            opacity:1;

            transform:translateX(0);

        }

    }

    /* ===========================
          RESPONSIVE
    =========================== */

    @media(max-width:1200px){

        .left-content h1{

            font-size:55px;

        }

        .left-content p{

            width:100%;

            font-size:18px;

        }

        .fitur{

            flex-wrap:wrap;

        }

    }

    @media(max-width:991px){

        body{

            overflow:auto;

        }

        .wrapper{

            flex-direction:column;

            padding:70px 30px; /* responsive: top/bottom equal */

            height:auto;

        }

        .left-content{

            width:100%;

            text-align:center;

            margin-bottom:40px;

            padding-bottom:40px; /* responsive: beri ruang bawah lebih kecil */

        }

        .left-content h1{

            font-size:42px;

        }

        .left-content p{

            width:100%;

            font-size:17px;

            margin:auto;

            margin-bottom:35px;

        }

        .fitur{

            justify-content:center;

            flex-wrap:wrap;

        }

        .login-section{

            width:100%;

        }

        .login-card{

            max-width:430px;

        }

    }

    @media(max-width:576px){

        .wrapper{

            padding:40px 20px; /* mobile: top/bottom equal */

        }

        .left-content h1{

            font-size:34px;

        }

        .fitur-card{

            width:100%;

        }

        .login-card{

            padding:25px;

        }

        .login-title{

            font-size:40px;

        }

    }

</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>