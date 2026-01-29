<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Memanggil konfigurasi database
include 'config.php';

// query utk ambil total pengeluaran
$total_query = "SELECT SUM(amount) AS total FROM expenses";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$grand_total = $total_data['total'] ?? 0;

// Query tetap sama, tapi sekarang $conn diambil dari config.php
$query = "SELECT * FROM expenses ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uangku</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>UangKu</h1>
            <p>Catatan Pengeluaran Harian</p>
        </header>
        <main>
            <div class="summary">
                <h2>Total Pengeluaran</h2>
                <p class="total">Rp. <?php echo number_format($grand_total, 0, ',', '.'); ?></p>
                <a href="add.html" class="btn">Tambah Pengeluaran</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nominal</th>
                        <th>Kategori</th>
                        <th>Catatan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>Rp. <?php echo number_format($row['amount'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['note']; ?></td>
                        <td><?php echo date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                        <td><a href="delete.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin mau hapus?')">Hapus</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
