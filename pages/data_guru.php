<?php
include '../connect.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../login.html");
    exit();
}

// Ambil semua guru
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
/* Background sama seperti index.php */
body {
    background: linear-gradient(135deg, #2b0040, #0d001f);
    color: #fff;
    font-family: Poppins, sans-serif;
}

/* Card glass blur */
.card {
    background: rgba(255,255,255,0.05);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 20px rgba(170,0,255,0.25);
    backdrop-filter: blur(10px);
}

/* Tombol back */
.back-btn {
    margin: 20px;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    border-radius: 12px;
    padding: 8px 18px;
    backdrop-filter: blur(5px);
}
.back-btn:hover {
    background: rgba(255,255,255,0.25);
}

/* TABEL */
.table-custom {
    border-radius: 14px;
    overflow: hidden;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 15px rgba(170, 0, 255, 0.25);
    backdrop-filter: blur(8px);
}

/* Header tabel gradient purple-pink */
.table-custom thead tr {
    background: linear-gradient(90deg, #a000ff, #ff00cc);
    color: white;
    text-shadow: 0 0 6px #fff;
}

/* Isi tabel */
.table-custom tbody tr {
    background: rgba(255,255,255,0.04);
    color: #fff;
    transition: 0.25s;
}

/* Hover neon */
.table-custom tbody tr:hover {
    background: rgba(255, 0, 200, 0.25);
    box-shadow: inset 0 0 10px #ff00ff;
}

/* Sel tabel */
.table-custom td,
.table-custom th {
    border: 1px solid rgba(255,255,255,0.08);
    padding: 12px;
}

/* Nomor */
.no-col {
    color: #ff4dff;
    font-weight: bold;
    text-shadow: 0 0 8px #ff00ff;
}

/* Badge status */
.badge {
    padding: 8px 12px;
    font-size: 13px;
    border-radius: 8px;
}
</style>
</head>
<body>

<a href="/project/index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="container my-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between mb-3">
        <h3 style="text-shadow:0 0 10px #ff00ff;">
            <i class="fas fa-user-tie me-2"></i> Data Guru
        </h3>

        <a href="tambah_guru.php" class="btn btn-primary rounded-pill px-3" style="
            background: linear-gradient(90deg,#a000ff,#ff00cc);
            border: none;
            box-shadow:0 0 10px #ff00ff;">
            <i class="fas fa-plus"></i> Tambah Guru
        </a>
    </div>

    <!-- CARD TABEL -->
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
                <?php 
                $no = 1;
                while ($d = mysqli_fetch_assoc($q)): ?>
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
