<?php
include '../includes/header.php';
include '../connect.php';

// Tambah kelas baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $wali = mysqli_real_escape_string($conn, $_POST['wali_kelas']);

    if ($nama !== '') {
        mysqli_query($conn, "INSERT INTO kelas (nama_kelas, jurusan, wali_kelas) VALUES ('$nama', '$jurusan', '$wali')");
        echo "<script>alert('Kelas berhasil ditambahkan!'); window.location.href='kelas.php';</script>";
        exit();
    } else {
        echo "<script>alert('Nama kelas wajib diisi!');</script>";
    }
}

// Hapus kelas
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM kelas WHERE id=$id");
    echo "<script>alert('Kelas berhasil dihapus!'); window.location.href='kelas.php';</script>";
    exit();
}

// Ambil data kelas
$result = mysqli_query($conn, "SELECT * FROM kelas ORDER BY id DESC");
?>

<h3><i class="fas fa-chalkboard me-2"></i>Data Kelas</h3>
<hr>

<!-- Form Tambah Kelas -->
<div class="card p-3 mb-4">
    <h5><i class="fas fa-plus-circle me-2"></i>Tambah Kelas Baru</h5>
    <form method="POST" class="row g-3 mt-1">
        <div class="col-md-4">
            <label class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" placeholder="Contoh: XI RPL 1" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Contoh: Rekayasa Perangkat Lunak">
        </div>
        <div class="col-md-4">
            <label class="form-label">Wali Kelas</label>
            <input type="text" name="wali_kelas" class="form-control" placeholder="Nama wali kelas">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary mt-2">
                <i class="fas fa-save me-1"></i> Simpan
            </button>
        </div>
    </form>
</div>

<!-- Tabel Data Kelas -->
<div class="card p-3">
    <h5><i class="fas fa-list me-2"></i>Daftar Kelas</h5>
    <div class="table-responsive mt-3">
        <table class="table table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Wali Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama_kelas']); ?></td>
                        <td><?= htmlspecialchars($row['jurusan']); ?></td>
                        <td><?= htmlspecialchars($row['wali_kelas']); ?></td>
                        <td>
                            <a href="kelas.php?hapus=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kelas ini?')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center text-muted">Belum ada data kelas.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>