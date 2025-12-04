<?php
session_start();
include 'connect.php';

// Cek login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'] ?? 'Pengguna';

// Query total data
$q_siswa = mysqli_query($conn, "SELECT COUNT(*) AS total FROM siswa");
$total_siswa = mysqli_fetch_assoc($q_siswa)['total'] ?? 0;

$q_aktif = mysqli_query($conn, "SELECT COUNT(*) AS aktif FROM siswa WHERE status='aktif'");
$total_siswa_aktif = mysqli_fetch_assoc($q_aktif)['aktif'] ?? 0;

$q_kelas = mysqli_query($conn, "SELECT COUNT(*) AS kelas FROM kelas");
$total_kelas = mysqli_fetch_assoc($q_kelas)['kelas'] ?? 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard - Sistem Informasi Sekolah</title>
<style>
    body {
        font-family: Poppins, sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #2a004e);
        margin: 0;
        padding-top: 100px;
        color: #fff;
    }

    /* NAVBAR */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        padding: 15px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 999;
        box-shadow: 0 0 20px rgba(255, 0, 255, 0.5);
    }

    .navbar .logo {
        font-size: 22px;
        font-weight: bold;
        text-shadow: 0 0 8px #ff00ff;
    }

    .navbar ul {
        display: flex;
        list-style: none;
        gap: 20px;
        margin: 0;
        padding: 0;
    }

    .navbar ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        padding: 8px 15px;
        border-radius: 10px;
        transition: 0.3s;
    }

    .navbar ul li a:hover {
        background: rgba(255, 0, 255, 0.2);
        box-shadow: 0 0 10px #ff00ff;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 0 0 10px #ff00ff;
    }

    /* CARD */
    .cards {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .card {
        width: 300px;
        padding: 25px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(255, 0, 255, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 0 30px rgba(255, 0, 255, 0.8);
    }

    .card::before {
        content: "";
        position: absolute;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, #ff00ff55, transparent 60%);
        top: -50%;
        left: -50%;
        animation: rotate 6s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .card h2 {
        font-size: 28px;
        margin: 0;
        text-shadow: 0 0 10px #ffffffaa;
    }

    .card p {
        margin-top: 10px;
        font-size: 18px;
        opacity: 0.9;
    }

    /* LOG TABLE */
    .log {
        margin-top: 50px;
        background: #ffffff11;
        padding: 20px;
        border-radius: 10px;
        backdrop-filter: blur(5px);
    }

    table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid #ffffff33;
        text-align: left;
    }

    th {
        background: #ffffff22;
    }

    tr:hover {
        background: #ffffff11;
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">Sistem Informasi Sekolah</div>

    <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="pages/data_siswa.php">Siswa</a></li>
        <li><a href="pages/guru.php">Guru</a></li>
        <li><a href="kelas.php">Kelas</a></li>
        <li><a href="logout.php" style="color:#ff8080;">Logout</a></li>
    </ul>
</div>

<h1>Selamat Datang, <?= $username ?> 👋</h1>

<div class="cards">
    <div class="card">
        <h2><?= $total_siswa ?></h2>
        <p>Total Siswa</p>
    </div>

    <div class="card">
        <h2><?= $total_siswa_aktif ?></h2>
        <p>Siswa Aktif</p>
    </div>

    <div class="card">
        <h2><?= $total_kelas ?></h2>
        <p>Total Kelas</p>
    </div>
</div>

<div class="log">
    <h3>Aktivitas Terbaru</h3>
    <table>
        <tr>
            <th>Waktu</th>
            <th>Aktivitas</th>
            <th>Pengguna</th>
        </tr>

        <tr>
            <td>04/12/2025 03:18</td>
            <td>Login ke sistem</td>
            <td><?= $username ?></td>
        </tr>

        <tr>
            <td>04/12/2025 09:18</td>
            <td>Melihat data siswa</td>
            <td><?= $username ?></td>
        </tr>

    </table>
</div>

</body>
</html>
