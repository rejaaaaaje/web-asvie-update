<?php
include '../connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $mapel = $_POST['mapel'];
    $status = $_POST['status'];

    mysqli_query($conn, "INSERT INTO guru (nama, mapel, status) 
                         VALUES ('$nama','$mapel','$status')");

    header("Location: data_guru.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Guru</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
/* Background seperti index.php */
body {
    background: linear-gradient(135deg, #2b0040, #0d001f);
    color: #fff;
    font-family: Poppins, sans-serif;
}

/* Card form glassmorphism */
.card-form {
    background: rgba(255,255,255,0.06);
    padding: 25px;
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.12);
    box-shadow: 0 0 20px rgba(170,0,255,0.25);
    backdrop-filter: blur(12px);
}

/* Label */
label {
    font-weight: 500;
    color: #ffccff;
    text-shadow: 0 0 8px #ff00d4;
}

/* Input */
.form-control, select {
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    border-radius: 10px;
}
.form-control:focus {
    background: rgba(255,255,255,0.15);
    box-shadow: 0 0 10px #ff00ff;
    color: #fff;
}

/* Judul */
.title {
    text-shadow: 0 0 12px #ff00ff;
}

/* Tombol */
.btn-primary {
    background: linear-gradient(90deg,#a000ff,#ff00cc);
    border: none;
    box-shadow: 0 0 12px #ff00ff;
    border-radius: 12px;
}
.btn-secondary {
    background: rgba(255,255,255,0.12);
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
}
.btn-secondary:hover {
    background: rgba(255,255,255,0.25);
}
</style>
</head>

<body>

<div class="container my-5" style="max-width: 600px;">

    <h3 class="title">
        <i class="fas fa-user-tie me-2"></i>Tambah Guru
    </h3>

    <form method="POST" class="card-form mt-4">

        <div class="mb-3">
            <label>Nama Guru</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="cuti">Cuti</option>
            </select>
        </div>

        <button class="btn btn-primary px-4">Simpan</button>
        <a href="data_guru.php" class="btn btn-secondary px-4">Kembali</a>

    </form>

</div>

</body>
</html>
