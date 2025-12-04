<?php
// proses_register.php

if (!file_exists('connect.php')) {
    die("File connect.php tidak ditemukan.");
}
include 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.html");
    exit();
}

// Nama tabel YANG BENAR (BUKAN nama database!)
$tableName = 'siswa'; // <-- ganti sesuai nama tabel yang ADA di database kamu

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if ($nama === '' || $email === '' || $password === '' || $confirm_password === '') {
    echo "<script>alert('Semua field harus diisi!'); window.location.href='register.html';</script>";
    exit();
}

if ($password !== $confirm_password) {
    echo "<script>alert('Password dan konfirmasi password tidak sama!'); window.location.href='register.html';</script>";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Format email tidak valid!'); window.location.href='register.html';</script>";
    exit();
}

// 1) Cek email
$checkSql = "SELECT id FROM `$tableName` WHERE email = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $checkSql);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Email sudah terdaftar!'); window.location.href='register.html';</script>";
    exit();
}
mysqli_stmt_close($stmt);

// 2) Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// 3) Insert
$insertSql = "INSERT INTO `$tableName` (`nama`, `email`, `password`) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $insertSql);
mysqli_stmt_bind_param($stmt, 'sss', $nama, $email, $hashedPassword);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Registrasi berhasil!'); window.location.href='login.html';</script>";
    exit();
} else {
    $err = mysqli_error($conn);
    mysqli_stmt_close($stmt);
    echo "<script>alert('Terjadi kesalahan: $err'); window.location.href='register.html';</script>";
    exit();
}
?>
