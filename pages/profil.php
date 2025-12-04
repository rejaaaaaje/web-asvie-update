<?php include '../includes/header.php'; ?>
<h3><i class="fas fa-user me-2"></i>Profil Pengguna</h3>
<hr>

<div class="card p-3" style="max-width:400px;">
    <p><strong>Nama:</strong> <?= htmlspecialchars($_SESSION['user_nama']); ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['user_email']); ?></p>
    <p><strong>Status:</strong> Siswa Terdaftar</p>
</div>

<?php include '../includes/footer.php'; ?>