<?php
include 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Hash password user input dengan SHA256
    $password_hashed = hash('sha256', $password);

    // Query untuk cek user
    $query = "SELECT * FROM siswa WHERE email = '$email' AND password = '$password_hashed'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        // Login berhasil
        $user_data = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user_data['id'];
        $_SESSION['user_nama'] = $user_data['nama'];
        $_SESSION['user_email'] = $user_data['email'];
        $_SESSION['logged_in'] = true;
        header("Location: dashboardz.php");
        exit();
    } else {
        // Login gagal
        echo "<script>alert('Email atau password salah!'); window.location.href='login.html';</script>";
        exit();
    }
}
?>