<?php
include 'aksi/koneksi.php';
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 

// Ambil ID dari query string
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Query untuk mendapatkan data pesanan berdasarkan ID
$sql = "SELECT id, nama, nomor_hp, status, total_harga, estimasi_selesai, waktu_masuk, pakaian, sprei, handuk, selimut, karpet_kecil FROM pesanan WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Pesanan tidak ditemukan.";
    exit;
}

// Menyiapkan format pesan untuk WhatsApp
$message = "Pesanan Anda Berhasil Dibuat\n";
$message .= "Berikut Detail Pesanan ID " . $row["id"] . "\n";
$message .= "------------------------------------------------------------\n";
$message .= "Nama: " . htmlspecialchars($row["nama"]) . "\n";
$message .= "Nomor HP: " . htmlspecialchars($row["nomor_hp"]) . "\n";
$message .= "Status: " . htmlspecialchars($row["status"]) . "\n";
$message .= "Waktu Masuk: " . htmlspecialchars($row["waktu_masuk"]) . "\n";
$message .= "Estimasi Selesai: " . htmlspecialchars($row["estimasi_selesai"]) . "\n";
$message .= "Total Harga: Rp. " . number_format($row["total_harga"], 0, ',', '.') . "\n";
$message .= "\nLayanan:\n";

// Menambahkan layanan yang dipesan hanya jika nilainya lebih dari 0
if ($row["pakaian"] > 0) {
    $message .= "- Pakaian: " . htmlspecialchars($row["pakaian"]) . " Kg\n";
}
if ($row["sprei"] > 0) {
    $message .= "- Sprei: " . htmlspecialchars($row["sprei"]) . " Kg\n";
}
if ($row["handuk"] > 0) {
    $message .= "- Handuk: " . htmlspecialchars($row["handuk"]) . " Kg\n";
}
if ($row["selimut"] > 0) {
    $message .= "- Selimut: " . htmlspecialchars($row["selimut"]) . " Kg\n";
}
if ($row["karpet_kecil"] > 0) {
    $message .= "- Karpet Kecil: " . htmlspecialchars($row["karpet_kecil"]) . " Kg\n";
}

$message .= "------------------------------------------------------------\n";
$message .= "Thank You!";

// Membuat URL WhatsApp dengan pesan
$whatsappUrl = "https://wa.me/" . str_replace(['+', ' '], '', htmlspecialchars($row['nomor_hp'])) . "?text=" . urlencode($message);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk Pesanan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv+eDlmZpBkiw4jW+6+kefL5I/hy3zH5HDvYoB0I+4yDklIMaaPyHjZhxPA" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="border p-3 text-center">
                <h5 class="mb-3">Struk Pesanan</h5>
                <hr>
                <div class="d-flex justify-content-between">
                    <span><strong>ID Pesanan:</strong></span>
                    <span><?php echo htmlspecialchars($row["id"]); ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span><strong>Nama:</strong></span>
                    <span><?php echo htmlspecialchars($row["nama"]); ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span><strong>No HP:</strong></span>
                    <span><?php echo htmlspecialchars($row["nomor_hp"]); ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span><strong>Status:</strong></span>
                    <span><?php echo htmlspecialchars($row["status"]); ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span><strong>Total:</strong></span>
                    <span>Rp. <?php echo number_format($row["total_harga"], 0, ',', '.'); ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span><strong>Estimasi:</strong></span>
                    <span><?php echo htmlspecialchars($row["estimasi_selesai"]); ?></span>
                </div>
                <hr>

                <!-- Menampilkan data layanan hanya jika tidak kosong -->
                <h6>Layanan:</h6>
                <?php if ($row["pakaian"] > 0): ?>
                    <div class="d-flex justify-content-between">
                        <span><strong>Pakaian:</strong></span>
                        <span><?php echo htmlspecialchars($row["pakaian"]) . " Kg"; ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($row["sprei"] > 0): ?>
                    <div class="d-flex justify-content-between">
                        <span><strong>Sprei:</strong></span>
                        <span><?php echo htmlspecialchars($row["sprei"]) . " Kg"; ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($row["handuk"] > 0): ?>
                    <div class="d-flex justify-content-between">
                        <span><strong>Handuk:</strong></span>
                        <span><?php echo htmlspecialchars($row["handuk"]) . " Kg"; ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($row["selimut"] > 0): ?>
                    <div class="d-flex justify-content-between">
                        <span><strong>Selimut:</strong></span>
                        <span><?php echo htmlspecialchars($row["selimut"]) . " Kg"; ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($row["karpet_kecil"] > 0): ?>
                    <div class="d-flex justify-content-between">
                        <span><strong>Karpet Kecil:</strong></span>
                        <span><?php echo htmlspecialchars($row["karpet_kecil"]) . " Kg"; ?></span>
                    </div>
                <?php endif; ?>

                <hr>

                <!-- Tombol Print -->
                <button class="btn btn-primary w-100 mb-2" onclick="window.print();">Print</button>

                <!-- Tombol Share WhatsApp -->
                <a href="<?php echo $whatsappUrl; ?>" target="_blank" class="btn btn-success w-100">Share via WhatsApp</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional, for interactivity like modals or dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0ik9f/R3MlXwFQ6ihz1OsBCf9V72CbD9RQ74fOxtJk3Ow19T" crossorigin="anonymous"></script>

</body>
</html>

<?php
$conn->close();
include '_footer.php'; 
?>
