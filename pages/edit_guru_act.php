<?php
include '../connect.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../login.html");
    exit();
}

$id = $_POST['id_guru'];
$nama = $_POST['nama'];
$mapel = $_POST['mapel'];
$status = $_POST['status'];

$update = mysqli_query($conn, "UPDATE guru SET 
    nama='$nama',
    mapel='$mapel',
    status='$status'
    WHERE id_guru='$id'
");

if ($update) {
    header("Location: ../pages/guru.php?success=1");
    exit();
} else {
    echo "Gagal mengupdate guru!";
}
?>
