<?php
// mengambil data yang dikirim user, lalu menaruhnya ke dalam tabel database.

date_default_timezone_set('Asia/Jakarta');

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

// ambil data dari form
$amount   = $_POST['amount'];
$category = $_POST['category'];
$note     = $_POST['note'];
$created_at = date('Y-m-d H:i:s');


// simpan ke database
$query = "INSERT INTO expenses (amount, category, note, created_at)
          VALUES ('$amount', '$category', '$note', '$created_at')";
mysqli_query($conn, $query);

// balik ke halaman utama
header("Location: index.php");
exit;
