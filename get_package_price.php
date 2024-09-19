<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'badjo');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil harga per orang berdasarkan package_id
$package_id = $_GET['id'];
$package_result = $conn->query("SELECT price_per_person FROM packages WHERE id=$package_id");
$package = $package_result->fetch_assoc();

// Kembalikan data dalam format JSON
echo json_encode($package);

$conn->close();
?>
