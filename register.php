<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Sistem Sekolah Asy-Syafi‘iyah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=El+Messiri:wght@500;700&family=Poppins:wght@400;600&display=swap');

        /* 🌙 Background sama seperti login */
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('foto.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* efek overlay gelap agar teks tetap jelas */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 0;
        }

        .card {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 25px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }

        .card-header {
            background: linear-gradient(135deg, #006837, #8B8000);
            border-bottom: 6px solid #c9b037;
            color: #fff;
            text-align: center;
            padding: 1.8rem 1rem;
            font-family: 'El Messiri', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            position: relative;
        }

        .arabic-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.07;
            background-image: url('https://www.transparenttextures.com/patterns/arabesque.png');
            background-size: 300px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(135, 169, 89, 0.25);
            border-color: #006837;
        }

        .btn-primary {
            background: linear-gradient(90deg, #006837 0%, #8B8000 100%);
            border: none;
            font-weight: 600;
            border-radius: 50px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #8B8000 0%, #006837 100%);
            transform: translateY(-2px);
        }

        .card-body {
            padding: 2rem;
        }

        .text-center a {
            color: #006837;
            font-weight: 600;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-header position-relative">
                        <div class="arabic-pattern"></div>
                        <img src="logo.png" alt="Logo Sekolah" width="70" style="margin-bottom:0.5rem;">
                        <div>Registrasi Akun</div>
                    </div>
                    <div class="card-body">
                        <form action="proses_register.php" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required minlength="8">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required minlength="8">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Daftar
                                </button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <p>Sudah punya akun? <a href="login.html">Login di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>