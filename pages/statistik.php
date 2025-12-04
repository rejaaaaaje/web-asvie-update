<?php include '../includes/header.php'; include '../connect.php'; ?>
<h3><i class="fas fa-chart-bar me-2"></i>Statistik</h3>
<hr>

<div class="card p-4">
    <h5>Total Siswa: 
        <span class="badge bg-primary">
            <?php 
            $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM siswa");
            echo mysqli_fetch_assoc($result)['total'];
            ?>
        </span>
    </h5>
</div>

<?php include '../includes/footer.php'; ?>