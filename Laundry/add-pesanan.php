<?php
// Memulai output buffering untuk menangani "Cannot modify header information"
ob_start();

include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php'; 

// Proses form jika dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari form
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $nomor_hp = isset($_POST['nomor_hp']) ? $_POST['nomor_hp'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $total_harga = isset($_POST['total_harga']) ? $_POST['total_harga'] : '';
    $estimasi_selesai = isset($_POST['estimasi_selesai']) ? $_POST['estimasi_selesai'] : '';
    $pakaian = isset($_POST['pakaian']) ? $_POST['pakaian'] : 0;
    $sprei = isset($_POST['sprei']) ? $_POST['sprei'] : 0;
    $handuk = isset($_POST['handuk']) ? $_POST['handuk'] : 0;
    $selimut = isset($_POST['selimut']) ? $_POST['selimut'] : 0;
    $karpet_kecil = isset($_POST['karpet_kecil']) ? $_POST['karpet_kecil'] : 0;

    // Menambahkan waktu_masuk dan aktif
    $waktu_masuk = date('Y-m-d H:i:s'); // Timestamp sekarang
    $aktif = 1;

    // Insert data into database (use prepared statements for security)
    $sql = "INSERT INTO pesanan (nama, nomor_hp, status, total_harga, estimasi_selesai, pakaian, sprei, handuk, selimut, karpet_kecil, waktu_masuk, aktif)
            VALUES ('$nama', '$nomor_hp', '$status', '$total_harga', '$estimasi_selesai', '$pakaian', '$sprei', '$handuk', '$selimut', '$karpet_kecil', '$waktu_masuk', '$aktif')";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, redirect ke halaman pesanan.php
        header("Location: pesanan");
        exit(); // Pastikan eksekusi berhenti setelah redirect
    } else {
        $error_message = "
            <div class='alert alert-danger'>
                Error: " . $sql . "<br>" . $conn->error . "
            </div>";
    }

    $conn->close();
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="pesanan">Pesanan</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Pesanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <?php 
                                if (isset($error_message)) echo $error_message;
                                ?>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Pemesan</label>
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Nama Pemesan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_hp">Nomor HP:</label>
                                            <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" placeholder="Nomor HP" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="estimasi_selesai">Estimasi Selesai:</label>
                                            <input type="datetime-local" id="estimasi_selesai" name="estimasi_selesai" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="belum selesai">Belum Selesai</option>
                                                <option value="Proses">Proses</option>
                                                <option value="Selesai">Selesai</option>
                                                <option value="Dibatalkan">Dibatalkan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_harga">Total Harga:</label>
                                            <input type="number" id="total_harga" name="total_harga" class="form-control" placeholder="Total Harga" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="pakaian">Pakaian:</label>
                                            <input type="number" id="pakaian" name="pakaian" class="form-control" placeholder="Jumlah Pakaian" value="0" required oninput="updateTotal()">
                                        </div>
                                        <div class="form-group">
                                            <label for="sprei">Sprei:</label>
                                            <input type="number" id="sprei" name="sprei" class="form-control" placeholder="Jumlah Sprei" value="0" required oninput="updateTotal()">
                                        </div>
                                        <div class="form-group">
                                            <label for="handuk">Handuk:</label>
                                            <input type="number" id="handuk" name="handuk" class="form-control" placeholder="Jumlah Handuk" value="0" required oninput="updateTotal()">
                                        </div>
                                        <div class="form-group">
                                            <label for="selimut">Selimut:</label>
                                            <input type="number" id="selimut" name="selimut" class="form-control" placeholder="Jumlah Selimut" value="0" required oninput="updateTotal()">
                                        </div>
                                        <div class="form-group">
                                            <label for="karpet_kecil">Karpet Kecil:</label>
                                            <input type="number" id="karpet_kecil" name="karpet_kecil" class="form-control" placeholder="Jumlah Karpet Kecil" value="0" required oninput="updateTotal()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <a href="pesanan" class="btn btn-primary">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include '_footer.php'; ?>

<!-- JavaScript untuk menghitung total harga otomatis -->
<script>
    const hargaPakaian = 8000;
    const hargaSprei = 10000;
    const hargaHanduk = 9000;
    const hargaSelimut = 12000;
    const hargaKarpetKecil = 15000;

    function updateTotal() {
        const pakaian = parseInt(document.getElementById('pakaian').value) || 0;
        const sprei = parseInt(document.getElementById('sprei').value) || 0;
        const handuk = parseInt(document.getElementById('handuk').value) || 0;
        const selimut = parseInt(document.getElementById('selimut').value) || 0;
        const karpetKecil = parseInt(document.getElementById('karpet_kecil').value) || 0;

        const totalHarga = (pakaian * hargaPakaian) + (sprei * hargaSprei) + (handuk * hargaHanduk) + (selimut * hargaSelimut) + (karpetKecil * hargaKarpetKecil);
        document.getElementById('total_harga').value = totalHarga;
    }

    // Jalankan perhitungan awal ketika halaman pertama kali dimuat
    window.onload = updateTotal;
</script>

<?php
// Mengakhiri output buffering dan mengirimkan semua output ke browser
ob_end_flush();
?>
