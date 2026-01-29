<?php
// ibarat ini identitas database kita

// 1. Deklarasi variabel konfigurasi
$host = "localhost";
$user = "root";
$pass = "";
$db   = "uangku";

// 2. Membuat objek koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// 3. Cek apakah koneksi berhasil
if (!$conn) {
    // Jika gagal, hentikan program dan tampilkan pesan error
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>