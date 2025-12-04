<?php
include '../connect.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../login.html");
    exit();
}

$q = mysqli_query($conn, "SELECT * FROM guru ORDER BY id_guru DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Guru</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
/* === Background Dashboard === */
body {
    background: linear-gradient(135deg, #2b0040, #0d001f);
    color: #fff;
    font-family: Poppins, sans-serif;
}

/* === Tombol Kembali === */
.back-btn {
    margin: 20px;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.25);
    color: white;
    padding: 10px 20px;
    border-radius: 12px;
    backdrop-filter: blur(6px);
    transition: 0.2s;
}
.back-btn:hover {
    background: rgba(255,255,255,0.25);
}

/* === Card === */
.card {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 18px;
    backdrop-filter: blur(14px);
    box-shadow: 0 0 20px rgba(170,0,255,0.3);
}

/* === Header Title === */
h3 {
    text-shadow: 0 0 12px #ff00ff;
}

/* === Tabel === */
.table-custom {
    background: rgba(255,255,255,0.05);
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.12);
    box-shadow: 0 0 15px rgba(170,0,255,0.25);
}

.table-custom thead tr {
    background: linear-gradient(90deg,#a000ff,#ff00cc);
    color: #fff;
    text-shadow: 0 0 8px #fff;
}

.table-custom tbody tr {
    background: rgba(255,255,255,0.05);
    transition: 0.25s;
}

.table-custom tbody tr:hover {
    background: rgba(255,0,200,0.25);
    box-shadow: inset 0 0 12px #ff00ff;
}

.table-custom td,
.table-custom th {
    border: 1px solid rgba(255,255,255,0.1);
    padding: 12px;
}

/* Nomor kolom */
.no-col {
    font-weight: bold;
    color: #ff66ff;
    text-shadow: 0 0 8px #ff00ff;
}

/* Badge status */
.badge {
    border-radius: 8px;
    padding: 8px 12px;
    font-size: 13px;
}

/* Tombol aksi */
.btn-warning, .btn-danger {
    border-radius: 20px;
    padding: 6px 14px;
}
</style>
</head>

<body>

<!-- BACK BUTTON -->
<a href="/project/index.php" class="back-btn">
    <i class="fas fa-arrow-left"></i> Kembali
</a>

<div class="container my-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between mb-3">
        <h3>
            <i class="fas fa-user-tie me-2"></i> Data Guru
        </h3>

        <a href="tambah_guru.php" class="btn btn-primary rounded-pill px-3"
           style="background:linear-gradient(90deg,#a000ff,#ff00cc); border:none; box-shadow:0 0 12px #ff00ff;">
            <i class="fas fa-plus"></i> Tambah Guru
        </a>
    </div>

    <!-- TABEL -->
    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-custom align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Mapel</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = 1; while ($d = mysqli_fetch_assoc($q)) : ?>
                    <tr>
                        <td class="no-col"><?= $no++; ?></td>
                        <td><?= $d['nama']; ?></td>
                        <td><?= $d['mapel']; ?></td>
                        <td>
                            <span class="badge bg-success"><?= $d['status']; ?></span>
                        </td>
                        <td>
                            <a href="edit_guru.php?id=<?= $d['id_guru']; ?>" 
                               class="btn btn-warning btn-sm rounded-pill px-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_guru.php?id=<?= $d['id_guru']; ?>" 
                               onclick="return confirm('Yakin ingin menghapus guru ini?');"
                               class="btn btn-danger btn-sm rounded-pill px-3">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>

</body>
</html>
