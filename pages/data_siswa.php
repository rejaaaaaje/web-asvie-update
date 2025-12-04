<?php include '../includes/header.php'; include '../connect.php'; ?>

<style>
/* Container utama */
.page-container {
    margin-top: 30px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 18px;
    padding: 25px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.08);
    box-shadow: 0 0 20px rgba(160, 0, 255, 0.25);
}

/* Title */
.page-title {
    font-size: 30px;
    font-weight: bold;
    color: #fff;
    text-shadow: 0 0 10px #ff50ff;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Table style sama dengan dashboard */
.table-custom {
    margin-top: 20px;
    border-radius: 12px;
    overflow: hidden;
    background: rgba(255, 0, 0, 0.03);
    backdrop-filter: blur(8px);
    color: #fff;
}

.table-custom thead tr {
    background: linear-gradient(90deg, #ae00ff, #ff00c8);
    color: #fff;
    border-bottom: 2px solid rgba(255,255,255,0.2);
    text-shadow: 0 0 6px #ffffff;
}

.table-custom tbody tr {
    background: rgba(255,255,255,0.04);
    transition: 0.25s;
}

.table-custom tbody tr:hover {
    background: rgba(255, 0, 200, 0.25);
    box-shadow: 0 0 12px #ff00ff;
}

.table-custom td, .table-custom th {
    border: 1px solid rgba(255,255,255,0.08);
    padding: 12px;
}

.no-col {
    color: #ff6bff;
    font-weight: bold;
    text-shadow: 0 0 6px #ff00ff;
}
</style>

<div class="container">
    <div class="page-container">

        <div class="page-title">
            <i class="fas fa-users"></i> Data Siswa
        </div>
        <hr style="border-color: rgba(255,255,255,0.15);">

        <?php
        $result = mysqli_query($conn, "SELECT id, nama, email FROM siswa");
        ?>

        <table class="table table-custom table-bordered align-middle">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="no-col"><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>
</div>

<?php include '../includes/footer.php'; ?>
