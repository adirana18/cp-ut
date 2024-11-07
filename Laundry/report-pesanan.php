<?php
// Menghubungkan ke database
include 'aksi/koneksi.php';

// Query untuk mengambil data dari tabel pesanan
$sql = "SELECT * FROM pesanan";
$result = $conn->query($sql);

// Menyiapkan nama file untuk diunduh
$filename = "pesanan_" . date('Ymd_His') . ".csv";

// Menambahkan header untuk memberitahu browser untuk mendownload file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Membuka file untuk output
$output = fopen('php://output', 'w');

// Menulis header kolom CSV (opsional: kamu bisa mengubah sesuai dengan nama kolom yang diinginkan)
fputcsv($output, ['ID', 'Nama', 'Nomor HP', 'Status', 'Total Harga', 'Estimasi Selesai', 'Pakaian', 'Sprei', 'Handuk', 'Selimut', 'Karpet Kecil', 'Waktu Masuk', 'Aktif']);

// Menulis data dari tabel pesanan ke dalam CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

// Menutup file
fclose($output);

// Menutup koneksi ke database
$conn->close();
?>
