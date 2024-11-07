<?php
include 'aksi/koneksi.php';

// Cek apakah parameter id ada dan valid
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];  // Mendapatkan ID dari URL (misalnya: ?id=123)

    // Lakukan query delete
    $sql = "DELETE FROM pesanan WHERE id = $id";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil dihapus, arahkan kembali ke halaman data kunjungan
        header("Location: pesanan");
        exit();  // Pastikan script berhenti setelah pengalihan
    } else {
        echo "Error deleting record: " . $conn->error;  // Menampilkan error jika gagal
    }
} else {
    echo "Invalid ID.";  // Menampilkan pesan error jika ID tidak ditemukan atau kosong
}

$conn->close();  // Menutup koneksi ke database
?>
