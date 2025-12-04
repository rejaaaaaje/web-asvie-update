<?php
session_start();
include 'connect.php'; // pastikan ada $conn = mysqli_connect(...)

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.html");
    exit();
}

// Ambil input
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Validasi input
if ($email === '' || $password === '') {
    echo "<script>alert('Email dan password wajib diisi!'); window.location.href='login.html';</script>";
    exit();
}

// Siapkan query cek user
$sql = "SELECT id, nama, email, password FROM siswa WHERE email = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Query gagal: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($user = mysqli_fetch_assoc($result)) {

    // Cek password hash
    if (password_verify($password, $user['password'])) {

        // Set session login
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nama'] = $user['nama'];
        $_SESSION['user_email'] = $user['email'];

        echo "<script>alert('Login berhasil!'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Password salah!'); window.location.href='login.html';</script>";
        exit();
    }
} else {
    echo "<script>alert('Email tidak ditemukan!'); window.location.href='login.html';</script>";
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
