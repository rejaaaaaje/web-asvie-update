<?php
include '../connect.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../login.html");
    exit();
}

// cek parameter id di URL
if (!isset($_GET['id'])) {
    die("ID guru tidak dikirim!");
}

$id = intval($_GET['id']);

// ambil data guru berdasarkan id_guru
$q = mysqli_query($conn, "SELECT * FROM guru WHERE id_guru = $id");

if (mysqli_num_rows($q) == 0) {
    die("Guru tidak ditemukan!");
}

$data = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Guru</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3>Edit Guru</h3>

    <div class="card p-4 mt-3">

        <form action="edit_guru_act.php" method="POST">

            <input type="hidden" name="id_guru" value="<?= $data['id_guru']; ?>">

            <div class="mb-3">
                <label>Nama Guru</label>
                <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>
            </div>

            <div class="mb-3">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control" name="mapel" value="<?= $data['mapel']; ?>" required>
            </div>

            <div class="mb-3">
                <label>Status Guru</label>
                <select name="status" class="form-select">
                    <option value="Aktif" <?= ($data['status']=="Aktif") ? "selected" : ""; ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= ($data['status']=="Tidak Aktif") ? "selected" : ""; ?>>Tidak Aktif</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="data_guru.php" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

</body>
</html>
